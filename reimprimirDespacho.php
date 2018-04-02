<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_despacho" => '20957096', //(string) Número del despacho que se reimprime
					"margen_izquierdo" => 10, //(float) Margen izquierdo para la generación del PDF
					"margen_superior" => 20 //(float) Margen superior para la generación del PDF
				);

	$retorno = $metodos->CallMethod('Guias_reimprimirDespacho', $params);
	var_dump($retorno);

	$despacho = $retorno['pdf'];

	$despacho = base64_decode($despacho);
	file_put_contents('despacho_reimpreso.pdf', $despacho);
?>