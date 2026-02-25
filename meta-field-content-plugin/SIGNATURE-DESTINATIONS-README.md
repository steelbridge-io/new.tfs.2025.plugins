# Signature Destinations Repeater Field

## Overview

Modern repeater field implementation for Signature Destinations that replaces 62 hardcoded fields with a dynamic, user-friendly interface.

## What's New

### ✅ Features

- **Unlimited destinations** - Add as many as you need
- **Drag & drop reordering** - Intuitive sorting
- **Collapse/expand rows** - Better organization
- **Clean media uploader** - Reuses existing efficient pattern (107 lines vs 13,427!)
- **Backward compatible** - Automatically reads old data
- **Event delegation** - No ID conflicts, scales infinitely

### 📁 Files Added

```
meta-field-content-plugin/
├── includes/
│   └── signature-destinations-meta.php    # Meta box & save logic
└── js/
    └── signature-destinations-admin.js    # Admin UI interactions
```

### 🔧 Modified Files

- `meta-field-content-plugin.php` - Added includes and script enqueuing

### 🎨 New Template (Optional)

- `signature-template-v2.php` - Clean template using new format

## How It Works

### Admin Side

1. **Meta Box** appears on posts/pages using signature templates
2. **Add Destination** button creates new rows dynamically
3. **Media uploader** uses WordPress native media library (event delegation)
4. **Drag & drop** to reorder destinations
5. **Collapse/expand** for easier management

### Data Storage

**New Format:**
```php
'signature_destinations_repeater' => [
    [
        'title' => 'Alaska',
        'link' => 'https://example.com/alaska',
        'image' => 'https://example.com/image.jpg',
        'caption' => 'Fish pristine waters...'
    ],
    // ... more destinations
]
```

**Old Format (still supported):**
```php
'signature-image-1' => 'url'
'signature-image-1-title' => 'title'
'signature-image-1-title-link' => 'link'
'signature-image-1-caption' => 'caption'
// ... repeated 62 times
```

### Template Usage

#### New Helper Function

```php
$destinations = get_signature_destinations(get_the_ID());

foreach ($destinations as $destination) {
    echo $destination['title'];
    echo $destination['link'];
    echo $destination['image'];
    echo $destination['caption'];
}
```

#### Automatic Fallback

The helper function automatically:
1. Checks for new repeater format first
2. Falls back to old individual meta fields if needed
3. Returns consistent array structure

## Migration Path

### Option 1: Automatic (Recommended)

Old data is automatically detected and displayed. When you edit a post:

1. Open post in admin
2. See old data loaded in repeater
3. Save post to convert to new format
4. Old meta fields remain (safe backup)

### Option 2: Keep Both Templates

- `signature-template.php` - Original (62 hardcoded fields)
- `signature-template-v2.php` - New repeater version

Switch templates per-page as you migrate.

### Option 3: Bulk Migration Script

If needed, create a one-time migration script:

```php
function migrate_all_signature_destinations() {
    $posts = get_posts([
        'post_type' => ['page', 'post', 'travel_cpt'],
        'numberposts' => -1,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-templates/signature-template.php'
    ]);

    foreach ($posts as $post) {
        $destinations = get_signature_destinations($post->ID);
        if (!empty($destinations)) {
            update_post_meta($post->ID, 'signature_destinations_repeater', $destinations);
        }
    }
}
```

## Advantages Over Old System

| Feature | Old (sbm-image-field) | New (meta-field-content-plugin) |
|---------|----------------------|----------------------------------|
| **JavaScript Size** | 13,427 lines | 107 lines |
| **Max Destinations** | 62 (hardcoded) | Unlimited |
| **Code Duplication** | Massive | None |
| **Reordering** | Manual field editing | Drag & drop |
| **User Experience** | Tab through 62 fields | Add as needed |
| **Maintenance** | Nightmare | Simple |
| **Backward Compatibility** | N/A | Automatic |

## Testing Checklist

### In Docker Environment

- [ ] Activate `meta-field-content-plugin`
- [ ] Edit a page with signature template
- [ ] See "Signature Destinations" meta box
- [ ] Add new destination with image
- [ ] Test drag & drop reordering
- [ ] Test collapse/expand
- [ ] Save and verify frontend display
- [ ] Test with page that has old format data
- [ ] Verify backward compatibility

### Migration Test

- [ ] Create test page with old meta fields
- [ ] Switch to new template
- [ ] Verify all old data displays
- [ ] Edit in admin - see old data loaded
- [ ] Save and verify conversion
- [ ] Check old meta still exists (backup)

## Deactivating Old Plugin

Once tested and confirmed working:

```php
// In wp-admin/plugins.php
// Deactivate: SBM Image Field Plugin
// Keep files as backup, but don't delete yet
```

## Support & Notes

- **Clean uninstall**: Old meta fields remain untouched
- **Rollback**: Just reactivate old plugin and switch template
- **Performance**: Event delegation means zero performance impact with 5 or 500 destinations
- **Extensibility**: Easy to add new fields (subtitle, button text, etc.)

## Future Enhancements (Optional)

1. Add subtitle field
2. Add custom button text
3. Add image alt text field
4. Export/import destinations
5. Duplicate destination button
6. Bulk actions (delete multiple, etc.)

---

**Author**: Chris Parsons
**Date**: February 2026
**Version**: 1.1
