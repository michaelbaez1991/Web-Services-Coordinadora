<?php
	/* Genera el despacho para un grupo de guias que se especifique. 
	Se genera un despacho por cada nit-div diferente que tengan las guias.
	Puede retornar multiples registros.*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$guias = array('73400009556');

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"guias" => $guias, //(array) Códigos de guia a las que se les va a generar un despacho (array de strings)
					"margen_izquierdo" => 10, //(float) Margen izquierdo para la generación del PDF, en caso que el tipo impresion seleccionado genere un PDF
					"margen_superior" => 20, //(float) Margen superior para la generación del PDF, en caso que el tipo impresion seleccionado genere un PDF
					"tipo_impresion" => 0 //(string) Tipo de impresión que se desea obtener las opciones son (LASER, LASER_RESUMIDA, POS_PDF, POS_PLANO).
				);

	$retorno = $metodos->CallMethod('Guias_generarDespacho', $params);
	var_dump($retorno);

	foreach ($retorno as $value) {
		$despacho = $value['impresion'];

		$despacho = base64_decode($despacho);

		file_put_contents('despacho.pdf', $despacho);	
	}

?>