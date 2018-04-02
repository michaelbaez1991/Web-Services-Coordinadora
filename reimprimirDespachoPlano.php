<?php
	/*Reimprimir despacho POS*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_despacho" => '' //(integer) Número del despacho que se reimprime
				);

	$retorno = $metodos->CallMethod('Guias_reimprimirDespacho', $params);
	print_r($retorno);
?>