<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "vendor/autoload.php";
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__)));
//don't change constant 'APPFILE', it use in Config.php
defined('APPFILE')
    || define('APPFILE',APPLICATION_PATH.'/configure/application.ini');
$paths = array(__DIR__."/Model/Entity/");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'bazilio',
    'dbname'   => 'books',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
//configure.ini настройки католога
$a = Lib_Application::getInstance();
$a->run();
