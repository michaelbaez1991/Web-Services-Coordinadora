<?php
	/* Consulta de ciudades autorizadas como destino Excepciones: 10 -> Ya existe una recogida programada */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"id_recogida" => 1, //(integer) Id de la recogida 1 = ASIGNADA, 2 = EFECTIVA, 3 = CANCELADA, 4 = APLAZADA
				 	"nit_cliente" => '', //(string) Nit del cliente
				 	"div_cliente" => '', //(string) Division del cliente
				 	"referencia" => '', //(string) Documentacion referente al envio
				);
	
	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Recogidas_seguimiento', $params);
	print_r($retorno);
?>