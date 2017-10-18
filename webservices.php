<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("src/nusoap.php");
	
	class CoordinadoraWsldClient {
		const usuario = 'kronotime.ws';
		const clave   = 'Kt89u!y?gt';
		const uriWsdl = 'http://sandbox.coordinadora.com/agw/ws/guias/1.5/server.php?wsdl';

		private $clientNuSoap; 
		private $clientSoap; 
		
		function __construct(){
			/* 1 . Client con lib NuSoap */
			$this->clientNuSoap = new nusoap_client(static::uriWsdl,'wsdl','','','','');
			$this->clientNuSoap->soap_defencoding = 'UTF-8';
			$this->clientNuSoap->decode_utf8 = FALSE;
			/* 2 . Client con SoapClient nativo php */
			$this->clientSoap = new SoapClient(static::uriWsdl);
		}

		function execute ($metodo, $params = null) {
			$params['usuario'] = static::usuario;
			$params['clave'] = hash('sha256' , static::clave );

			//print_r($params);
			$resultado = $this->clientNuSoap->call($metodo , array($params), '', '', false, true); // lib nusoap
			//$resultado = $this->clientSoap->__soapCall($metodo, array($params)); // native php soap

			if ($this->clientNuSoap->fault) {
				return $resultado;
			} 
			
			$err = $this->clientNuSoap->getError();
			
			if ($err) {
				return $err;
			} else {
				return $resultado;
			}
		}
	}	
	
?>