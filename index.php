<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_remision" => '015848',
					"margen_izquierdo" => 0,
					"margen_superior" => 0,
					"formato_impresion" => ''
				);
	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Guias_reimprimirGuia', $params);
	if ($retorno instanceof ErrorResponse){
		printf("ERROR !\n");
		printf("%s\n", $retorno->getMessage());
	}else{
		//printf("OK !\n");
		print base64_decode($retorno['pdf']);
		//print_r($retorno);
	}
?>