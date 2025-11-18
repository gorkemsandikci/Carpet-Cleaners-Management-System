# Dynamic Multi-Tenant Website Management System

## Overview

This project has been upgraded to support **multi-tenant architecture** with **fully dynamic website customization**. Each company can have their own website with customizable settings managed through an admin panel.

## Key Features

### 1. Multi-Tenant Support
- **Company Model**: Each company has its own settings, users, and data
- **Isolated Data**: Companies can't access each other's data
- **Scalable**: Easy to add new companies/tenants

### 2. Dynamic Website Settings
All website settings can be managed from the admin panel:

#### General Settings
- Site Name
- Site Description
- Logo
- Favicon

#### Contact Information
- Address
- Phone
- Email
- WhatsApp
- Map (embed code)

#### SEO Settings
- Meta Title
- Meta Description
- Meta Keywords
- Google Analytics
- Google Tag Manager

#### Social Media
- Facebook
- Instagram
- Twitter
- LinkedIn
- YouTube

#### Theme Settings
- Primary Color
- Secondary Color
- Accent Color
- Header Background
- Footer Background

### 3. Settings Management
- **Grouped Settings**: Settings are organized by groups (general, contact, seo, social, theme)
- **Multiple Data Types**: Supports text, textarea, number, email, url, image, color, and JSON
- **Bulk Update**: Update all settings at once
- **Dynamic Rendering**: Frontend automatically uses the settings

## Installation & Setup

### 1. Run Migrations
```bash
php artisan migrate
```

### 2. Seed Database
```bash
php artisan db:seed
```

This will create:
- Default company
- Admin user (admin@admin.com / admin123)
- Test user (test@test.com / test123)
- Default settings for the company

### 3. Access Admin Panel
- Login URL: `/login`
- Admin Email: `admin@admin.com`
- Admin Password: `admin123`
- Settings Page: `/panel/settings`

## Usage

### Managing Settings

1. **Login to Admin Panel**: `/login`
2. **Navigate to Settings**: Click "Website Settings" in sidebar
3. **Edit Settings**: Modify any setting value
4. **Save**: Click "Save All Settings" button

### Adding New Settings

You can add new settings programmatically or through the admin panel:

```php
SiteSetting::create([
    'company_id' => $companyId,
    'name' => 'custom_setting',
    'type' => 'text', // text, textarea, number, email, url, image, color, json
    'group' => 'general', // general, contact, seo, social, theme, custom
    'data' => 'Default Value',
]);
```

### Using Settings in Views

Settings are automatically available in all views via `$settings` array:

```blade
{{ $settings['site_name'] ?? 'Default Name' }}
{{ $settings['contact_phone'] ?? '' }}
```

### Creating New Companies

```php
$company = Company::create([
    'name' => 'New Company',
    'slug' => 'new-company',
    'email' => 'info@newcompany.com',
    'phone' => '+90 555 123 4567',
    'status' => '1',
]);

// Initialize default settings
SiteSettingController::initializeDefaultSettings($company->id);
```

## File Structure

### Models
- `app/Models/Company.php` - Company/Tenant model
- `app/Models/SiteSetting.php` - Settings model (updated)
- `app/Models/User.php` - User model (updated with company relationship)

### Controllers
- `app/Http/Controllers/Backend/SiteSettingController.php` - Settings management

### Migrations
- `database/migrations/*_create_companies_table.php` - Companies table
- `database/migrations/*_add_company_id_to_site_settings_table.php` - Add company to settings
- `database/migrations/*_add_company_id_to_users_table.php` - Add company to users

### Views
- `resources/views/backend/pages/settings/index.blade.php` - Settings management page

### Middleware
- `app/Http/Middleware/SiteSettingMiddleware.php` - Loads company-specific settings
- `app/Http/Middleware/PanelSettingMiddleware.php` - Loads settings for panel

## Database Schema

### companies
- id
- name
- slug (unique)
- domain (nullable, unique)
- email
- phone
- address
- status
- timestamps

### site_settings
- id
- company_id (foreign key)
- name
- type (text, textarea, number, email, url, image, color, json)
- group (general, contact, seo, social, theme)
- data (JSON/text)
- timestamps

### users
- id
- company_id (foreign key)
- ... (other user fields)

## Customization

### Adding New Setting Groups

1. Add settings to `SiteSettingController::initializeDefaultSettings()`
2. Settings will automatically appear in the admin panel grouped by `group` field

### Custom Setting Types

The system supports these types:
- `text` - Single line text input
- `textarea` - Multi-line text input
- `number` - Numeric input
- `email` - Email input
- `url` - URL input
- `image` - Image upload
- `color` - Color picker
- `json` - JSON textarea

### Frontend Integration

Settings are automatically loaded via middleware and available in all views. The frontend layout uses these settings for:
- Page title and meta tags
- Favicon
- CSS variables for theme colors
- Contact information
- Social media links

## Security

- Each user belongs to a company
- Settings are filtered by company_id
- Users can only access their company's settings
- Admin panel requires authentication

## Future Enhancements

- Domain-based routing for multi-tenant
- Custom themes per company
- Advanced permission system
- Setting import/export
- Setting templates/presets

