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
			if($method == 'Guias_reimprimirGuia'){
				return $this->Guias_reimprimirGuia($params);		
			}else if($method == 'newClient'){
				return $this->newClient($params);	
			}else if($method == 'updateClient'){
				return $this->updateClient($params);	
			}else if($method == 'newAddressee'){
				return $this->newAddressee($params);	
			}else if($method == 'updateAddressee'){
				return $this->updateAddressee($params);	
			}
		}
		
		private function newClient($params = null){
			if ($params){
				$result = $this->client->execute('newClient', $params);
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

		private function updateClient($params = null){
			if ($params){
				$result = $this->client->execute('updateClient', $params);
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

		private function newAddressee($params = null){
			if ($params){
				$result = $this->client->execute('newAddressee', $params);
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

		private function updateAddressee($params = null){
			if ($params){
				$result = $this->client->execute('updateAddressee', $params);
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

		private function updateAddressee($params = null){
			if ($params){
				$result = $this->client->execute('updateAddressee', $params);
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
	}	
?>