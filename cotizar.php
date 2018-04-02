<?php
	/* Cotizar de envios */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$detalle = array('ubl' => 0, //(integer) Código de la UBL, 0=>Automatica, 1=>Mercancia
				'alto' => 10.5, //(float) Alto en centimetros
				'ancho' => 5.9, //(float) Ancho en centimetros
				'largo' => 15.7, //(float) Largo en centimetros
				'peso' => 3, //(float) Peso en Kg
				'unidades' => 2 //(integer) Unidades homogeneas, es decir unidades que tienes las mismas caracteristicas de alto,ancho,largo y peso
			); 

	$metodos = new MethodsCoordinadora();
	$params = array ( 
				 	"nit" => '', //(string) Nit asociado a un acuerdo Coordinadora Mercantil, si no se tiene acuerdo el campo puede ir vacio.
				 	"div" => '', //(string) Div asociado a un acuerdo Coordinadora Mercantil, si no se tiene acuerdo el campo puede ir vacio.
				 	"cuenta" => '1', //(string) Codigo de la cuenta, 1 = Cuenta Corriente, 3 = Flete Pago
				 	"producto" => '', //(string) Codigo de producto.
				 	"origen" => '', //(string) Codigo dane de la ciduad origen 
				 	"destino" => '', //(string) Codigo dane de la ciudad destino
				 	"valoracion" => '', //(string) Valor declarado del envio
				 	"nivel_servicio" => '', //(integer) Niveles de servicio
				 	"detalle" => array($detalle) //(string) Codigo de la cuenta, 1 = Cuenta Corriente, 3 = Flete Pago
				);

	//var_dump($metodos);
	$retorno = $metodos->CallMethod('Cotizador_cotizar', $params);
	print_r($retorno);
?>