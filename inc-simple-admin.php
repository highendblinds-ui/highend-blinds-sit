<?php
/**
 * Simple /admin tool: a plain login screen (using real WP accounts) plus a
 * minimal form to upload a gallery photo or publish a blog post, without
 * needing the full wp-admin dashboard.
 */

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
			} elseif ( empty( $_FILES['highend_gallery_file']['name'] ) ) {
				$error = 'Please choose a photo to upload.';
			} else {
				require_once ABSPATH . 'wp-admin/includes/file.php';
				$overrides = array( 'test_form' => false, 'mimes' => array( 'jpg|jpeg' => 'image/jpeg' ) );
				$moved     = wp_handle_upload( $_FILES['highend_gallery_file'], $overrides );
				if ( isset( $moved['error'] ) ) {
					$error = 'Upload failed: ' . $moved['error'];
				} else {
					$dir      = get_template_directory() . '/assets/images/';
					$existing = glob( $dir . 'gallery-*.jpg' );
					$max      = 0;
					foreach ( (array) $existing as $file ) {
						if ( preg_match( '/gallery-(\d+)\.jpg$/i', $file, $m ) ) {
							$max = max( $max, (int) $m[1] );
						}
					}
					$next_name = 'gallery-' . ( $max + 1 ) . '.jpg';
					if ( @copy( $moved['file'], $dir . $next_name ) ) {
						$notice = 'Photo added to the gallery as ' . esc_html( $next_name ) . '.';
					} else {
						$error = 'Photo uploaded, but could not be copied into the gallery folder. Please check folder permissions.';
					}
				}
			}
		}

		if ( isset( $_POST['highend_post_submit'] ) && current_user_can( 'publish_posts' ) ) {
			if ( ! isset( $_POST['highend_post_nonce'] ) || ! wp_verify_nonce( $_POST['highend_post_nonce'], 'highend_post_publish' ) ) {
				$error = 'Your session expired. Please try again.';
			} else {
				$title   = sanitize_text_field( $_POST['highend_post_title'] ?? '' );
				$content = wp_kses_post( wpautop( (string) ( $_POST['highend_post_content'] ?? '' ) ) );
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
							}
						}
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
				<h2>Add Gallery Photo</h2>
				<form method="post" enctype="multipart/form-data">
					<label for="highend_gallery_file">Photo (JPG)</label>
					<input type="file" id="highend_gallery_file" name="highend_gallery_file" accept="image/jpeg" required>
					<?php wp_nonce_field( 'highend_gallery_upload', 'highend_gallery_nonce' ); ?>
					<button type="submit" name="highend_gallery_submit" value="1">Upload to Gallery</button>
				</form>
			</div>

			<div class="hb-card">
				<h2>Add Blog Post</h2>
				<form method="post" enctype="multipart/form-data">
					<label for="highend_post_title">Title</label>
					<input type="text" id="highend_post_title" name="highend_post_title" required>
					<label for="highend_post_content">Content</label>
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
