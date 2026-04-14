<?php

if (!defined('ABSPATH')) {
    exit;
}

// Worddown settings schema config
return [
    'tabs' => [
        [
            'key' => 'general',
            'label' => __('General', 'worddown'),
            'icon' => 'settings',
            'sections' => [
                [
                    'title' => __('Content to Export', 'worddown'),
                    'fields' => [
                        [
                            'key' => 'export_post_types',
                            'type' => 'post_types',
                            'label' => __('Post Types', 'worddown'),
                            'description' => __('Select post types to export', 'worddown'),
                            'default' => ['post', 'page'],
                        ],
                        [
                            'key' => 'include_drafts',
                            'type' => 'boolean',
                            'label' => __('Drafts', 'worddown'),
                            'switch_label' => __('Include draft posts in export', 'worddown'),
                            'description' => __('This will include draft posts in the export.', 'worddown'),
                            'default' => false,
                        ],
                        [
                            'key' => 'include_private',
                            'type' => 'boolean',
                            'label' => __('Private', 'worddown'),
                            'switch_label' => __('Include private posts in export', 'worddown'),
                            'description' => __('This will include private posts in the export.', 'worddown'),
                            'default' => false,
                        ],
                        [
                            'key' => 'chunk_size',
                            'type' => 'number',
                            'label' => __('Chunk Size', 'worddown'),
                            'description' => __('Number of posts to process in each batch during background exports. Lower values use less memory but take longer.', 'worddown'),
                            'default' => 50,
                            'min' => 10,
                            'max' => 200,
                            'step' => 10,
                        ],
                    ],
                ],
                [
                    'title' => __('Metadata to include', 'worddown'),
                    'description' => __('Choose which meta fields to include at the top of each exported markdown file.', 'worddown'),
                    'fields' => [
                        [
                            'key' => 'export_meta_date',
                            'type' => 'boolean',
                            'label' => __('Date', 'worddown'),
                            'switch_label' => __('Include publication date', 'worddown'),
                            'description' => __('Adds the `date` field (Y-m-d H:i:s).', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_modified',
                            'type' => 'boolean',
                            'label' => __('Modified', 'worddown'),
                            'switch_label' => __('Include last modified date', 'worddown'),
                            'description' => __('Adds the `modified` field (Y-m-d H:i:s).', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_slug',
                            'type' => 'boolean',
                            'label' => __('Slug', 'worddown'),
                            'switch_label' => __('Include post slug', 'worddown'),
                            'description' => __('Adds the `slug` field.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_id',
                            'type' => 'boolean',
                            'label' => __('Post ID', 'worddown'),
                            'switch_label' => __('Include WordPress post ID', 'worddown'),
                            'description' => __('Adds the `id` field.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_type',
                            'type' => 'boolean',
                            'label' => __('Post type', 'worddown'),
                            'switch_label' => __('Include post type', 'worddown'),
                            'description' => __('Adds the `type` field.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_excerpt',
                            'type' => 'boolean',
                            'label' => __('Excerpt', 'worddown'),
                            'switch_label' => __('Include excerpt', 'worddown'),
                            'description' => __('Adds the `excerpt` field.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_permalink',
                            'type' => 'boolean',
                            'label' => __('Permalink', 'worddown'),
                            'switch_label' => __('Include permalink URL', 'worddown'),
                            'description' => __('Adds the `permalink` field.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_category',
                            'type' => 'boolean',
                            'label' => __('Categories', 'worddown'),
                            'switch_label' => __('Include category names', 'worddown'),
                            'description' => __('Adds the `category` field when the post has categories.', 'worddown'),
                            'default' => true,
                        ],
                        [
                            'key' => 'export_meta_author',
                            'type' => 'field_group',
                            'label' => __('Author', 'worddown'),
                            'description' => __('Optional author metadata under `author`. Can expose personal or account data; only enable what you intend to publish.', 'worddown'),
                            'boxed' => true,
                            'fields' => [
                                [
                                    'key' => 'export_meta_author_username',
                                    'type' => 'boolean',
                                    'label' => __('Username', 'worddown'),
                                    'switch_label' => __('Include login name', 'worddown'),
                                    'description' => __('Adds `author.username`. May expose account identifiers if files are shared.', 'worddown'),
                                    'default' => false,
                                ],
                                [
                                    'key' => 'export_meta_author_name',
                                    'type' => 'boolean',
                                    'label' => __('Display name', 'worddown'),
                                    'switch_label' => __('Include display name', 'worddown'),
                                    'description' => __('Adds `author.name` (WordPress display name).', 'worddown'),
                                    'default' => false,
                                ],
                                [
                                    'key' => 'export_meta_author_email',
                                    'type' => 'boolean',
                                    'label' => __('Email', 'worddown'),
                                    'switch_label' => __('Include email address', 'worddown'),
                                    'description' => __('Adds `author.email`. Sensitive: can end up in git, backups, or public URLs.', 'worddown'),
                                    'default' => false,
                                ],
                                [
                                    'key' => 'export_meta_author_roles',
                                    'type' => 'boolean',
                                    'label' => __('Role slugs', 'worddown'),
                                    'switch_label' => __('Include WordPress role slugs', 'worddown'),
                                    'description' => __('Adds `author.roles` (list of WordPress role slugs).', 'worddown'),
                                    'default' => false,
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => __('Adapters (Page Builders, etc.)', 'worddown'),
                    'fields' => [
                        [
                            'key' => 'adapters',
                            'type' => 'adapters',
                            'label' => __('Adapters', 'worddown'),
                            'description' => __('Enable or disable adapters for export.', 'worddown'),
                        ],
                    ],
                ],
            ],
        ],
        [
            'key' => 'schedule',
            'label' => __('Schedule', 'worddown'),
            'icon' => 'calendar-sync',
            'sections' => [
                [
                    'title' => __('WP Cron', 'worddown'),
                    'fields' => [
                        [
                            'key' => 'auto_export',
                            'type' => 'boolean',
                            'label' => __('Automatic Export', 'worddown'),
                            'switch_label' => __('Run export automatically', 'worddown'),
                            'description' => __('This will run the export automatically.', 'worddown'),
                            'default' => false,
                        ],
                        [
                            'key' => 'export_frequency',
                            'type' => 'select',
                            'label' => __('Export Frequency', 'worddown'),
                            'description' => __('How often to run the export', 'worddown'),
                            'options' => [
                                ['value' => 'hourly', 'label' => __('Hourly', 'worddown')],
                                ['value' => 'daily', 'label' => __('Daily', 'worddown')],
                                ['value' => 'weekly', 'label' => __('Weekly', 'worddown')],
                            ],
                            'default' => 'daily',
                        ],
                        [
                            'key' => 'export_time',
                            'type' => 'time',
                            'label' => __('Export Time', 'worddown'),
                            'description' => __('Time of day to run the export (server time)', 'worddown'),
                            'default' => '03:00',
                        ],
                    ],
                ],
                [
                    'title' => __('WP-CLI & Server Cron', 'worddown'),
                    'description' => __('You can automate exports using WP-CLI and your server\'s crontab for better reliability and performance', 'worddown'),
                    'content' => [
                        [
                            'type' => 'code',
                            'language' => 'bash',
                            'code' => "# Run export immediately (default)\nwp worddown export\n\n# Run export in background mode (recommended for large sites)\nwp worddown export --background\n\n# Example: Run for a specific subsite in multisite\nwp --url=subsite.example.com worddown export --background\nwp --url=example.com/subsite worddown export --background\n\n# Add to server crontab for scheduled export (every day at 3:00)\n0 3 * * * cd /path/to/wordpress && wp worddown export --background\n\n# This will run the export using the server's cron, which is more reliable than WordPress cron for high-traffic or performance-critical sites."
                        ],
                        [
                            'type' => 'text',
                            'content' => __('You can automate exports using WP-CLI and your server\'s crontab for better reliability and performance. Use the --background flag for large exports to prevent timeouts.', 'worddown')
                        ]
                    ]
                ],
            ],
        ],
        [
            'key' => 'api',
            'label' => __('API', 'worddown'),
            'icon' => 'key',
            'sections' => [
                [
                    'title' => __('API Authentication', 'worddown'),
                    'fields' => [
                        [
                            'key' => 'api_key',
                            'type' => 'text',
                            'label' => __('API Key', 'worddown'),
                            'description' => __('API key for accessing the Worddown API. Leave empty to only allow local access.', 'worddown'),
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'title' => __('Available Endpoints', 'worddown'),
                    'content' => [
                        [
                            'type' => 'endpoint',
                            'method' => 'GET',
                            'url' => '/wp-json/worddown/v1/files',
                            'desc' => __('List all exported markdown files with metadata', 'worddown'),
                        ],
                        [
                            'type' => 'endpoint',
                            'method' => 'GET',
                            'url' => '/wp-json/worddown/v1/files/{post_id}',
                            'desc' => __('Get markdown content of a specific file by post ID', 'worddown'),
                        ],
                        [
                            'type' => 'endpoint',
                            'method' => 'POST',
                            'url' => '/wp-json/worddown/v1/export',
                            'desc' => __('Trigger a new export operation. Use background=true for large exports', 'worddown'),
                        ],
                    ],
                ],
                [
                    'title' => __('Example Usage (cURL)', 'worddown'),
                    'content' => [
                        [
                            'type' => 'code',
                            'language' => 'bash',
                            'code' => "# List all files\ncurl -H \"X-API-Key: {api_key}\" {site_url}/wp-json/worddown/v1/files\n\n# Get a specific file (replace 123 with actual post ID)\ncurl -H \"X-API-Key: {api_key}\" {site_url}/wp-json/worddown/v1/files/123\n\n# Trigger immediate export\ncurl -X POST -H \"X-API-Key: {api_key}\" {site_url}/wp-json/worddown/v1/export\n\n# Trigger background export (recommended for large sites)\ncurl -X POST -H \"X-API-Key: {api_key}\" -H \"Content-Type: application/json\" -d '{\"background\": true}' {site_url}/wp-json/worddown/v1/export"
                        ],
                    ],
                ],
            ],
        ],
    ],
]; 