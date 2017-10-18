<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"datos_cliente" => 'nombre...'
				);

	//var_dump($metodos);
	$retorno = $metodos->CallMethod('updateClient', $params);
	if (isset($retorno)){
		echo "Si respondo";
	}else{
		echo "No respondo";
	}
?>