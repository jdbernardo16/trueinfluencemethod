# How to Add Descriptions to Menu Items

This guide shows you exactly how to add descriptions to your menu items in WordPress.

## Step-by-Step Instructions

### Step 1: Go to Menus

1. Log in to your WordPress admin
2. Go to **Appearance > Menus**

### Step 2: Enable the Description Field

**Important:** By default, the Description field might be hidden in the menu editor. You need to enable it first.

1. At the top right of the menu editor page, click **"Screen Options"**
2. Check the box next to **"Description"**
3. The Description field will now appear for each menu item

### Step 3: Add Description to a Parent Menu Item

1. Find the parent menu item (e.g., "Programs")
2. Click the **arrow** (▶) next to the menu item to expand it
3. Scroll down to find the **"Description"** field
4. Enter your description text
5. Click **"Save Menu"**

### Example Description for "Programs"

```
Transform your speaking skills with our comprehensive programs designed for every stage of your journey.
```

### Example Description for "About"

```
Discover the True Influence Method and learn about Joanna's journey from speaker to leadership coach.
```

### Example Description for "Community"

```
Join our community of speakers and leaders, access exclusive content, and attend transformational events.
```

### Example Description for "Resources"

```
Access articles, speaking tips, media features, and podcasts to accelerate your growth.
```

## Visual Guide

### Menu Item with Description Field

```
┌─────────────────────────────────────────────────────────┐
│ Programs                                             │
│ ▼                                                    │
│                                                       │
│ Navigation Label: Programs                               │
│ Title Attribute:                                       │
│ CSS Classes (optional):                                │
│ Link Relationship (XFN):                                │
│ Description:                                           │
│ ┌───────────────────────────────────────────────────┐  │
│ │ Transform your speaking skills with our            │  │
│ │ comprehensive programs designed for every stage   │  │
│ │ of your journey.                                │  │
│ └───────────────────────────────────────────────────┘  │
│                                                       │
│ Move: Up | Down | One level up | One level down        │
│                                                       │
│ [Remove] [Cancel]                                     │
└─────────────────────────────────────────────────────────┘
```

## Where Descriptions Appear

### Desktop Dropdown Overlay

When you hover over a parent menu item on desktop:

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                                                                     │
│  Programs  About  Community  Resources  Success Stories  FAQ  Apply     │
│                                                                     │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                     │
│  Corporate Programs                    Transform your speaking skills    │
│  90-day mastermind                    with our comprehensive programs  │
│  Private Training                      designed for every stage of      │
│                                      your journey.                  │
│                                                                     │
└─────────────────────────────────────────────────────────────────────────────┘
```

The description appears on the right side of the dropdown overlay.

### Mobile Menu

On mobile, descriptions are **not displayed** to save screen space. Only the menu items are shown.

## Tips for Writing Good Descriptions

1. **Keep it concise**: Aim for 1-2 sentences
2. **Focus on value**: Tell users what they'll find or gain
3. **Use active language**: "Transform your skills" vs "Skills can be transformed"
4. **Be specific**: Mention what's available in that section
5. **Match your brand voice**: Use the same tone as your website

## Troubleshooting

### Description Field Not Visible

**Problem:** You don't see the Description field when expanding a menu item.

**Solution:**

1. Click **"Screen Options"** at the top right of the page
2. Check the box next to **"Description"**
3. The field will now appear

### Description Not Showing on Frontend

**Problem:** You added a description but it's not appearing in the dropdown.

**Solution:**

1. Make sure you clicked **"Save Menu"** after adding the description
2. Clear your browser cache
3. Check that the menu item is a **parent item with children**
4. Verify you're viewing the **desktop version** (descriptions don't show on mobile)

### Description Too Long

**Problem:** The description is getting cut off or looking messy.

**Solution:**

1. Keep descriptions to 1-2 sentences (around 100-150 characters)
2. Edit the menu item and shorten the description
3. Click **"Save Menu"**

## Quick Reference

| Menu Item | Description                                                                                               |
| --------- | --------------------------------------------------------------------------------------------------------- |
| Programs  | Transform your speaking skills with our comprehensive programs designed for every stage of your journey.  |
| About     | Discover the True Influence Method and learn about Joanna's journey from speaker to leadership coach.     |
| Community | Join our community of speakers and leaders, access exclusive content, and attend transformational events. |
| Resources | Access articles, speaking tips, media features, and podcasts to accelerate your growth.                   |

## Need More Help?

If you're still having trouble:

1. Check the [Manual Menu Creation Guide](MANUAL-MENU-CREATION-GUIDE.md) for more details
2. Review the [PrimaryNavWalker](src/Walkers/PrimaryNavWalker.php) code to understand how descriptions are rendered
3. Check your browser console for JavaScript errors
4. Make sure you're using the latest version of the theme
