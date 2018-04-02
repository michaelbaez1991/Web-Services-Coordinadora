<?php
	/* Editar guía */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$detalle = array('ubl' => '', //(integer) Código de la Ubl con la que se va a liquidar. Los códigos de Ubl se entregan en documento anexo
			'alto' => 10.5, //(float) Alto en centimetros
			'ancho' => 5.9, //(float) Alto en centimetros
			'largo' => 15.7, //(float) Largo en centimetros
			'peso' => 3, //(float) Peso en Kg
			'unidades' => 2, //(integer) Unidades
			'referencia' => '', //(string) Referencia de la unidad de empaque
			'nombre_empaque' => 'Nombre paquete ejemplo' //(string) Nombre del empaque
		); 

	$metodos = new MethodsCoordinadora();
	$params = array ( 
		 			"id_remision" => 4513893, //(integer) id de la guía a modificar 
					"codigo_remision" => '73400000001', //(string) Código de remisión que sera asignada a la remisón creada.
					"id_cliente" => 26086, //(integer) id del cliente que indica el acuerdo con que se va a liquidar
					"id_remitente" => 0, //(integer) id del remitente que se desea utilizar, para un remitente sin registrar utilice el valor 0
					"nombre_remitente" => 'dasd', //(string) Nombre del remitente, vacio si se envia id_remitente diferente de 0.
					"direccion_remitente" => 'fasdsa', //(string) Dirección del remitente, vacio si se envia id_remitente diferente de 0
					"telefono_remitente" => '56516562', //(string) Teléfono del remitente, vacio si se envia id_remitente diferente de 0
					"ciudad_remitente" => '05001000', //(string) Ciudad del remitente en código dane de 8 digitos ej: Medellín -> 05001000 vacio si se envia id_remitente diferente de 0
					"nit_destinatario" => 'dasd', //(string) Nit del destinatario
					"div_destinatario" => 'dsad', //(string) División del destinatario
					"nombre_destinatario" => 'dasd', //(string) Nombre del destinatario
					"direccion_destinatario" => 'sda', //(string) Dirección del destinatario 
					"ciudad_destinatario" => '05001000', //(string) Ciudad del destinatario en código dane de 8 digitos ej: Medellín -> 05001000
					"telefono_destinatario" => '230626266', //(string) Teléfono del destinatario
					"valor_declarado" => 10254, //(float) Valor declarado del envío
					"codigo_cuenta" => 1, //(integer) Cuenta cuenta. 1 -> Cuenta Corriente. 2 -> Acuerdo Semanal. 3 -> Flete Pago
					"codigo_producto" => 0, //(integer) Código producto. 0 -> Auto, se determina automaticamente a partir del detalle de la guia. 1 -> Mercancia. 2 -> Paquetes de 1-2 Kg. 3 -> Documentos. 6 -> Paquetes de 3-5 Kg.
					"contenido" => 'dasdas', //(string) Contenido del envío
					"referencia" => 'dsadsad', //(string) 	Documento referencia, documento con el cual se quiere relacionar el envio para consultas posteriores. Ej: Factura, Orden de pedido, etc
					"observaciones" => 'dasdsa', //(string) Observaciones
					"detalle" => array($detalle), //(Agw_typeGuiaDetalle[]) Detalle de la guia. Se debe enviar al menos un registro.
					"cuenta_contable" => '', //(string) Cuenta contable (Opcional)
					"centro_costos" => '', //(string) Centro de costos (Opcional)
					"margen_izquierdo" => 0, //(float) Margen izquierdo para la generación del PDF
					"margen_superior" => 0, //(float) Margen superior para la generación del PDF
					"id_rotulo" => 0, //(integer) Id del rotulo a generar, enviar 0 para no generar rotulo
					"formato_impresion" => '' //(string) Formato de impresion de la guia
				);
	
	$retorno = $metodos->CallMethod('Guias_editarGuia', $params);
	print_r($retorno);
	27
?>