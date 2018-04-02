<?php
	/* Ciudades cubiertas por Coordinadora, esta información se debe actualizar a diario */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$p = array('p' => ''
		); 
	
	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"p" => array($p)
				);
	
	$retorno = $metodos->CallMethod('Cotizador_ciudades', $params);
	print_r($retorno);
?>	