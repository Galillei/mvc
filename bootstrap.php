<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
//for exception fatal error, because doctrine start session first, but Zend_Session must be start first
Zend_Session::start();
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
