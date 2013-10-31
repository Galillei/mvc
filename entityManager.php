<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once "vendor/autoload.php";
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'bazilio',
    'dbname'   => 'books',
);
$argument = array();
$paths = array(__DIR__."/Model/Entity/");
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
$entityManager->getConfiguration()->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $entityManager->getConnection()->getSchemaManager()
)
);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($entityManager);
$metadata = $cmf->getAllMetadata();
$cme = new \Doctrine\ORM\Tools\Export\ClassMetadataExporter();
$generator = new \Doctrine\ORM\Tools\EntityGenerator();
$generator->setGenerateAnnotations(true);
$generator->setGenerateStubMethods(true);
$generator->setRegenerateEntityIfExists(false);
$generator->setUpdateEntityIfExists(true);
$generator->generate($metadata, 'Model/Entity');
//$exporter = $cme->getExporter('annotation','Model/Entity');
//$exporter->setMetadata($metadata);
//$exporter->export();
