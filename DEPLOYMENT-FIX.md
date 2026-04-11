# Deployment Fix - Missing Files Issue

## Problem Identified

After deploying to Hostinger, the following 404 errors occurred:

-   `app-CdDEoC4N.css` - Failed to load resource: the server responded with a status of 404
-   `theme.js` - Failed to load resource: the server responded with a status of 404

Additional errors observed:

-   Assets being looked for in `/dist/assets/` but files were in `/dist/`
-   The TailPress ViteCompiler expects assets in an `assets/` subdirectory

### Root Causes

1. **Missing `resources` folder**: The `.distignore` file excludes `/resources` from deployment, but `functions.php` was trying to load `theme.js` from `/resources/js/theme.js`

2. **`theme.js` not in build process**: `theme.js` was not included in the Vite build configuration, so it wasn't being compiled to the `dist/` folder

3. **Missing built assets**: The Vite build creates a `dist/` folder with compiled files, but `theme.js` wasn't part of this build

4. **Incorrect asset paths**: The TailPress ViteCompiler expects assets in `/dist/assets/` subdirectory, but the initial configuration put them directly in `/dist/`

## Solutions Implemented

### 1. Updated `functions.php` (lines 57-80)

Changed the `tim_wordpress_enqueue_scripts()` function to:

-   First check for the built `theme.js` file in `dist/` folder
-   Fall back to the source file in `resources/` if the built file doesn't exist
-   This ensures compatibility during development and after deployment

### 2. Updated `vite.config.mjs` (lines 14-41)

Enhanced the Vite build configuration to:

-   Include `theme.js` in the build input files
-   Keep `theme.js` filename consistent (without hash) for easier referencing
-   Keep `editor-style.css` filename consistent (without hash)
-   Put hashed assets in `assets/` subdirectory (required by TailPress ViteCompiler)
-   Apply hashing to other assets for cache busting

### 3. Fixed Asset Paths

Updated the Vite output configuration to place hashed assets in the `assets/` subdirectory:

-   `assets/app-[hash].js` (instead of `app-[hash].js`)
-   `assets/app-[hash].css` (instead of `app-[hash].css`)
-   This matches the TailPress ViteCompiler's expected structure

Changed the `tim_wordpress_enqueue_scripts()` function to:

-   First check for the built `theme.js` file in `dist/` folder
-   Fall back to the source file in `resources/` if the built file doesn't exist
-   This ensures compatibility during development and after deployment

```php
function tim_wordpress_enqueue_scripts()
{
    $theme_js_path = get_template_directory() . '/dist/theme.js';
    $theme_js_uri = get_template_directory_uri() . '/dist/theme.js';

    // Check if built file exists, otherwise fall back to source file
    if (file_exists($theme_js_path)) {
        wp_enqueue_script(
            'tim-wordpress-theme',
            $theme_js_uri,
            array(),
            filemtime($theme_js_path),
            true
        );
    } else {
        wp_enqueue_script(
            'tim-wordpress-theme',
            get_template_directory_uri() . '/resources/js/theme.js',
            array(),
            filemtime(get_template_directory() . '/resources/js/theme.js'),
            true
        );
    }
}
```

### 2. Updated `vite.config.mjs` (lines 14-41)

Enhanced the Vite build configuration to:

-   Include `theme.js` in the build input files
-   Keep `theme.js` filename consistent (without hash) for easier referencing
-   Keep `editor-style.css` filename consistent (without hash)
-   Put hashed assets in `assets/` subdirectory (required by TailPress ViteCompiler)
-   Apply hashing to other assets for cache busting

```javascript
rollupOptions: {
    input: [
        "resources/js/theme.js",
        "resources/js/app.js",
        "resources/css/app.css",
        "resources/css/editor-style.css",
    ],
    output: {
        entryFileNames: (chunkInfo) => {
            // Keep theme.js as is, put others in assets/
            return chunkInfo.name === "theme"
                ? "theme.js"
                : "assets/[name]-[hash].js";
        },
        chunkFileNames: "assets/[name]-[hash].js",
        assetFileNames: (assetInfo) => {
            // Keep editor-style.css as is, put others in assets/
            if (assetInfo.name === "editor-style.css") {
                return "editor-style.css";
            }
            return "assets/[name]-[hash][extname]";
        },
    },
}
```

## How the Deployment Works

1. **Build Process**: The GitHub Actions workflow runs `npm run build` which creates the `dist/` folder with:

    - `theme.js` (compiled from `resources/js/theme.js`)
    - `assets/app-[hash].js` (compiled from `resources/js/app.js`)
    - `assets/app-[hash].css` (compiled from `resources/css/app.css`)
    - `editor-style.css` (compiled from `resources/css/editor-style.css`)
    - `.vite/manifest.json` (Vite manifest for asset mapping)

2. **Deployment**: The workflow uses rsync to copy files to `deploy-package/`, excluding patterns in `.distignore`:

    - `/resources` is excluded (source files not needed in production)
    - `/dist` is NOT excluded (built assets ARE needed in production)
    - Hidden files are removed EXCEPT `*/dist/.vite` (Vite manifest is preserved)

3. **FTP Upload**: The `deploy-package/` folder is uploaded to Hostinger via FTP

## Testing the Fix

### Local Testing

1. Run the build command:

```bash
npm run build
```

2. Verify the `dist/` folder was created with:

    - `theme.js`
    - `assets/app-[hash].js`
    - `assets/app-[hash].css`
    - `editor-style.css`
    - `.vite/manifest.json`

3. Check that your local development environment still works

### Deployment Testing

1. Commit the changes:

```bash
git add functions.php vite.config.mjs
git commit -m "Fix deployment - include theme.js in build and use dist folder"
git push
```

2. The GitHub Actions workflow will automatically:

    - Build the assets
    - Create the deployment package
    - Deploy to Hostinger

3. After deployment, verify:
    - No 404 errors in browser console
    - `theme.js` loads from `/wp-content/themes/tim-wordpress/dist/theme.js`
    - CSS and JS files load correctly from `/wp-content/themes/tim-wordpress/dist/assets/` with hashed names

## Files Modified

-   `functions.php` - Updated asset enqueuing to use built files
-   `vite.config.mjs` - Added theme.js to build process and configured output naming

## Files Created

-   `DEPLOYMENT-FIX.md` - This documentation file

## Additional Notes

-   The `resources/` folder contains source files that are compiled during build
-   The `dist/` folder contains production-ready compiled files
-   Source files in `resources/` are excluded from deployment to reduce file size
-   The Vite manifest (`.vite/manifest.json`) is preserved during deployment for proper asset mapping
-   The TailPress ViteCompiler handles the hashed assets (app.js, app.css) using the manifest
-   `theme.js` and `editor-style.css` keep their original names for consistency and easier referencing
