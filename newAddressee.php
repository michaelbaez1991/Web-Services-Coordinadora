<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"datos_destinatario" => 'nombre...'
			);

	//var_dump($metodos);
	$retorno = $metodos->CallMethod('newAddressee', $params);
	if (isset($retorno)){
		echo "Si respondo";
	}else{
		echo "No respondo";
	}
?>