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
$db_name = '';

$db_user = getenv('MYSQL_USER');
$db_pass = getenv('MYSQL_PASS');
$db_host = getenv('MYSQL_HOST');

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
