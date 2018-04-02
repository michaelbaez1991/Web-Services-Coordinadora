<?php
	/* Devuelve las guias incluidas en un despacho */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"id_cliente" => 26086, //(integer) id del cliente que indica el acuerdo con que se va a liquidar
					"fecha_despacho" => '2017-09-01', //(string) Fecha AAAA-MM-DD (Opcional)
					"codigo_despacho" => '0' // (integer) Número del despacho
				);
	
	$retorno = $metodos->CallMethod('Guias_detalleDespacho', $params);
	print_r($retorno);
?>