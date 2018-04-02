<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("webservices.php");
	require_once ("src/core/Response/ErrorResponse.php");

	class MethodsCoordinadora {
		private $client;
		
		function __construct(){
			$this->client = new CoordinadoraWsldClient();
		}

		/* Functions to methods web */
		public function CallMethod($method , $params = null){			
			if($method == 'Guias_generarGuia'){
				return $this->Guias_generarGuia($params);	
			}else if($method == 'Guias_anularGuia'){
				return $this->Guias_anularGuia($params);	
			}else if($method == 'Guias_liquidacionGuia'){
				return $this->Guias_liquidacionGuia($params);	
			}else if($method == 'Guias_generarDespacho'){
				return $this->Guias_generarDespacho($params);	
			}else if($method == 'Guias_generarDespacharLevantePrevio'){
				return $this->Guias_generarDespacharLevantePrevio($params);	
			}else if($method == 'Guias_reimprimirGuia'){
				return $this->Guias_reimprimirGuia($params);
			}else if($method == 'Guias_reimprimirDespacho'){
				return $this->Guias_reimprimirDespacho($params);	
			}else if($method == 'Guias_reimprimirDespachoPlano'){
				return $this->Guias_reimprimirDespachoPlano($params);	
			}else if($method == 'Guias_consultarDespachos'){
				return $this->Guias_consultarDespachos($params);	
			}else if($method == 'Guias_rastreoSimple'){
				return $this->Guias_rastreoSimple($params);	
			}else if($method == 'Guias_rastreoExtendido'){
				return $this->Guias_rastreoExtendido($params);	
			}else if($method == 'Guias_detalleDespacho'){
				return $this->Guias_detalleDespacho($params);	
			}else if($method == 'Guias_estadoRecaudo'){
				return $this->Guias_estadoRecaudo($params);	
			}else if($method == 'Guias_ciudades'){
				return $this->Guias_ciudades($params);	
			}else if($method == 'Guias_generarDespachoMovil'){
				return $this->Guias_generarDespachoMovil($params);	
			}else if($method == 'Guias_reimprimirRotulos'){
				return $this->Guias_reimprimirRotulos($params);	
			}else if($method == 'Guias_reimprimirGuias'){
				return $this->Guias_reimprimirGuias($params);	
			}else if($method == 'Guias_generarGuiaInter'){
				return $this->Guias_generarGuiaInter($params);	
			}else if($method == 'Guias_editarGuia'){
				return $this->Guias_editarGuia($params);	
			}else if($method == 'Cotizador_departamentos'){
				return $this->Cotizador_departamentos($params);	
			}else if($method == 'Cotizador_ciudades'){
				return $this->Cotizador_ciudades($params);	
			}else if($method == 'Cotizador_cotizar'){
				return $this->Cotizador_cotizar($params);	
			}else if($method == 'Cotizador_cotizarInter'){
				return $this->Cotizador_cotizarInter($params);	
			}else if($method == 'Recaudos_consultar'){
				return $this->Recaudos_consultar($params);	
			}else if($method == 'Recogidas_programar'){
				return $this->Recogidas_programar($params);	
			}else if($method == 'Recogidas_seguimiento'){
				return $this->Recogidas_seguimiento($params);	
			}
		}

		//Web Service generacion de guías
			//Reimprimir guia
				private function Guias_reimprimirGuia($params = null){
					if ($params){
						$result = $this->client->execute('Guias_reimprimirGuia', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Generar guia
				private function Guias_generarGuia($params = null){
					if ($params){
						$result = $this->client->execute('Guias_generarGuia', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Anular guia
				private function Guias_anularGuia($params = null){
					if ($params){
						$result = $this->client->execute('Guias_anularGuia', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Liquidacion de guia
				private function Guias_liquidacionGuia($params = null){
					if ($params){
						$result = $this->client->execute('Guias_liquidacionGuia', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Generar despacho
				private function Guias_generarDespacho($params = null){
					if ($params){
						$result = $this->client->execute('Guias_generarDespacho', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Generacion despachar levante previo
				private function Guias_generarDespacharLevantePrevio($params = null){
					if ($params){
						$result = $this->client->execute('Guias_generarDespacharLevantePrevio', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Reimprimir Despacho
				private function Guias_reimprimirDespacho($params = null){
					if ($params){
						$result = $this->client->execute('Guias_reimprimirDespacho', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Despacho Plano
				private function Guias_reimprimirDespachoPlano($params = null){
					if ($params){
						$result = $this->client->execute('Guias_reimprimirDespachoPlano', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Consulta de despachos
				private function Guias_consultarDespachos($params = null){
					if ($params){
						$result = $this->client->execute('Guias_consultarDespachos', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Rastreo Simple
				private function Guias_rastreoSimple($params = null){
					if ($params){
						$result = $this->client->execute('Guias_rastreoSimple', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Rastreo Extendido
				private function Guias_rastreoExtendido($params = null){
					if ($params){
						$result = $this->client->execute('Guias_rastreoExtendido', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Detalle despachos
				private function Guias_detalleDespacho($params = null){
					if ($params){
						$result = $this->client->execute('Guias_detalleDespacho', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Estado Recaudo
				private function Guias_estadoRecaudo($params = null){
					if ($params){
						$result = $this->client->execute('Guias_estadoRecaudo', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Ciudades
				private function Guias_ciudades($params = null){
					if ($params){
						$result = $this->client->execute('Guias_ciudades', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Despacho Movil
				private function Guias_generarDespachoMovil($params = null){
					if ($params){
						$result = $this->client->execute('Guias_generarDespachoMovil', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Reimprimir rotulos
				private function Guias_reimprimirRotulos($params = null){
					if ($params){
						$result = $this->client->execute('Guias_reimprimirRotulos', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Reimprimir guias
				private function Guias_reimprimirGuias($params = null){
					if ($params){
						$result = $this->client->execute('Guias_reimprimirGuias', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Generar guia interna
				private function Guias_generarGuiaInter($params = null){
					if ($params){
						$result = $this->client->execute('Guias_generarGuiaInter', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Editar guia
				private function Guias_editarGuia($params = null){
					if ($params){
						$result = $this->client->execute('Guias_editarGuia', $params);
						return $result;
						//var_dump($result);
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			
		//Web Service Seguimiento de despachos
			//Departamentos
				private function Cotizador_departamentos($params = null){
					if ($params){
						$result = $this->client->execute('Cotizador_departamentos', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Ciudades
				private function Cotizador_ciudades($params = null){
					if ($params){
						$result = $this->client->execute('Cotizador_ciudades', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Cotizacion
				private function Cotizador_cotizar($params = null){
					if ($params){
						$result = $this->client->execute('Cotizador_cotizar', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Cotizaion Internacional
				private function Cotizador_cotizarInter($params = null){
					if ($params){
						$result = $this->client->execute('Cotizador_cotizarInter', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}
			//Consultar recaudos
				private function Recaudos_consultar($params = null){
					if ($params){
						$result = $this->client->execute('Recaudos_consultar', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}	
			//Programar recogidas
				private function Recogidas_programar($params = null){
					if ($params){
						$result = $this->client->execute('Recogidas_programar', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}	
			//Seguimiento de recogida
				private function Recogidas_seguimiento($params = null){
					if ($params){
						$result = $this->client->execute('Recogidas_seguimiento', $params);
						return $result;
					}else{
						return new ErrorResponse (
						array('Head' => array(
								'ErrorCode'=>'error',
								'ErrorMessage' => "Los parametros son requeridos en este metodo"
								)
							)
						);
					}
				}	
	}
?>