<?php
class SqlConexion {
  public $conexion;
  public $resultado;
  public $total_querys;

  public function __construct(){
    if(!($this->conexion)){
      $serverName = '181.49.4.186, 1433';
      $Database = "KRONO";
      $UID = "SA";
      $PWD = "KRONOTIMEbogota014";

      $conexionInfo = array( "Database"=>$Database, "UID"=>$UID, "PWD"=>$PWD,"CharacterSet" => "UTF-8");
      $this->conexion = sqlsrv_connect($serverName, $conexionInfo);
      if($this->conexion) {
         //echo "Conexión establecida.<br />";
      }else{
         echo "Conexión no se pudo establecer.<br />";
         die(print_r(sqlsrv_errors(), true));
      }
    }
  }
  public function query($query){
    //print "*****Antes de hacer query***** \n";
    $this->total_querys++;
    $this->resultado = sqlsrv_query($this->conexion, $query);
    if($this->resultado === false) {
      print "*****entro al error*****\n";
      die( print_r( sqlsrv_errors(), true ));
      $this->resultado = sqlsrv_query($this->conexion, $query ,array(), array("Scrollable" => 'static'));
      if(!$this->resultado){
        die(print_r( sqlsrv_errors(), true));
        exit;
      }
    }
    return $this->resultado;
  }

  public function fetch_array($query){
    return sqlsrv_fetch_array($this->resultado, SQLSRV_FETCH_NUMERIC);
  }

  public function num_rows($query){
    return sqlsrv_num_rows($query);
  }

  public function getTotalquerys(){
    return $this->total_querys; 
  }
  public function close_conexion($resultados){
    sqlsrv_free_stmt ($resultados); 
  }
  public function getResultQueryMatriz($query)
  {
    $i = 0;
    $columnas=0;
    $titles =array();
    $retorno=null;
    foreach( sqlsrv_field_metadata($this->resultado ) as $fieldMetadata ) {
      $titles []=$fieldMetadata ["Name"];
      $columnas ++;
    }
    $i = 0;
     
    while($resultados = $this->fetch_array($query)){
  
      for ($j = 0 ;$j < $columnas;$j++ )
      {
  
        $retorno[$i][$j] = $resultados[$j];
  
      }
      $i ++;
    }
    //var_dump($retorno);
    return $retorno;
  }
  
}
?>
