<?php 
class Guia{

    public function Detalles($ubl = NULL, $alto = NULL, $ancho = NULL, $largo = NULL, $peso = NULL, $unidades = NULL, $referencia, $nombre_empaque){
    	$detalles = ['ubl' => $ubl, //(integer) Código de la Ubl con la que se va a liquidar. Los códigos de Ubl se entregan en documento anexo
    				 'alto' => $alto, //(float) Alto en centimetros
    				 'ancho' => $ancho, //(float) Alto en centimetros
    				 'largo' => $largo, //(float) Largo en centimetros
    				 'peso' => $peso, //(float) Peso en Kg
    				 'unidades' => $unidades, //(integer) Unidades
    				 'referencia' => $referencia, //(string) Referencia de la unidad de empaque
    				 'nombre_empaque' => $nombre_empaque //(string) Nombre del empaque
    				];

    	//var_dump($detalles);
    	return $detalles;
    }

    public function Recaudos($referencia, $valor = NULL, $valor_base_iva = NULL, $valor_iva = NULL, $forma_pago = NULL){
    	$recaudos = ['referencia' => $referencia, //(string) Referencia del recaudo. Opcional pero en ecommerce se coloca el numero del pedido
					 'valor' => $valor, //(float) Valor del recaudo
					 'valor_base_iva' => $valor_base_iva, //(float) Valor base de IVA del recaudo
					 'valor_iva' => $valor_iva, //(float) Valor del IVA del recaudo
					 'forma_pago' => $forma_pago //(integer) Forma de pago. 1 => Efectivo. 5 => Tarjeta
				];

		//var_dump($recaudos);
    	return $recaudos;
    }

    public function Notificaciones($tipo_medio, $destino_notificacion){
    	$notificaciones = ['tipo_medio' => $tipo_medio, //(string) Es una combinación del tipo notificación (estandar - codigo_seguridad), con el medio de envio (correo - sms - wsdl - facebook). 1 correo estandar. 2 SMS estandar. 3 correo código seguridad. 4 SMS código seguridad.
						   'destino_notificacion' => $destino_notificacion //(string) Correo o Numero celular donde debe ser enviada la notificacion
					];

		//var_dump($notificaciones);
    	return $notificaciones;
    }

    public function Atributos_retorno($nit, $div, $nombre, $direccion, $codigo_ciudad, $telefono){
    	$atributos_retorno = ['nit' => $nit, //(string) Nit del Cliente Destinatario de la guía de retorno
						'div' => $div, //(string) Division del cliente Destinatario de la guía retorno
						'nombre' => $nombre, //(string) Nombre del cliente Destinatario de la guía retorno
						'direccion' => $direccion, //(string) Dirección del cliente Destinatario de la guía retorno
						'codigo_ciudad' => $codigo_ciudad, //(string) Código ciudad del cliente Destinatario de la guía retorno
						'telefono' => $telefono //(string) Número telefónico del cliente Destinatario de la guía retorno
			];

		//var_dump($atributos_retorno);
    	return $atributos_retorno;
    }

    public function generarGuia($codigo_remision, $fecha, $id_cliente = NULL, $id_remitente = NULL, $nombre_remitente, $direccion_remitente, $telefono_remitente, $ciudad_remitente, $nit_destinatario, $div_destinatario, $nombre_destinatario, $direccion_destinatario, $ciudad_destinatario, $telefono_destinatario, $valor_declarado = NULL, $codigo_cuenta = NULL, $codigo_producto = NULL, $nivel_servicio = NULL, $linea, $contenido, $referencia, $observaciones, $estado, $detalle, $cuenta_contable, $centro_costos, $recaudos, $margen_izquierdo = NULL, $margen_superior = NULL, $id_rotulo = NULL, $usuario_vmi, $formato_impresion, $atributo1_nombre, $atributo1_valor, $notificaciones, $atributos_retorno, $nro_doc_radicados, $nro_sobre){

    	$params = [ "codigo_remision" => $codigo_remision, //(string) Código de remisión que sera asignada a la remisón creada (73400000000 - 73409999999).
					"fecha" => $fecha, //(string) Fecha generacion de la guia. Formato de fecha yyyy-mm-dd.
					"id_cliente" => $id_cliente, //(integer:26086) id del cliente que indica el acuerdo con que se va a liquidar, id que se le asigna a kronotime como cliente de coordinadora
					"id_remitente" => $id_remitente, //(integer / Vacio para kronotime) id del remitente que se desea utilizar, para un remitente sin registrar utilice el valor 0. id que se le asigna a kronotime como remitente dentro de coordinadora
					"nombre_remitente" => $nombre_remitente, //(string) Nombre del remitente, vacio si se envia id_remitente diferente de 0. Informacion de krono time
					"direccion_remitente" => $direccion_remitente, //(string) Dirección del remitente, vacio si se envia id_remitente diferente de 0. Informacion de krono time
					"telefono_remitente" => $telefono_remitente, //(string) Teléfono del remitente, vacio si se envia id_remitente diferente de 0. Informacion de krono time
					"ciudad_remitente" => $ciudad_remitente, //(string) Ciudad del remitente en código dane de 8 digitos ej: Medellín -> 05001000. vacio si se envia id_remitente diferente de 0. Informacion de krono time
					"nit_destinatario" => $nit_destinatario, //(string/Casi siempre sera 0) Nit del Destinatario
					"div_destinatario" => $div_destinatario, //(string/Siempre sera cero) División del destinatario
					"nombre_destinatario" => $nombre_destinatario, //(string) Nombre del destinatario
					"direccion_destinatario" => $direccion_destinatario, //(string) Dirección del destinatario
					"ciudad_destinatario" => $ciudad_destinatario, //(string) Ciudad del destinatario en código dane de 8 digitos ej: Medellín -> 05001000
					"telefono_destinatario" => $telefono_destinatario, //(string) Teléfono del destinatario
					"valor_declarado" => $valor_declarado, //(float) Valor declarado del envío
					"codigo_cuenta" => $codigo_cuenta, //(integer) Cuenta cuenta. 1 -> Cuenta Corriente. 2 -> Acuerdo Semanal. 3 -> Flete Pago
					"codigo_producto" => $codigo_producto, //(integer) Código producto. 0 -> Auto, se determina automaticamente a partir del detalle de la guia. 1 -> Mercancia. 2 -> Paquetes de 1-2 Kg. 3 -> Documentos. 6 -> Paquetes de 3-5 Kg
					"nivel_servicio" => $nivel_servicio, //(integer) Codigo del nivel de servicio. 1 -> Estandar. 2 -> Express. 3 -> Programado
					"linea" => $linea, //(string) Linea, si no se maneja se envia vacio
					"contenido" => $contenido, //(string) Contenido del envío
					"referencia" => $referencia, //(string) Documento referencia, documento con el cual se quiere relacionar el envio para consultas posteriores. Ej: Factura, Orden de pedido, etc.
					"observaciones" => $observaciones, //(string) Observaciones
					"estado" => $estado, //(string) Estado, puede ser PENDIENTE o IMPRESO. Si es PENDIENTE se registra la guia, no se genera el codigo remision ni se genera el PDF. Si es IMPRESO se registra la guia, se genera el codigo remision y el PDF
					"detalle" => $detalle, //(array) Detalle de la guia. Se debe enviar al menos un registro
					"cuenta_contable" => $cuenta_contable, //(string) Cuenta contable (Opcional)
					"centro_costos" => $centro_costos, //(string) Centro de costos (Opcional)
					"recaudos" => $recaudos, //(array) Detalle del recaudo. Puede ser vacio
					"margen_izquierdo" => $margen_izquierdo, //(float) Margen izquierdo para la generación del PDF
					"margen_superior" => $margen_superior, //(float) Margen superior para la generación del PDF
					"id_rotulo" => $id_rotulo, //(integer) Id del rotulo a generar, enviar 0 para no generar rotulo
					"usuario_vmi" => $usuario_vmi, //(string) Usuario para accesar interface de VMI
					"formato_impresion" => $formato_impresion, //(string) Formato de impresion de la guia
					"atributo1_nombre" => $atributo1_nombre, //(string) Nombre de atributo generico de la guia, para asociar ciertas propiedades a la guia, enviar vacios no aplica para kronotime
					"atributo1_valor" => $atributo1_valor, //(string) Valor de atributo generico de la guia, para asociar ciertas propiedades a la guia, enviar vacios no aplica para kronotime
					"notificaciones" => $notificaciones, //(array) @var Agw_typeNotificaciones[]
					"atributos_retorno" => $atributos_retorno, //(array) Para niveles de servicio de retorno, aquí se envía la información de la guía de reversa
					"nro_doc_radicados" => $nro_doc_radicados, //(string) Para el nivel de servicio RD (10) aquí se envía el número de sobres a radicar
					"nro_sobre" => $nro_sobre //(string) Para el nivel de servicio RD (10) aquí se envía el código de sobre que va con la mercancía
				];

		//var_dump($params);
		return $params;
    }
}

// $detalle = $valor->Detalles($_POST['ubl'], $_POST['alto'], $_POST['ancho'], $_POST['largo'], $_POST['peso'], $_POST['unidades'], ''.$_POST['referencia'].'', ''.$_POST['nombre_empaque'].'');
// $detalle = $valor->Detalles(0, 10.5, 5.9, 15.7, 3, 2, '', '');

//$recaudos = $valor->Recaudos(''.$_POST['referencia'].'', $_POST['valor'], $_POST['valor_base_iva'], $_POST['valor_iva'], $_POST['forma_pago']);
// $recaudos = $valor->Recaudos('1', 1000.5, 4505.9, 1500.7, 1);

//$notificaciones = $valor->notificaciones(''.$_POST['referencia'].'', ''.$_POST['referencia'].'');
// $notificaciones = $valor->Notificaciones('1', 'correo@prueba.com');

//$atributos_retorno = $valor->atributos_retorno(''.$_POST['nit'].'', ''.$_POST['div'].'', ''.$_POST['nombre'].'', ''.$_POST['direccion'].'', ''.$_POST['codigo_ciudad'].'', ''.$_POST['telefono'].'');
// $atributos_retorno = $valor->Atributos_retorno('', '', '', '', '', '');

// $valor->generarGuia(''.$_POST['codigo_remision'].'', ''.$_POST['fecha'].'', $_POST['id_cliente'], $_POST['id_remitente'], ''.$_POST['nombre_remitente'].'', ''.$_POST['direccion_remitente'].'', ''.$_POST['telefono_remitente'].'', ''.$_POST['ciudad_remitente'].'', ''.$_POST['nit_destinatario'].'', ''.$_POST['div_destinatario'].'', ''.$_POST['nombre_destinatario'].'', ''.$_POST['direccion_destinatario'].'', ''.$_POST['ciudad_destinatario'].'', ''.$_POST['telefono_destinatario'].'', $_POST['valor_declarado'],  $_POST['codigo_cuenta'],  $_POST['codigo_producto'],  $_POST['nivel_servicio'], ''.$_POST['linea'].'', ''.$_POST['contenido'].'', ''.$_POST['referencia'].'', ''.$_POST['observaciones'].'', ''.$_POST['estado'].'', array($detalle), ''.$_POST['cuenta_contable'].'', ''.$_POST['centro_costos'].'', array($recaudos),  $_POST['margen_izquierdo'],  $_POST['margen_superior'],  $_POST['id_rotulo'], ''.$_POST['usuario_vmi'].'', ''.$_POST['formato_impresion'].'', ''.$_POST['atributo1_nombre'].'', ''.$_POST['atributo1_valor'].'', array($notificaciones), array($atributos_retorno), ''.$_POST['nro_doc_radicados'].'', ''.$_POST['nro_sobre'].'');
// $valor->generarGuia('73400000020', '2017-10-18', 26086, 0, 'Carlos Andres', 'San cristobal', '3054125385', '05001000', '0', '0', 'Destinatario ejemplo', 'Direccion ejemplo', '05001000', '3102548596', 10525, 2, 0, 1, '', 'Contenido ejemplo', 'Documento ejemplo', 'Observaciones ejemplo', 'IMPRESO', $detalle, '', '', $recaudos, 10, 8, 6, '', 'pdf', '', '', $notificaciones, $atributos_retorno, '', '');
?>