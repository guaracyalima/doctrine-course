<?php

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

    $request = ServerRequestFactory::fromGlobals(
      $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );

    $routuerContainer =  new RouterContainer();

    $map = $routuerContainer->getMap();

    /**
    * @param $request
    * @param $response
    */
    $map->get('home', '/', function ($request, $response){
        $response->getBody()->write("Hello world");

        return $response;
    });

    $matcher  = $routuerContainer->getMatcher();
    $route = $matcher->match($request);

    foreach ($route->attributes as $key => $value)
    {
        $request = $request->withAttribute($key, $value);
    }

    $callable = $route->handler;

    $response = $callable($request, new Response());

    echo $response->getBody();