<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

/*
 * importa os arquivos de configuraões do autoload
 */
require_once __DIR__ . '/src/doctrine.php';


// replace with mechanism to retrieve EntityManager in your app
$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
