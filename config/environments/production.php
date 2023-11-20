<?php
/**
 * Configuration overrides for WP_ENV === 'staging'
 */

use Roots\WPConfig\Config;

/**
 * You should try to keep staging as close to production as possible. However,
 * should you need to, you can always override production configuration values
 * with `Config::define`.
 *
 * Example: `Config::define('WP_DEBUG', true);`
 * Example: `Config::define('DISALLOW_FILE_MODS', false);`
 */

Config::define('WP_SENTRY_PHP_DSN', 'https://c51882f53d9e4b1fa52651a9c2f64575@o1420216.ingest.sentry.io/4503895948984320');
Config::define('WP_SENTRY_ERROR_TYPES', E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_USER_DEPRECATED & ~E_WARNING);
Config::define('WP_SENTRY_SEND_DEFAULT_PII', true);
