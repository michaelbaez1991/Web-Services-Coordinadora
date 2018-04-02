<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_remision" => '015848' //(string) Número de la guia que se desea anular
				);
	
	$retorno = $metodos->CallMethod('Guias_anularGuia', $params);
	print_r($retorno);
	// if ($retorno instanceof ErrorResponse){
	// 	printf("ERROR !\n");
	// 	printf("%s\n", $retorno->getMessage());
	// }else{
	// 	//printf("OK !\n");
	// 	print base64_decode($retorno['pdf']);
	// 	//print_r($retorno);
	// }
?>