<?php
include("Nucleo/bdConexion.php");

class Universitario extends bdConexion{
    
    private $anio="";
    private $carrera="";
    private $carrera_id="";
    private $documento="";
    private $fecha_resolucion="";
    private $id="";
    private $institucion="";
    private $institucion_id="";
    private $mes="";
    private $nombre_completo="";
    private $numero_resolucion="";
    private $tipo_institucion="";
    private $tipo_institucion_id="";
    private $titulo="";
    private $titulo_id="";
    private $gobierno_actual="";
    
    
    
    
    
    public function __construct() {
        parent::__construct();
        
    }
    
    
    public function __destruct() {
        $this->db->close();
    }
    
    public function insert($arg) {
        $query= "insert into universitario(anio,carrera,carrera_id,documento,fecha_resolucion,id,institucion,institucion_id,"
        . "mes,nombre_completo,numero_resolucion,tipo_institucion,tipo_institucion_id,titulo,"
        . "titulo_id,gobierno_actual) values(";

 foreach ($arg as $item){
 $sql=   $query."{$item->anio},'$item->carrera',{$item->carrera_id},'$item->documento',"
 . "'$item->fecha_resolucion',{$item->id}, '{$item->institucion}',{$item->institucion_id},"
 . "{$item->mes}, '$item->nombre_completo','$item->numero_resolucion','$item->tipo_institucion',"
 . "{$item->tipo_institucion_id}, '{$item->titulo}',{$item->titulo_id},'{$item->gobierno_actual}')";
 print $sql;
 parent::insert($sql);
 } 
    }
    
     public function update($arg) {
        $query= "insert into universitario(anio,carrera,carrera_id,documento,fecha_resolucion,id,institucion,institucion_id,"
        . "mes,nombre_completo,numero_resolucion,tipo_institucion,tipo_institucion_id,titulo,"
        . "titulo_id,gobierno_actual) values(";

 foreach ($arg as $item){
 $sql=   $query."{$item->anio},'$item->carrera',{$item->carrera_id},'$item->documento',"
 . "'$item->fecha_resolucion',{$item->id}, '{$item->institucion}',{$item->institucion_id},"
 . "{$item->mes}, '$item->nombre_completo','$item->numero_resolucion','$item->tipo_institucion',"
 . "{$item->tipo_institucion_id}, '{$item->titulo}',{$item->titulo_id},'{$item->gobierno_actual}')";
 parent::insert($sql);
 } 
    }
    
    
     public function selectById($id){

       $sql="select * from universitario where codigo=$id";
       $retorno = parent::select($sql);      
       return $retorno;
   }
   
   public function select($startFrom=0, $rows=0){

       $sql="select * from universitario";
       if($startFrom){ 
           $sql.=" limit $startFrom";
           if( $rows){$sql.=",$rows";}
       }
       $retorno = parent::select($sql);      
       
       if( !$retorno){
            include("Nucleo/readJson.php");
            $this->insert(  $lista);   
        }
        return $retorno;
   }
   
   
   public function generarEnlaces($rows= 16){
       $lista= $this->select(); 
       $startFrom=0; 
       $lista_links= array();
       
       $a=1;
       
       foreach ($lista as $ite){
          if( $a==1)
          {
              $startFrom= $ite->codigo;
               $enlaceUrl= getenv("POLISYS_URLBASE")."index.php/universitario/pagina/$startFrom/$rows";
               array_push($lista_links, $enlaceUrl);
          }
          
          if( $a >= $rows){
           $a= 1;
          }elseif( $a< $rows){ 
              $a++;
          }
          
        }
   return $lista_links;     }
    
    
}