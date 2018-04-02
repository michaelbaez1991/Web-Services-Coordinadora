<?php
	/* Devuelve el estado de un recaudo, se puede consultar por codigo_remision o por reference del recaudo */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_remision" => '73400000000', //(string) Codigo remision
					"referencia" => '0' //(string) Referencia del recaudo.
				);
	
	$retorno = $metodos->CallMethod('Guias_estadoRecaudo', $params);
	print_r($retorno);
?>