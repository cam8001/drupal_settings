<?php
/**
 * @files
 * Core configuration file.
 *
 * Local developments settings should be configured in a settings.local.php
 *
 * For documentation of possible settings and their meanings, see
 * default.settings.php or
 * https://api.drupal.org/api/drupal/sites%21default%21default.settings.php/7
 */

// Acquia Cloud docroot name.
$ac_docroot = '';
$ac_settings_path = "/var/www/site-php/{$ac_docroot}/{$ac_docroot}-settings.inc";

/**
 * Include Acquia Cloud configuration.
 */
if (file_exists($ac_settings_path)) {
  // Include database credentials.
  require $ac_settings_path;

  // Set base URL per environment as-per Insight recommendation.
  switch ($_ENV['AH_SITE_ENVIRONMENT']) {
    case 'prod':
      break;

    case 'test':
      break;

    default:
      $base_url = NULL;
  }
}

$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Load local development override configuration, if available.
 *
 * Use settings.local.php to override variables on secondary (staging,
 * development, etc) installations of this site. Typically used to disable
 * caching, JavaScript/CSS compression, re-routing of outgoing emails, and
 * other things that should not happen on development and testing sites.
 *
 * Keep this code block at the end of this file to take full effect.
 */
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
