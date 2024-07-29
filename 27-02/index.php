<?php
header('Access-Control-Allow-Origin: *');

require_once './modelo/ModeloVeiculo.php';
require_once './database/Conexao.php';
require_once './database/DaoVeiculo.php';
require_once './visao/VisaoVeiculo.php';
require_once './controle/ControleVeiculo.php';
require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->all('/{mod}/{acao}', function ($mod, $acao) {
    $modulo = 'Controle' . ucfirst($mod);

    if (class_exists($modulo)) {
        $obj = new $modulo();
        if (method_exists($modulo, $acao)) {
            echo $obj->$acao();
        } else {
            echo 'No action...';
        }
    } else {
        echo 'No module...';
    }
});

$router->run();
