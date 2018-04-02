<?php
	/* Consultar despachos generados */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"id_cliente" => 26086, //(integer) Código asignado por el sistema para identificar al cliente. Campo obligatorio para realizar la consulta.
					"fecha_inicial" => '2017-01-01', //(string) Fecha inicial del rango que se quiere consultar la información, vacio si no se utiliza este filtro. Este campo de filtro debe ir acompañado del campo fecha final. Formato de fecha yyyy-mm-dd.
					"fecha_final" => '2017-10-20', //(string) Fecha final del rango que se quiere consultar la información, vacio si no se utiliza este filtro. Este campo de filtro debe ir acompañado del campo fecha iniclal. Formato de fecha yyyy-mm-dd.
					"usuario_despacha" => '', //(string) Usuario que genero el despacho, vacio si no se utiliza este filtro. Si se utiliza este filtro se debe indicar el rango de fecha que se quiere consultar. IMPORTANTE: El campo usuario despacha se debe indicar sin el prefijo del cliente.
					"codigo_despacho" => '', //(string) Codigo de despacho generado, 0 si no se utiliza este filtro. Si se filtra por este campo se ignora el filtro por rango de fecha.
					"codigo_remision" => '73400000000', //(string) Un Código de remisión que se conozca del despacho, vacio si no se utiliza este filtro. Si se filtra por este campo se ignora el filtro por rango de fecha.
					"referencia" => '' //(string)	Documento referencia que se conozca de alguna de las remisiones del despacho, vacio si no se utiliza este filtro. Ej: Cuando se coloca la Factura o el Número de pedido como documento referencia al elaborar la remisión. Si se filtra por este campo se ignora el filtro por rango de fecha.
				);

	$retorno = $metodos->CallMethod('Guias_consultarDespachos', $params);
	print_r($retorno);
?>