# Brand Builders WordPress theme

This folder contains a WordPress-ready theme for Hostinger. The original static HTML site remains in the project root as a backup.

## Install

1. Install WordPress on the Hostinger domain.
2. In WordPress, open **Appearance > Themes > Add New > Upload Theme**.
3. Upload `brand-builders.zip`.
4. Activate **Brand Builders**.
5. Go to **Settings > Permalinks** and choose **Post name**, then save.
6. Create a page named **Home**, set it as the homepage in **Settings > Reading**, and edit its content with the WordPress editor.
7. Create pages for About, Services, Resources, Case Studies, Blog, Pricing, and Contact.
8. Set up **Appearance > Menus** and assign the menu to **Primary Menu**.
9. Add your logo through **Appearance > Customize > Site Identity**.

## Editing

- Edit page text from **Pages**.
- Add new pages with **Pages > Add New**.
- Add blog articles from **Posts > Add New**.
- Add images through the Media Library or a page's Featured Image panel.
- Edit the footer menu through **Appearance > Menus**.
- Edit contact heading, button text, notification email, and success message through **Appearance > Customize > Contact Form**.

The Contact page uses the `page-contact.php` template automatically when its slug is `contact`. The form sends submissions through WordPress email, so configure a reliable Hostinger mailbox or SMTP plugin before launch.

The current static forms still need a WordPress form plugin or Hostinger/PHP mail handler before accepting real leads.
