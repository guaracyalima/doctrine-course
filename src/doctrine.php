<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

    $paths = [
        __DIR__. '/Entity'
    ];

    $isDevMode = true;

    $dbParams = [
        'driver'    => 'pdo_mysql',
        'user'      => 'root',
        'password'  => 'root',
        'dbname'    => 'son_doctrine_basico_curso'
    ];


    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

    /*
     * Recebe os parametros de configuração no DB e a configuraçãod e setup
     */
    $entityManager = EntityManager::create($dbParams, $config);

    function getEntityManager()
    {
        global $entityManager;
        return $entityManager;
    }