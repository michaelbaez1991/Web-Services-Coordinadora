<?php
	/* Reimprimir multiples guias */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"id_remisiones" => '', //(string) Id`s de las guias que se reimprimen
					"margen_izquierdo" => '', //(float) Margen izquierdo para la generación del PDF
					"margen_superior" => '', //(float) Margen superior para la generación del PDF
					"formato_impresion" => '' //(string) Formato de impresion de la guia
				);
	
	$retorno = $metodos->CallMethod('Guias_reimprimirGuias', $params);
	print_r($retorno);
?>