<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/novo', 'AlunosController@add');
$router->post('/novo', 'AlunosController@addAction');

$router->get('/usuario/{id}/editar', 'AlunosController@edit');
$router->post('/usuario/{id}/editar', 'AlunosController@editAction');

$router->post('/usuario/{id}/status', 'AlunosController@updateStatusAction');

$router->get('/usuario/{id}/excluir', 'AlunosController@del');
