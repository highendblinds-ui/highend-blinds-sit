<?php
/**
 * Simple /admin tool: a plain login screen (using real WP accounts) plus a
 * minimal form to upload a gallery photo or publish a blog post, without
 * needing the full wp-admin dashboard.
 */

/** Turns basic markdown (headings, **bold**, - bullets, [links](url)) typed into
 *  the plain content box into real HTML, so published posts get properly sized
 *  headings instead of literal # and ** characters. */
function highend_simple_markdown_inline( $text ) {
	$text = preg_replace( '/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2">$1</a>', $text );
	$text = preg_replace( '/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text );
	return $text;
}

function highend_simple_markdown( $text ) {
	$lines   = explode( "\n", str_replace( "\r\n", "\n", (string) $text ) );
	$html    = array();
	$in_list = false;
	foreach ( $lines as $line ) {
		$trimmed = trim( $line );
		if ( '' === $trimmed ) {
			if ( $in_list ) {
				$html[]  = '</ul>';
				$in_list = false;
			}
			continue;
		}
		if ( preg_match( '/^-\s+(.*)/', $trimmed, $m ) ) {
			if ( ! $in_list ) {
				$html[]  = '<ul>';
				$in_list = true;
			}
			$html[] = '<li>' . highend_simple_markdown_inline( $m[1] ) . '</li>';
			continue;
		}
		if ( $in_list ) {
			$html[]  = '</ul>';
			$in_list = false;
		}
		if ( preg_match( '/^###\s+(.*)/', $trimmed, $m ) ) {
			$html[] = '<h3>' . highend_simple_markdown_inline( $m[1] ) . '</h3>';
		} elseif ( preg_match( '/^#{1,2}\s+(.*)/', $trimmed, $m ) ) {
			$html[] = '<h2>' . highend_simple_markdown_inline( $m[1] ) . '</h2>';
		} else {
			$html[] = '<p>' . highend_simple_markdown_inline( $trimmed ) . '</p>';
		}
	}
	if ( $in_list ) {
		$html[] = '</ul>';
	}
	return implode( "\n", $html );
}

function highend_simple_admin_intercept() {
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
	if ( 'admin' !== $path ) {
		return;
	}

	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', true );
	}
	nocache_headers();
	$notice = '';
	$error  = '';

	if ( isset( $_GET['logout'] ) ) {
		wp_logout();
		wp_safe_redirect( home_url( '/admin/' ) );
		exit;
	}

	if ( ! is_user_logged_in() && isset( $_POST['highend_login_submit'] ) ) {
		if ( ! isset( $_POST['highend_login_nonce'] ) || ! wp_verify_nonce( $_POST['highend_login_nonce'], 'highend_simple_login' ) ) {
			$error = 'Your session expired. Please try again.';
		} else {
			$creds = array(
				'user_login'    => sanitize_text_field( $_POST['highend_username'] ?? '' ),
				'user_password' => (string) ( $_POST['highend_password'] ?? '' ),
				'remember'      => true,
			);
			$user = wp_signon( $creds, is_ssl() );
			if ( is_wp_error( $user ) ) {
				$error = 'Incorrect username or password.';
			} else {
				wp_safe_redirect( home_url( '/admin/' ) );
				exit;
			}
		}
	}

	if ( is_user_logged_in() && current_user_can( 'upload_files' ) ) {

		if ( isset( $_POST['highend_gallery_submit'] ) ) {
			if ( ! isset( $_POST['highend_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['highend_gallery_nonce'], 'highend_gallery_upload' ) ) {
				$error = 'Your session expired. Please try again.';
			} elseif ( empty( $_FILES['highend_gallery_file']['name'][0] ) ) {
				$error = 'Please choose at least one photo to upload.';
			} else {
				require_once ABSPATH . 'wp-admin/includes/file.php';
				$overrides   = array( 'test_form' => false, 'mimes' => array( 'jpg|jpeg' => 'image/jpeg' ) );
				$uploads     = wp_upload_dir();
				$gallery_dir = trailingslashit( $uploads['basedir'] ) . 'highend-gallery/';
				wp_mkdir_p( $gallery_dir );
				$description = sanitize_title( $_POST['highend_gallery_description'] ?? '' );
				$added       = array();
				$failed      = array();
				$count       = count( $_FILES['highend_gallery_file']['name'] );
				for ( $i = 0; $i < $count; $i++ ) {
					if ( empty( $_FILES['highend_gallery_file']['name'][ $i ] ) ) {
						continue;
					}
					$single = array(
						'name'     => $_FILES['highend_gallery_file']['name'][ $i ],
						'type'     => $_FILES['highend_gallery_file']['type'][ $i ],
						'tmp_name' => $_FILES['highend_gallery_file']['tmp_name'][ $i ],
						'error'    => $_FILES['highend_gallery_file']['error'][ $i ],
						'size'     => $_FILES['highend_gallery_file']['size'][ $i ],
					);
					$moved = wp_handle_upload( $single, $overrides );
					if ( isset( $moved['error'] ) ) {
						$failed[] = $single['name'] . ' (' . $moved['error'] . ')';
						continue;
					}
					$ext = pathinfo( $moved['file'], PATHINFO_EXTENSION );
					if ( $description ) {
						$base_name = $count > 1 ? $description . '-' . ( $i + 1 ) : $description;
					} else {
						$base_name = basename( $moved['file'], '.' . $ext );
					}
					$final_name = wp_unique_filename( $gallery_dir, $base_name . '.' . $ext );
					if ( @rename( $moved['file'], $gallery_dir . $final_name ) ) {
						$added[] = $final_name;
					} else {
						$failed[] = $single['name'] . ' (could not move into gallery folder)';
					}
				}
				if ( $added ) {
					$notice = count( $added ) . ' photo(s) added to the gallery: ' . esc_html( implode( ', ', $added ) ) . '.';
				}
				if ( $failed ) {
					$error = 'Some uploads failed: ' . esc_html( implode( ', ', $failed ) ) . '.';
				}
			}
		}

		if ( isset( $_POST['highend_rename_submit'] ) ) {
			if ( ! isset( $_POST['highend_rename_nonce'] ) || ! wp_verify_nonce( $_POST['highend_rename_nonce'], 'highend_rename_photos' ) ) {
				$error = 'Your session expired. Please try again.';
			} else {
				$uploads     = wp_upload_dir();
				$gallery_dir = trailingslashit( $uploads['basedir'] ) . 'highend-gallery/';
				$renamed     = array();
				$rename_failed = array();
				foreach ( (array) ( $_POST['highend_rename_name'] ?? array() ) as $old_file => $new_desc ) {
					$old_file = sanitize_file_name( $old_file );
					$new_desc = trim( (string) $new_desc );
					$old_path = $gallery_dir . $old_file;
					if ( '' === $new_desc || ! file_exists( $old_path ) ) {
						continue;
					}
					$ext      = pathinfo( $old_file, PATHINFO_EXTENSION );
					$new_base = sanitize_title( $new_desc );
					if ( '' === $new_base ) {
						continue;
					}
					$new_name = wp_unique_filename( $gallery_dir, $new_base . '.' . $ext );
					if ( @rename( $old_path, $gallery_dir . $new_name ) ) {
						$renamed[] = $old_file . ' → ' . $new_name;
					} else {
						$rename_failed[] = $old_file;
					}
				}
				if ( $renamed ) {
					$notice = 'Renamed: ' . esc_html( implode( ', ', $renamed ) ) . '.';
				}
				if ( $rename_failed ) {
					$error = 'Could not rename: ' . esc_html( implode( ', ', $rename_failed ) ) . '.';
				}
				if ( ! $renamed && ! $rename_failed ) {
					$notice = 'No photo names were filled in, so nothing was renamed.';
				}
			}
		}

		if ( isset( $_POST['highend_post_submit'] ) && current_user_can( 'publish_posts' ) ) {
			if ( ! isset( $_POST['highend_post_nonce'] ) || ! wp_verify_nonce( $_POST['highend_post_nonce'], 'highend_post_publish' ) ) {
				$error = 'Your session expired. Please try again.';
			} else {
				$title   = trim( sanitize_text_field( $_POST['highend_post_title'] ?? '' ), " \t\n\r\0\x0B\"'\xe2\x80\x9c\xe2\x80\x9d" );
				$content = wp_kses_post( highend_simple_markdown( $_POST['highend_post_content'] ?? '' ) );
				if ( '' === trim( $title ) || '' === trim( $content ) ) {
					$error = 'Please fill in both a title and content for the post.';
				} else {
					$post_id = wp_insert_post( array(
						'post_title'   => $title,
						'post_content' => $content,
						'post_status'  => 'publish',
						'post_type'    => 'post',
					), true );
					if ( is_wp_error( $post_id ) ) {
						$error = 'Could not publish the post.';
					} else {
						if ( ! empty( $_FILES['highend_post_image']['name'] ) ) {
							require_once ABSPATH . 'wp-admin/includes/image.php';
							require_once ABSPATH . 'wp-admin/includes/file.php';
							require_once ABSPATH . 'wp-admin/includes/media.php';
							$attachment_id = media_handle_upload( 'highend_post_image', $post_id );
							if ( ! is_wp_error( $attachment_id ) ) {
								set_post_thumbnail( $post_id, $attachment_id );
								update_post_meta( $attachment_id, '_wp_attachment_image_alt', $title );
							}
						}
						$excerpt = wp_trim_words( wp_strip_all_tags( $content ), 30, '…' );
						wp_update_post( array( 'ID' => $post_id, 'post_excerpt' => $excerpt ) );
						update_post_meta( $post_id, 'rank_math_description', $excerpt );
						$notice = 'Blog post published: "' . esc_html( $title ) . '".';
					}
				}
			}
		}
	}

	highend_render_simple_admin( $notice, $error );
	exit;
}
add_action( 'template_redirect', 'highend_simple_admin_intercept', 1 );

function highend_render_simple_admin( $notice = '', $error = '' ) {
	$logged_in = is_user_logged_in();
	?>
	<!doctype html>
	<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">
		<title>HighEnd Blinds — Upload</title>
		<style>
			:root{--bg:#FAF8F3;--surface:#fff;--primary:#C9973E;--primary-hover:#AD7B2C;--ink:#151515;--muted:#625E57;--border:#E8DFD0}
			*{box-sizing:border-box}
			body{margin:0;font-family:"Manrope",Inter,Arial,sans-serif;background:var(--bg);color:var(--ink);padding:32px 16px}
			.hb-admin-wrap{max-width:520px;margin:0 auto}
			h1{font-family:"Playfair Display",Georgia,serif;font-size:1.6rem;margin:0 0 24px}
			.hb-card{background:var(--surface);border:1px solid var(--border);border-radius:14px;padding:24px;margin-bottom:20px}
			.hb-card h2{font-family:"Playfair Display",Georgia,serif;font-size:1.15rem;margin:0 0 16px}
			label{display:block;font-size:13px;font-weight:700;margin-bottom:6px}
			input[type="text"],input[type="password"],textarea,input[type="file"]{width:100%;border:1px solid var(--border);border-radius:10px;padding:10px 12px;font-size:14px;font-family:inherit;margin-bottom:16px}
			textarea{min-height:160px;resize:vertical}
			button{background:var(--primary);color:#fff;border:none;border-radius:10px;padding:12px 20px;font-size:14px;font-weight:700;cursor:pointer}
			button:hover{background:var(--primary-hover)}
			.hb-notice{background:#EAF7EE;border:1px solid #BFE6C9;color:#1e5c31;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:14px}
			.hb-error{background:#FDECEC;border:1px solid #F3B9B9;color:#8a1f1f;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:14px}
			.hb-logout{font-size:13px;color:var(--muted)}
		</style>
	</head>
	<body>
	<div class="hb-admin-wrap">
		<h1>HighEnd Blinds — Upload</h1>
		<?php if ( $notice ) : ?><div class="hb-notice"><?php echo esc_html( $notice ); ?></div><?php endif; ?>
		<?php if ( $error ) : ?><div class="hb-error"><?php echo esc_html( $error ); ?></div><?php endif; ?>

		<?php if ( ! $logged_in ) : ?>
			<div class="hb-card">
				<h2>Log In</h2>
				<form method="post">
					<label for="highend_username">Username</label>
					<input type="text" id="highend_username" name="highend_username" required autofocus>
					<label for="highend_password">Password</label>
					<input type="password" id="highend_password" name="highend_password" required>
					<?php wp_nonce_field( 'highend_simple_login', 'highend_login_nonce' ); ?>
					<button type="submit" name="highend_login_submit" value="1">Log In</button>
				</form>
			</div>
		<?php else : ?>
			<p class="hb-logout"><a href="<?php echo esc_url( home_url( '/admin/?logout=1' ) ); ?>">Log out</a></p>

			<div class="hb-card">
				<h2>Add Gallery Photos</h2>
				<form method="post" enctype="multipart/form-data">
					<label for="highend_gallery_file">Photos (JPG — select multiple at once)</label>
					<input type="file" id="highend_gallery_file" name="highend_gallery_file[]" accept="image/jpeg" multiple required>
					<label for="highend_gallery_description">Description (optional — used to name the file(s) for SEO, e.g. "zebra-blinds-living-room-edmonton")</label>
					<input type="text" id="highend_gallery_description" name="highend_gallery_description" placeholder="e.g. zebra blinds living room edmonton">
					<?php wp_nonce_field( 'highend_gallery_upload', 'highend_gallery_nonce' ); ?>
					<button type="submit" name="highend_gallery_submit" value="1">Upload to Gallery</button>
				</form>
			</div>

			<?php
			$uploads          = wp_upload_dir();
			$hb_gallery_dir   = trailingslashit( $uploads['basedir'] ) . 'highend-gallery/';
			$hb_gallery_url   = trailingslashit( $uploads['baseurl'] ) . 'highend-gallery/';
			$hb_gallery_files = array_merge( (array) glob( $hb_gallery_dir . '*.jpg' ), (array) glob( $hb_gallery_dir . '*.jpeg' ) );
			natsort( $hb_gallery_files );
			?>
			<?php if ( $hb_gallery_files ) : ?>
			<div class="hb-card">
				<h2>Rename Gallery Photos</h2>
				<p style="font-size:13px;color:var(--muted);margin-top:-8px">Type a real description for any photo you want to rename (e.g. "zebra blinds kitchen edmonton"). Leave blank to skip a photo.</p>
				<form method="post">
					<?php foreach ( $hb_gallery_files as $hb_file ) : $hb_fname = basename( $hb_file ); ?>
						<div style="display:flex;align-items:center;gap:12px;margin-bottom:14px">
							<img src="<?php echo esc_url( $hb_gallery_url . $hb_fname ); ?>" style="width:64px;height:64px;object-fit:cover;border-radius:8px;flex-shrink:0;margin-bottom:0">
							<div style="flex:1">
								<div style="font-size:12px;color:var(--muted);margin-bottom:4px"><?php echo esc_html( $hb_fname ); ?></div>
								<input type="text" name="highend_rename_name[<?php echo esc_attr( $hb_fname ); ?>]" placeholder="e.g. zebra blinds kitchen edmonton" style="margin-bottom:0">
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_nonce_field( 'highend_rename_photos', 'highend_rename_nonce' ); ?>
					<button type="submit" name="highend_rename_submit" value="1">Rename Filled-In Photos</button>
				</form>
			</div>
			<?php endif; ?>

			<div class="hb-card">
				<h2>Add Blog Post</h2>
				<form method="post" enctype="multipart/form-data">
					<label for="highend_post_title">Title</label>
					<input type="text" id="highend_post_title" name="highend_post_title" required>
					<label for="highend_post_content">Content (## Heading, **bold**, - bullet, [link](url) are all supported)</label>
					<textarea id="highend_post_content" name="highend_post_content" required></textarea>
					<label for="highend_post_image">Featured Image (optional)</label>
					<input type="file" id="highend_post_image" name="highend_post_image" accept="image/*">
					<?php wp_nonce_field( 'highend_post_publish', 'highend_post_nonce' ); ?>
					<button type="submit" name="highend_post_submit" value="1">Publish Post</button>
				</form>
			</div>
		<?php endif; ?>
	</div>
	</body>
	</html>
	<?php
}
