<?php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/entidades/BD");
//$paths = array(__DIR__."/entidades");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'sql10152784',
    'password' => 'Mr4fuk5nCr',
    'dbname'   => 'sql10152784',
	'host' => 'sql10.freemysqlhosting.net'
);
/*$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'cjmo',
    'password' => 'cjmo_prueba',
    'dbname'   => 'prueba_servicio',
	'host' => 'db4free.net'
);*/

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

?>