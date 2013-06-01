<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

putenv('ZF2_PATH=/media/sf_Ubuntu_shared/www/zf2/library');
putenv('APPLICATION_ENV=development');
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
//chdir(dirname(__DIR__));
chdir(__DIR__);

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
