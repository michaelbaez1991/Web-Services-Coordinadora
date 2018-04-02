<?php
	/* Generar guía Internacional, aun no esta en funcionamiento*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$detalle = array('ubl' => '1', //(integer) Código de la Ubl con la que se va a liquidar. Los códigos de Ubl se entregan en documento anexo
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
					"codigo_remision" => '73400000001', //(string) Código de remisión que sera asignada a la remisón creada.
					"fecha" => '2017-09-01', //(string) Fecha generacion de la guia. Formato de fecha yyyy-mm-dd.
					"id_cliente" => 26086, //(integer) id del cliente que indica el acuerdo con que se va a liquidar
					"id_remitente" => 0, //(integer) id del remitente que se desea utilizar, para un remitente sin registrar utilice el valor 0
					"nombre_remitente" => 'Invicta', //(string) Nombre del remitente, vacio si se envia id_remitente diferente de 0.
					"direccion_remitente" => 'Bogota', //(string) Dirección del remitente, vacio si se envia id_remitente diferente de 0
					"telefono_remitente" => '0312546321', //(string) Teléfono del remitente, vacio si se envia id_remitente diferente de 0
					"ciudad_remitente" => '05001000', //(string) Ciudad del remitente en código dane de 8 digitos ej: Medellín -> 05001000 vacio si se envia id_remitente diferente de 0
					"nit_destinatario" => '0', //(string) Nit del destinatario
					"div_destinatario" => '0', //(string) División del destinatario
					"nombre_destinatario" => 'Andres Perez', //(string) Nombre del destinatario
					"direccion_destinatario" => 'La paz', //(string) Dirección del destinatario 
					"codigo_ciudad_destinatario_inter" => '0', //(string) Código ciudad del destinatario en código internacional
					"nombre_ciudad_destinatario_inter" => 'Caracas', //(string) Nombre ciudad del destinatario en código internacional
					"pais_destinatario_inter" => 'Venezuela', //(string) Pais del destinatario en código internacional
					"codigo_postal_destinatario_inter" => '1021', //(string) Código Postal del destinatario internacional
					"impuestos_origen_inter" => '0', //(string) 	Pago de impuestos en origen. 0 -> No paga impuestos en origen. 1 -> Paga impuestos en origen
					"telefono_destinatario" => '4265128596', //(string) Teléfono del destinatario
					"valor_declarado" => 10, //(float) Valor declarado del envío (En Dolares USD)
					"codigo_cuenta" => 8, //(integer) Cuenta cuenta. 1 -> Cuenta Corriente. 2 -> Acuerdo Semanal. 3 -> Flete Pago
					"codigo_producto" => 0, //(integer) Código producto. 0 -> Auto, se determina automaticamente a partir del detalle de la guia. 1 -> Mercancia. 2 -> Paquetes de 1-2 Kg. 3 -> Documentos. 6 -> Paquetes de 3-5 Kg.
					"nivel_servicio" => 1, //(integer) Codigo del nivel de servicio. 1 -> Estandar. 2 -> Express. 3 -> Programado.
					"contenido" => 'reloj', //(string) Contenido del envío
					"referencia" => '0', //(string) 	Documento referencia, documento con el cual se quiere relacionar el envio para consultas posteriores. Ej: Factura, Orden de pedido, etc
					"observaciones" => 'no hay observaciones', //(string) Observaciones
					"estado" => 'PENDIENTE', //(string) Estado, puede ser PENDIENTE o IMPRESO. Si es PENDIENTE se registra la guia, no se genera el codigo remision ni se genera el PDF. Si es IMPRESO se registra la guia, se genera el codigo remision y el PDF.
					"detalle" => array($detalle), //(Agw_typeGuiaDetalle[]) Detalle de la guia. Se debe enviar al menos un registro.
					"cuenta_contable" => '', //(string) Cuenta contable (Opcional)
					"centro_costos" => '', //(string) Centro de costos (Opcional)
					"id_rotulo" => 0 //(integer) Id del rotulo a generar, enviar 0 para no generar rotulo
				);
	
	$retorno = $metodos->CallMethod('Guias_generarGuiaInter', $params);
	print_r($retorno);
?>