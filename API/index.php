<?php

// **************************** INICIO CONFIGURAÇÃO  ****************************
require 'vendor/autoload.php'; // Dependencias do Laravel + Slim.

// Configuração - BD
$settings = array(
    'driver' => 'pgsql',
    'host' => 'localhost',
    'database' => 'caronas',
    'username' => 'postgres',
    'password' => 'macedo',
    'charset' => 'UTF8',
    'prefix' => ''
);

// Inicilização - Eloquent ORM
$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory(new Illuminate\Container\Container);
$conn = $connFactory->make($settings);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
// **************************** FIM CONFIGURAÇÃO  ****************************


// Modelos/Entidades.
require 'models/Carona.php';

// API - Métodos HTTP
$app = new \Slim\Slim();
$app->get('/carona', function() {
	echo  json_encode(\Carona::all());
});

$app->post('/carona', function() {
	$caronaRequest = json_decode(\Slim\Slim::getInstance()->request()->getBody());
	
	$carona = new Carona;
	$carona->endereco_origem = $caronaRequest->EnderecoOrigem;
	$carona->numero_vagas = $caronaRequest->NrVagas;
	$carona->save();
});

$app->put('/carona', function() {
	$caronaRequest = json_decode(\Slim\Slim::getInstance()->request()->getBody());
	
	$carona =  Carona::find(1);
	$carona->endereco_origem = $caronaRequest->EnderecoOrigem;
	$carona->numero_vagas = $caronaRequest->NrVagas;
	$carona->save();
});

$app->run();
?>