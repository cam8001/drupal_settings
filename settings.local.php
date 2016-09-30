<?php
/**
 * Settings for a local Drupal 8 installation.
 * 
 * @see example.settings.local.php
 *
 * You can use local environment variables to specify MySQL parameters:
 *   - MYSQL_USER: local MySQL user.
 *   - MYSQL_PASS: local MySQL password.
 *   - MYSQL_HOST: local MySQL host.
 *
 * Alternatively, you can specify them below.
 */

// Local database name.
$db_name = 'LOCALDBNAME';

$db_user = $_ENV['MYSQL_USER'];
$db_pass = $_ENV['MYSQL_PASS'];
$db_host = $_ENV['MYSQL_HOST'];

$databases = array(
 'default' => array(
   'default' => array(
     'database' => $db_name,
     'username' => $db_user,
     'password' => $db_pass,
     'host' => $db_host,
     'driver' => 'mysql',
   ),
 ),
);


if (!array_key_exists('hash_salt', $settings) || is_null($settings['hash_salt'])) {
   $settings['hash_salt'] = 'local_hash_salt_change_for_production';
}

if (!isset($config_directories)) {
 $config_directories = array();
}

if (!array_key_exists('sync', $config_directories) || is_null($config_directories['sync'])) {
  $config_directories['sync'] = __DIR__ . '/sync';
}

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

$config['system.logging']['error_level'] = 'verbose';

$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

$settings['extension_discovery_scan_tests'] = TRUE;

$settings['rebuild_access'] = TRUE;

$settings['skip_permissions_hardening'] = TRUE;
