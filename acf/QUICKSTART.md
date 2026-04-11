# ACF CMS Quick Start Guide

This guide will help you quickly get started with the ACF CMS for your tim-wordpress theme.

## Prerequisites

✅ ACF Pro plugin installed and activated
✅ WordPress theme set to use "Front Page" template
✅ Git repository initialized

## Quick Setup (5 Minutes)

### 1. Verify ACF Files Are Loaded

1. Log in to WordPress admin
2. Navigate to **Pages → Front Page**
3. Scroll down to see the ACF field groups:
    - Hero Section
    - Intro Section
    - Paths Section
    - Social Proof Section
    - CTA Section

If you see these field groups, everything is working! 🎉

### 2. Edit Your First Field

1. In the **Hero Section** field group
2. Change the **Main Heading** field
3. Click **Update** to save the page
4. Visit your front page to see the change

### 3. Test All Field Groups

Go through each field group and make a small change:

-   **Hero Section**: Change the heading text
-   **Intro Section**: Add a feature item
-   **Paths Section**: Edit a path description
-   **Social Proof Section**: Add a testimonial
-   **CTA Section**: Change the CTA button text

Each change should appear immediately on your front page.

## Common Tasks

### Adding a New Feature to Intro Section

1. Scroll to **Intro Section**
2. Find the **Features** repeater
3. Click **Add Feature**
4. Upload an image
5. Enter title and subtitle
6. Click **Update**

### Adding a New Path

1. Scroll to **Paths Section**
2. Find the **Paths** repeater
3. Click **Add Path**
4. Fill in all fields:
    - Icon: Select from dropdown
    - Title: e.g., "New Program"
    - Description: Program details
    - Price: e.g., "$5,000"
    - CTA: Button text and link
    - Badge: e.g., "New"
5. Add features in the nested **Features** repeater
6. Click **Update**

### Adding a Testimonial

1. Scroll to **Social Proof Section**
2. Find the **Testimonials** repeater
3. Click **Add Testimonial**
4. Fill in:
    - Quote: The testimonial text
    - Author: Client name
    - Type: e.g., "Private Client"
    - Image: Upload client photo
5. Click **Update**

## Updating Images

### Replacing the Hero Logo

1. Scroll to **Hero Section**
2. Find **Logo Image** field
3. Click **Upload Image**
4. Select new image from media library
5. Click **Update**

### Changing Background Images

Each section with a background image has its own field:

-   **Hero Section**: Video Poster Image
-   **Intro Section**: Main Image
-   **CTA Section**: Background Image

Follow the same process to replace any image.

## Git Workflow

### After Making Content Changes

```bash
# Check what changed
git status

# Add modified files
git add acf/ template-parts/

# Commit with descriptive message
git commit -m "Update hero section heading and add new testimonial"

# Push to GitHub
git push origin main
```

### Deploying to Hostinger

```bash
# SSH into your server
ssh user@your-hostinger-server.com

# Navigate to theme directory
cd public_html/wp-content/themes/tim-wordpress

# Pull latest changes
git pull origin main
```

**That's it!** Your ACF fields and content are now live.

## Troubleshooting

### "I don't see the ACF fields in the admin"

**Solution:**

1. Check that ACF Pro is activated: **Plugins → Installed Plugins**
2. Verify page template: **Pages → Front Page → Page Attributes → Template**
3. Clear browser cache and refresh the page

### "Changes aren't showing on the front page"

**Solution:**

1. Make sure you clicked **Update** on the page
2. Clear WordPress cache: **Settings → Clear Cache** (if using a cache plugin)
3. Check for PHP errors: Enable `WP_DEBUG` in `wp-config.php`
4. Verify field names match between registration and template

### "Images aren't loading"

**Solution:**

1. Make sure images are uploaded to WordPress media library
2. Check file permissions on uploads directory
3. Verify image URLs are correct in the page source
4. Clear browser cache

### "Repeater fields aren't working"

**Solution:**

1. Make sure you clicked **Add [Item]** in the repeater
2. Check that subfields are filled out
3. Verify the repeater is being used correctly in the template
4. Check browser console for JavaScript errors

## Next Steps

### Customize Your Content

Now that everything is working, start customizing:

1. **Hero Section**: Update with your branding
2. **Intro Section**: Add your unique features
3. **Paths Section**: Customize your offerings
4. **Social Proof**: Add real client testimonials
5. **CTA Section**: Update with your calls-to-action

### Add More Pages

The ACF structure is set up for the front page. To add ACF to other pages:

1. Create a new field group file in [`acf/fields/`](fields/)
2. Change the location rule to match your page template
3. Update the corresponding template file

### Extend Functionality

Consider adding:

-   Global theme settings (logo, colors, contact info)
-   Custom post type fields (articles, blog, media, tips)
-   Page builder components
-   Dynamic content sections

## Resources

-   📖 [Full Documentation](README.md)
-   📐 [Implementation Plan](../plans/acf-cms-implementation-plan.md)
-   🗺️ [Architecture Diagram](../plans/acf-architecture-diagram.md)
-   🔧 [ACF Pro Documentation](https://www.advancedcustomfields.com/resources/)

## Support

If you need help:

1. Check the [troubleshooting section](#troubleshooting) above
2. Review the [full documentation](README.md)
3. Consult ACF Pro documentation
4. Contact your development team

## Tips for Success

✅ **Always save your changes** - Click **Update** after editing fields
✅ **Use descriptive alt text** - Helps with SEO and accessibility
✅ **Optimize images** - Compress before uploading for better performance
✅ **Test on mobile** - Ensure content looks good on all devices
✅ **Keep backups** - Commit regularly to Git
✅ **Document changes** - Use clear commit messages

---

**You're all set!** 🚀

Start editing your front page content through the WordPress admin and enjoy the flexibility of your new ACF CMS.
