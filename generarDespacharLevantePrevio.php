<?php
	/* Genera el despacho para un grupo de identificadores de clientes con levante previo. 
	Se genera un despacho por cada id cliente diferente que tengan guias y levantes cargadas previamente.
	Puede retornar multiples registros.*/
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"ids_clientes" => '' //(array) Identificadores de clientes a los que se les despacharan sus guias levantadas previamente
				);

	$retorno = $metodos->CallMethod('Guias_generarDespacharLevantePrevio', $params);
	print_r($retorno);
?>