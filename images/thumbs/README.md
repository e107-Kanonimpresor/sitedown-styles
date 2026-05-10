# Template thumbnails

Drop one image per skin here. The admin gallery (`/e107_admin/admin.php?mode=main&action=templates`) auto-detects them.

## Naming convention

`<style_key>.<ext>` — first match wins, in this order: `.jpg`, `.jpeg`, `.png`, `.webp`.

Required keys:

- `agency`
- `business`
- `construction`
- `creative`
- `gardening`
- `handyman`
- `marketing`
- `restaurant`

## Recommended specs

- **Aspect ratio**: 16:9 (cards crop to this)
- **Size**: 800×450 px (or larger; will be downscaled)
- **Format**: JPG or WebP for screenshots, PNG only if transparency is needed
- **Weight**: < 80 KB ideally (use TinyPNG / Squoosh)

## Capture workflow

1. Open the live preview: `/e107_plugins/sitedown_styles/preview.php?style=<key>`
2. Take a screenshot of the visible area (1280 px wide is plenty)
3. Crop to 16:9 highlighting the most representative section
4. Compress and save as `<key>.jpg`

## Fallback

If a thumbnail is missing, the card falls back to a colored gradient + Font Awesome icon (defined in `admin_config.php::templatesPage()` `$templates` array).
