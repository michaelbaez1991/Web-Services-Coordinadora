<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");
	require_once ("ClassGenerarGuia.php");

	$metodos = new MethodsCoordinadora();
	$valor = new Guia();

	$detalle = $valor->Detalles(0, 20, 20, 20, 2, 2, '', '');
	$recaudos = $valor->Recaudos('1', 1000.5, 4505.9, 1500.7, 1);
	$notificaciones = $valor->Notificaciones('1', 'correo@prueba.com');
	$atributos_retorno = $valor->Atributos_retorno('', '', '', '', '', '');
	$params = $valor->generarGuia('73400009556', '2017-10-18', 26086, '', 'Carlos Andres', 'San cristobal', '3054125385', '05001000', '0', '0', 'Destinatario ejemplo', 'Direccion ejemplo', '05001000', '3102548596', 10525, 2, 0, 1, '', 'Contenido ejemplo', 'Documento ejemplo', 'Observaciones ejemplo', 'IMPRESO', array($detalle), '', '', array($recaudos), 10, 8, 6, '', 'pdf', '', '', array($notificaciones), array($atributos_retorno), '', '');

	$retorno = $metodos->CallMethod('Guias_generarGuia', $params);
	print_r($retorno);
	$guia = $retorno['pdf_guia'];
	$rotulo = $retorno['pdf_rotulo'];
	//$url_terceros = $retorno['url_terceros'];

	$guia = base64_decode($guia);
	$rotulo = base64_decode($rotulo);
	file_put_contents('guia.pdf', $guia);
	file_put_contents('rotulo.pdf', $rotulo);
?>