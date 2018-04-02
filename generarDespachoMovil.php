<?php
	/* Ciudades disponibles */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"accion" => '', //(string) 
					"equipo" => '', //(string)
					"movil" => '', //(string) 
					"recibidor" => '', //(string)
					"guias" => '' //(string)
				);
	
	$retorno = $metodos->CallMethod('Guias_generarDespachoMovil', $params);
	print_r($retorno);
?>