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

$config_directories = array();
$settings['hash_salt'] = '';
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include a local settings file if it exists.
 */
$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  include $local_settings;
}
