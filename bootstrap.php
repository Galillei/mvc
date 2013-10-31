<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "vendor/autoload.php";
$paths = array(__DIR__.'/Model/Entity/');
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'bazilio',
    'dbname'   => 'books',
);
$argument = array();
$config = Setup::createAnnotationMetadataConfiguration(array($paths,$isDevMode));
$config->setAutoGenerateProxyClasses(true);
$entityManager = EntityManager::create($dbParams, $config);
//configure.ini настройки католога
