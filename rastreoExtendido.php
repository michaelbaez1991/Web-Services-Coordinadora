<?php
	/* Rastrear guia */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigos_remision" => '' // (array) Códigos de guia que se quiere rastrear (array de strings)
				);

	$retorno = $metodos->CallMethod('Guias_rastreoExtendido', $params);
	print_r($retorno);
?>