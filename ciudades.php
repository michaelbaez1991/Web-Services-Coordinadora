<?php
	/* Ciudades activas al momento de la consultas. */
	require_once ("methods.php");
	require_once ("src/core/Response/ErrorResponse.php");

	$metodos = new MethodsCoordinadora();
	$params = array ( 
					"p" => '' 
				);
	
	$retorno = $metodos->CallMethod('Guias_ciudades', $params);
	var_dump($retorno);
	
	//$buscoCiudad = $_POST['buscoCiudad'];
	//$buscoDepartamento = $_POST['buscoDepartamento'];
	$buscoCiudad = 'Pere';
	$buscoDepartamento = 'Villa';

	foreach ($retorno as $value) {
		if (isset($value)) {
			if ($buscoCiudad != '') {
				//var_dump($value['nombre']);
				if (strncasecmp($buscoCiudad, $value['nombre'], 4) === 0){
					if ($buscoDepartamento != '') {
						if (strncasecmp($buscoDepartamento, $value['nombre_departamento'], 4) === 0){
						    echo $value['codigo'].'<br>';
						    //echo $value['nombre'].'<br>';
						    //echo $value['codigo_departamento'].'<br>';
						    //echo $value['nombre_departamento'].'<br>';
						}else{
							echo 'No encuentro el departamento';
							break;
						}
					}else{
						echo 'Aun no a ingresa el departamento';
						break;
					}
				}else{
					echo 'No encuentro la ciudad';
					break;
				}
			}else{
				echo 'Aun no a ingresa la ciudad';
				break;
			}
		}
	}
?>
