<?php

// cargar entity manager
require_once "bootstrap.php";

$repositorio_bancos = $entityManager->getRepository('Bank');
$bancos = $repositorio_bancos->findAll();

foreach ($bancos as $banco) {
    echo sprintf("-%s\n", $banco->getBankcode());
}
print "Final";