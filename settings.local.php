<?php
/**
 * Settings for a local Drupal installation.
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

$isMemcacheAvailable = FALSE;
if (class_exists('Memcache')) {
  $memcache = new Memcache;
  $isMemcacheAvailable = @$memcache->connect('localhost');
}
