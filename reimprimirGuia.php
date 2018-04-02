<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"codigo_remision" => '73400000011',
					"margen_izquierdo" => 0,
					"margen_superior" => 0,
					"formato_impresion" => ''
				);
    //var_dump($metodos);
	$retorno = $metodos->CallMethod('Guias_reimprimirGuia', $params);
	var_dump($retorno);

	$guia = $retorno['pdf'];
	//$rotulo = $retorno['pdf_rotulo'];
	//$url_terceros = $retorno['url_terceros'];

	$guia = base64_decode($guia);
	//$rotulo = base64_decode($rotulo);
	file_put_contents('guia_reimpreso.pdf', $guia);
	//file_put_contents('rotulo.pdf', $rotulo);
?>