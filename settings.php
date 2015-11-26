<?php
/**
 * @files
 * Core configuration file.
 *
 * Local developments settings should be configured in a settings.local.php
 *
 * For documentation of possible settings and their meanings, see
 * default.settings.php or
 * https://api.drupal.org/api/drupal/sites%21default%21default.settings.php/8
 */

// Acquia Cloud docroot name.
$ac_docroot = 'ACDOCROOT';
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

$config['system.performance']['fast_404']['exclude_paths'] = '/\/(?:styles)|(?:system\/files)\//';
$config['system.performance']['fast_404']['paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$config['system.performance']['fast_404']['html'] = '<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';


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
