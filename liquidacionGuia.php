<?php
	/*Método que permite consultar los valores de liquidacion de la guía*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_remision" => '73400000000' //(string) Código remision para consultar 73400000000 
				);
	
	$retorno = $metodos->CallMethod('Guias_liquidacionGuia', $params);
	print_r($retorno);
?>