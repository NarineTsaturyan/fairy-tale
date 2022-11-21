<?php
/**
 * @file
 * An example settings.local.php file for Drupal.
 */

// Add your database configuration here (and uncomment the block).

$databases['default']['default'] = [
  'database' => 'tales',
  'username' => 'laptop',
  'password' => 'qpzm1235',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
];

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//
$config['system.logging']['error_level'] = 'verbose';

$settings['hash_salt'] = 'asdfa';

//$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';


//$settings['config_readonly'] = TRUE;

// Disable Core CSS and JS aggregation.
//$config['system.performance']['css']['preprocess'] = FALSE;
//$config['system.performance']['js']['preprocess'] = FALSE;
// Disable AdvAgg.
//$config['advagg.settings']['enabled'] = FALSE;


//$class_loader->addPsr4('Drupal\\webprofiler\\', [ __DIR__ . '/../../modules/contrib/devel/webprofiler/src']);
//$settings['container_base_class'] = '\Drupal\webprofiler\DependencyInjection\TraceableContainer';
