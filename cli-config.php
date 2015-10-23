<?php
use Symfony\Component\Console\Helper,
    Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper,
    Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper,
    Doctrine\ORM\Tools\Console\ConsoleRunner;
    
require_once __DIR__ . '/bootstrap.php';

$helperSet = new Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new EntityManagerHelper($entityManager),
    'conn' => new ConnectionHelper($entityManager->getConnection())
));

ConsoleRunner::run($helperSet);