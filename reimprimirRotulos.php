<?php
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$id_remisiones = ['4513893'];

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"id_rotulo" => 6, //(string) 
					"id_remisiones" => array($id_remisiones) //(array)
				);

	$retorno = $metodos->CallMethod('Guias_reimprimirRotulos', $params);
	print_r($retorno);
?>