<?php
	/* Consulta de ciudades autorizadas como destino Excepciones: 10 -> Ya existe una recogida programada */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"modalidad" => 1, //(integer)	Modalidad de la recogida. 1 = Cuenta Corriente 2 = Flete Pago 3 = Flete Contra Entrega 4 = Flete al Cobro 5 = Acuerdo Semanal 6 = CC Int. 7 = FPI 8 = CC/INT Longitud: 1 Obligatorio = Si
				 	"fecha_recogida" => '2017-10-24', //(string) Fecha del servicio Formato: YYYY-MM-DD Obligatorio = Si
				 	"ciudad_origen" => '05002000', //(string) 	Codigo de la ciudad origen para el servicio Longitud: 8 Obligatorio = Si
				 	"ciudad_destino" => '05001000', //(string) Codigo de la ciudad destino para el servicio Longitud: 8 Obligatorio = Si
				 	"nombre_destinatario" => 'Alicia Martinez', //(string) Nombre de la persona a quien se le entregara la recogida. Obligatorio=NO
				 	"nit_destinatario	" => '', //(string) Fecha del servicio Formato: YYYY-MM-DD Obligatorio = Si
				 	"direccion_destinatario" => '', //(string) Dirección del lugar donde se entregara la recogida. Obligatorio = NO
				 	"telefono_destinatario" => '', //(string) Telefono de la persona a quien se le entregara la recogida. Obligatorio=NO
				 	"nombre_empresa" => 'Redpine', //(string) Nombre de la empresa que realiza la programacion Obligatorio = Si
				 	"nombre_contacto" => 'Michael', //(string) Nombre de contacto Obligatorio = Si
				 	"direccion" => 'Medellin', //(string) Dirección de la recogida Obligatorio = Si
				 	"telefono" => '7777777', //(string) 	Telefono del lugar de recogida Longitud = 7 Formato: 7777777 Obligatorio = Si
				 	"producto" => 4, //(integer) Tipo de Mercancia Longitud = 1 Obligatorio = Si 2 => Mensajeria 4 => Mercancia
				 	"referencia" => 'Documentacion referente al envio', //(string) Documentacion referente al envio Obligatorio = Si
				 	"nivel_servicio" => '', //(string) Nivel de servicio asociado a la llamada. Obligatorio:No
				 	"guia_inicial" => '', //(string) Código remision de la guias con la que se realiza la Obligatorio: No, Solo es obligatorio cuando el nivel de servicio es igual Logistica de reversa
				 	"nit_cliente" => '', //(string) Nit del cliente Longitud: 20  Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4(Flete al Cobro)
				 	"div_cliente" => '', //(string) Division del cliente Longitud: 2 Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"persona_autoriza" => '', //(string) Es el nombre de la persona que autoriza Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"telefono_autoriza" => '', //(string) Telefono de la persona que autoriza  Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"tipo_notificacion" => '0', //(string) Tipo de notificacion para la persona que autoriza.  0=No se desea notificar. 1=Se desea notificar por medio de correo electronico. (Si modalidad es 4=Flete al Cobro, es obligatorio que el campo destino_notificacion este lleno con un formato valido). Obligatorio = Si --Puede ir en 0 solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"destino_notificacion" => '', //(string) Destino al que se debe notificar la persona que autoriza sobre la programacion de una nueva recogida. Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"valor_declarado" => 0, //(float) Valor declarado para la mercancia Longitud: 12,2 Formato: 1111111111.11 Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"unidades" => 1, //(integer) Cantidad de unidades Obligatorio = Si --Puede ir vacío solo si modalidad es diferente de 4 (Flete al Cobro)
				 	"observaciones" => '', //(string) Anotaciones para tener en cuenta sobre el envio Obligatorio = Si --Puede ir vacío
				 	"estado" => 12, //(integer) Estado por defecto de la llamada debe ser 12. Obligatorio = Si
				 	"centro_costos" => '', //(string) Centro de costo asociado al cliente quien realiza la solicitud de recogida. Obligatorio = No
				 	"cuenta_contable" => '', //(string) Cuenta contable asociado al cliente quien realiza la solicitud de recogida. Obligatorio = No
				 	"datafono" => 'FALSO', //(boolean) Flag que indica si se debe incluir datafono o No Obligatorio = No
				 	"agente" => '', //(string) Es el usuario que realiza la petición desde el aplicativo correspondiente. Obligatorio = No
				 	"contenido" => '', //(string) Contenido que sera recogido. Obligatorio = No
				 	"equipo	" => '', //(string) Equipo Asignado para la recogida. Obligatorio = No
				 	"sub_equipo" => '', //(string) SubEquipo Asignado para la recogida. Obligatorio = No
				 	"apikey" => '19546fa6575511e7907ba6006ad3dba0', //(string) Api key provisto por Coordinadora
				);
	
	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Recogidas_programar', $params);
	print_r($retorno);
?>