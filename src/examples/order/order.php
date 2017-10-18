<?php
    require_once('C:/wamp/www/WSLDModdo/src/core/Model/ModelAbstract.php');
    /*
    * Class Order
    **/
    class Order extends ModelAbstract{
        const IDALMACEN = 'idAlmacen';
        const NUMEROPEDIDO = 'numeroPedido';
        const FECHA = 'fecha';
        const FECHA_SOLICITUD = 'FECHA_SOLICITUD';
        const FECHA_PEDIDO = 'FECHA_PEDIDO';
        const FORMA_PAGO = 'FORMA_PAGO';
        const OBSERVACIONES = 'OBSERVACIONES';
        const REFERENCIA = 'REFERENCIA';
        const LAST_NAME = 'NOMBRE_ENVIO';
        const DOMICILIO_ENVIO = 'DOMICILIO_ENVIO';
        const POBLACION_ENVIO = 'POBLACION_ENVIO';
        const PROVINCIA_ENVIO = 'PROVINCIA_ENVIO';
        const PAIS_ENVIO = 'PAIS_ENVIO';
        const PRODUCTOS = 'PRODUCTOS';
        const ESTATUS_ENVIADA = 'enviada';
        const ESTATUS_PENDIENTE = 'pendiente';
        const ESTATUS_ANULADO = 'anulada';    
        const DNI_CLIENTE = 'DNI_ENVIO'; 
        const TELEFONO_ENVIO = 'TELEFONO_ENVIO';
        const TELEFONO_MOVIL_ENVIO = 'TELEFONO_MOVIL_ENVIO';
        const EMAIL_ENVIO = 'EMAIL_ENVIO';
        const IDPETICION = 'idWsIntegracionTienda';
        const NOMBRE_XML = 'nombreXml';
        const TIPO_PEDIDO = 'tipoPedido';
        const NUMERO_PEDIDO_EXTERNO = 'NUMERO_PEDIDO_EXTERNO';
        const GUIA = 'guia';
        
        /**
         * @var array
         */
        function __construct(array $data) {
            $arregloXML = $this->loadXML($data['xml']);
            foreach ($arregloXML as $key => $value) {
               $data[$key] = $value;
            }
           
            //var_dump($data);
            parent::__construct($data);  
        }

        protected $fieldDefinition = [
            self::IDALMACEN => self::TYPE_STRING,
            self::NUMEROPEDIDO => self::TYPE_STRING,
            self::FECHA => self::TYPE_STRING,
            self::FECHA_SOLICITUD => self::TYPE_STRING,
            self::FECHA_PEDIDO => self::TYPE_STRING,
            self::FORMA_PAGO => self::TYPE_STRING,
            self::OBSERVACIONES => self::TYPE_STRING,
            self::REFERENCIA => self::TYPE_STRING,
            self::LAST_NAME => self::TYPE_STRING,
            self::DOMICILIO_ENVIO => self::TYPE_STRING,
            self::POBLACION_ENVIO => self::TYPE_STRING,
            self::PROVINCIA_ENVIO => self::TYPE_STRING,
            self::PAIS_ENVIO => self::TYPE_STRING,
            self::PRODUCTOS => self::TYPE_STRING,
            self::DNI_CLIENTE => self::TYPE_STRING,
            self::ESTATUS_ENVIADA => self::TYPE_STRING,
            self::ESTATUS_PENDIENTE => self::TYPE_STRING,
            self::ESTATUS_ANULADO => self::TYPE_STRING,
            self::TELEFONO_ENVIO => self::TYPE_STRING,
            self::TELEFONO_MOVIL_ENVIO => self::TYPE_STRING,
            self::EMAIL_ENVIO => self::TYPE_STRING,
            self::IDPETICION => self::TYPE_STRING,
            self::NOMBRE_XML => self::TYPE_STRING,
            self::TIPO_PEDIDO => self::TYPE_STRING,
            self::NUMERO_PEDIDO_EXTERNO => self::TYPE_STRING,
            self::GUIA => self::TYPE_STRING
        ];

        public function NUMERO_PEDIDO_EXTERNO(){
            return $this->data[self::NUMERO_PEDIDO_EXTERNO];
        }

        public function GUIA(){
            return $this->data[self::GUIA];
        }

        public function TIPO_PEDIDO(){
            return $this->data[self::TIPO_PEDIDO];
        }

        public function FECHA_ACTUAL(){
            date_default_timezone_set('America/Bogota');
            return $fecha_actual = date('d/m/Y H:i');
        }

        public function loadXML($dataXML){
            $xml = simplexml_load_string($dataXML);
            $retorno = array();
            foreach($xml as $key => $value) {
                $retorno = $value;
            }
            return $retorno;
        }

        public function IDALMACEN(){
            return $this->data[self::IDALMACEN];
        }

        public function FIRSTNAME(){
            $nombre = explode(' ', $this->data[self::LAST_NAME]);
            return $nombre[0];
        }

        public function LAST_NAME(){
            $nombre = explode(' ', $this->data[self::LAST_NAME]);
            return $nombre[1];
        }

        public function NUMEROPEDIDO(){
            return $this->data[self::NUMEROPEDIDO];
        }

        public function FECHA(){
            return $this->data[self::FECHA];
        }

        public function FECHA_SOLICITUD(){
            return $this->data[self::FECHA_SOLICITUD];
        }

        public function FECHA_PEDIDO(){
            return $this->data[self::FECHA_PEDIDO];
        }

        public function FORMA_PAGO(){
            return $this->data[self::FORMA_PAGO];
        }

        public function OBSERVACIONES(){
            return $this->data[self::OBSERVACIONES];
        }

        public function REFERENCIA(){
            return $this->data[self::REFERENCIA];
        }

        public function DIRECCION_ENVIO(){
            $Direccion_general = '';
            $Direccion_general.= '|City:'.$this->data[self::POBLACION_ENVIO];
            $Direccion_general.= '|Country:'.$this->data[self::PAIS_ENVIO];
            $Direccion_general.= '|Address1:'.$this->data[self::DOMICILIO_ENVIO];
            $Direccion_general.= '|Address2:'.$this->data[self::PROVINCIA_ENVIO];
            $Direccion_general.= '|FirstName:'.self::FIRSTNAME();
            $Direccion_general.= '|LastName: '.self::LAST_NAME();
            $Direccion_general.= '|Phone:'.$this->data[self::TELEFONO_ENVIO].' '.$this->data[self::TELEFONO_MOVIL_ENVIO];
            $Direccion_general.= '|Email:'.$this->data[self::EMAIL_ENVIO];

            return $Direccion_general;
        }

        public function ITEMSCOUNT(){
            return count($this->data[self::PRODUCTOS]);
        }

        public function ORDEN_ITEMS(){
            return $this->data[self::PRODUCTOS];
        }

        public function ESTATUS(){
            $enviada = $this->data[self::ESTATUS_ENVIADA];
            $pendiente = $this->data[self::ESTATUS_PENDIENTE];
            $anulada = $this->data[self::ESTATUS_ANULADO];

            if ($enviada == 'true') {
                return 'ENVIADA';
            }elseif($pendiente == 'true'){
                return 'PENDIENTE';
            }else{
                return 'ANULADA';
            }
        }

        public function FECHA_LLEGADA_ENVIO(){

            $fecha = date_create($this->data[self::FECHA]);
            date_modify($fecha, '+7 day');
            date_format($fecha, 'Y-m-d H:i:s');
            return $fecha;
        }

        public function DNI_CLIENTE(){
            return $this->data[self::DNI_CLIENTE];
        }

        public function ACTUALIZAR_ESTATUS(){
            return $this->data[self::IDALMACEN];
        }

        public function IDPETICION(){
            return $this->data[self::IDPETICION];
        }

        public function NOMBRE_XML(){
            return $this->data[self::NOMBRE_XML];
        }
}
    