<?php
	/* Cotizar de envios */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"referencia" => '', //(string) Nit asociado a un acuerdo Coordinadora Mercantil, si no se tiene acuerdo el campo puede ir vacio.
				 	"codigo_remision" => '', //(string) Div asociado a un acuerdo Coordinadora Mercantil, si no se tiene acuerdo el campo puede ir vacio
				 	"apikey" => '19546fa6-5755-11e7-907b-a6006ad3dba0' //(string) Api key provisto por Coordinadora
				);
	
	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Recaudos_consultar', $params);
	print_r($retorno);