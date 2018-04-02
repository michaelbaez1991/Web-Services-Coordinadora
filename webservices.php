<?php
	/* 1. INCLUYE LIBRERIA NuSoap*/
	require_once ("src/nusoap.php");
	
	class CoordinadoraWsldClient {
		const usuario = "kronotime.ws"; //Usuario coordinadora WS Generacion de guias
		const clave   = "Kt89u!y?gt"; //Clave coordinadora WS Generacion de guias
		
		//const apikey = "19546fa6-5755-11e7-907b-a6006ad3dba0"; //Usuario coordinadora WS Generacion de guias
		//const clave   = "L69T|4!bWYn2Lc"; //Clave coordinadora WS Generacion de guias

		const uriWsdl = "http://guias.coordinadora.com/ws/guias/1.5/server.php?wsdl"; //WS Generacion de guias
		//const uriWsdl = "http://sandbox.coordinadora.com/ags/1.4/server.php?wsdl"; //WS Seguimiento de despachos

		//http://guias.coordinadora.com/ws/guias/1.5/server.php?wsdl(Produccion)
		//http://sandbox.coordinadora.com/agw/ws/guias/1.5/server.php?wsdl(Test)

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

		function execute($metodo, $params = null) {
			$params['usuario'] = static::usuario; //parametros de login para guias en coordinadora
			$params['clave'] = hash('sha256', static::clave); //parametros de login para guias en coordinadora

			//$params['apikey'] = static::apikey; //parametros de login para despachos en coordinadora
			//$params['clave'] = hash('sha256', static::clave); //parametros de login para despachos en coordinadora

			//var_dump($params);
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