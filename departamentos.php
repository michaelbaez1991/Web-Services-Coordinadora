<?php
	/* Departamentos */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$p = $name = ['ejemplo' => 'dsad'];

	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"p" => array($p)
				);
	
	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Cotizador_departamentos', $params);
	print_r($retorno);
?>