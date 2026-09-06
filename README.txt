=== HighEnd Blinds — WordPress Theme ===
Version 1.0.0
Custom theme converted from the approved HTML design.

----------------------------------------------------------------
WHAT THIS GIVES YOU (all editable by you, no code)
----------------------------------------------------------------
- Homepage that matches the approved design (hero slideshow, products,
  why-choose, 50% offer, gallery, Google reviews, blog, contact + map).
- BLOG YOU MANAGE YOURSELF: the homepage "From Our Blog" section and the
  Blog page pull live from WordPress Posts. Add/edit/delete posts in
  WP Admin -> Posts and the site updates automatically.
- Menus, logo, and contact details editable in WP Admin.

----------------------------------------------------------------
INSTALL
----------------------------------------------------------------
1. Log in to WP Admin.
2. Appearance -> Themes -> Add New -> Upload Theme.
3. Choose highend-blinds-wp.zip and click Install, then Activate.

----------------------------------------------------------------
SET THE HOMEPAGE & BLOG PAGE
----------------------------------------------------------------
1. Create two pages: Pages -> Add New -> "Home" (publish), and again "Blog" (publish).
2. Settings -> Reading:
     - "Your homepage displays" = A static page
     - Homepage = Home
     - Posts page = Blog
   Save. The Home page now shows the full designed homepage; the Blog page
   lists all your posts.

----------------------------------------------------------------
ADD A BLOG POST YOURSELF (the part you asked for)
----------------------------------------------------------------
1. WP Admin -> Posts -> Add New.
2. Type a Title and your content.
3. Set a Category (right sidebar) — the category shows as the coloured label.
4. Set a "Featured image" (right sidebar) — this is the post thumbnail.
   (If you skip it, a styled placeholder with the category name is used.)
5. Publish. It appears instantly on the homepage blog section and Blog page.
   Newest posts show first; the homepage shows the latest 6.

----------------------------------------------------------------
NAV MENU
----------------------------------------------------------------
Appearance -> Menus -> create a menu, add Home / Products / Gallery /
Reviews / Blog / About / Contact, assign it to "Primary Menu" location.
(Until you do, a default menu is shown automatically.)

----------------------------------------------------------------
LOGO & CONTACT DETAILS
----------------------------------------------------------------
- Logo: Appearance -> Customize -> Site Identity -> Logo. If none is set,
  the built-in HighEnd Blinds logo is used.
- Phone / email / address: edit the three define() lines at the top of
  functions.php (HIGHEND_PHONE, HIGHEND_EMAIL, HIGHEND_ADDR).

----------------------------------------------------------------
HERO SLIDESHOW IMAGES
----------------------------------------------------------------
By default the hero shows labelled placeholders. To use real photos:
1. Upload photos to Media Library and note each image's ID (in the URL when
   you open it: ...?item=123 -> ID is 123).
2. Appearance -> Customize -> Additional CSS is NOT where this goes; instead
   add the IDs via the theme mod "highend_hero_images" (comma separated,
   e.g. 123,124,125). Easiest: ask your developer to set it, or replace the
   placeholder block in front-page.php.

----------------------------------------------------------------
CONTACT FORM (recommended)
----------------------------------------------------------------
The built-in form is visual only. To capture + email submissions, install a
form plugin (WPForms or Fluent Forms), build a form, copy its shortcode, then
Appearance -> Customize and set the theme mod "highend_form_shortcode" to that
shortcode. It will replace the static form.

----------------------------------------------------------------
RECOMMENDED PLUGINS
----------------------------------------------------------------
- Rank Math or Yoast SEO       (SEO tools)
- WPForms or Fluent Forms      (contact form + estimate requests)
- An image gallery plugin      (project gallery), or use the WP Gallery block
- Google Site Kit              (connect Google reviews / Analytics)

----------------------------------------------------------------
GOOGLE MAP
----------------------------------------------------------------
The contact map is embedded for 3261 Parsons Rd NW, Edmonton. To change it,
edit the iframe "q=" address in front-page.php.

Questions? Keep this file for reference.
