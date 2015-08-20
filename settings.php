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
$ac_docroot = 'ACDOCROOT_NAME';
$ac_settings_path = "/var/www/site-php/{$ac_docroot}/{$ac_docroot}-settings.inc";

/**
 * Include Acquia Cloud configuration.
 */
if (file_exists($ac_settings_path)) {
  // Include database credentials.
  require $ac_settings_path;
  // Enable memcache.
  $memcache_path = './sites/all/modules/contrib/memcache/memcache.inc';
  if (file_exists($memcache_path)) {
    $conf['cache_backends'][] = $memcache_path;
    $conf['cache_default_class'] = 'MemCacheDrupal';
    $conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
  }

  // Set base URL per environment as-per Insight recommendation.
  switch ($_ENV['AH_SITE_ENVIRONMENT']) {
    case 'prod':
      break;

    case 'test':
      break;

    default:
      $base_url = NULL;
  }

  // Protect non-prod environments from prying eyes.
  if (file_exists(__DIR__ . '/acquia.inc')) {
    // Authorisation settings for non-prod environments.
    // @see https://gist.github.com/typhonius/7524395
    #AUTHSETTINGS

    if (isset($_ENV['AH_NON_PRODUCTION']) && $_ENV['AH_NON_PRODUCTION']) {
      require __DIR__ . '/acquia.inc';
      ac_protect_this_site();
    }
  }
}

$update_free_access = FALSE;

ini_set('arg_separator.output', '&amp;');
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);
ini_set('session.cache_expire', 200000);
ini_set('session.cache_limiter', 'none');
ini_set('session.cookie_lifetime', 2000000);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 200000);
ini_set('session.gc_probability', 1);
ini_set('session.save_handler', 'user');
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid', 0);
ini_set('url_rewriter.tags', '');

// Enable Fast404 to save server resources for broken image paths.
$conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
$conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['404_fast_html'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';
drupal_fast_404();

/**
 * Include a local settings file if it exists.
 */
$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  include $local_settings;
}


