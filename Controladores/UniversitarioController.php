<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("Modelos/Universitario.php");

class UniversitarioController{
    
    private $objUniversitario= null;
    
    public function __construct() {
       $this->objUniversitario= new Universitario();
    }
    
    
    public function index(){
        $enlaces= $this->objUniversitario->generarEnlaces(40);
        $lista=  $this->objUniversitario->select();
        include("Vistas/Universitario/index.php");
    }
    
    
    public function pagina($desde=0,$filas=0){
        $enlaces= $this->objUniversitario->generarEnlaces(40);
        $lista=  $this->objUniversitario->select($desde,$filas);
        include("Vistas/Universitario/index.php");
    }
    
    public function ficha($id){
        $ficha= $this->objUniversitario->selectById(  $id );
        $ficha= $ficha[0];
        include("Vistas/Universitario/ficha.php");
    }
    
    
    
    public function inicio(){
        /****LLAMAR AL CONTROLADOR ***/
include("templates/sectionStart.html");
include("Vistas/Universitario/welcome.php");
 include("templates/sectionEnd.html");
    }
    
    
    
    
      public function tablasJson(){ 
       //$lista=  $this->objUniversitario->select();
        
        include("Modelos/Datatables.php");
        echo $JsonData;
         
    }
    
     
    
    
    
      public function tablas(){ 
       //$lista=  $this->objUniversitario->select();
        
        include("Vistas/Universitario/tablas.php");
         
         
    }
    
    
    
       public function test(){ 
        echo "<div class='alert alert-danger'> Hello World</div>";
       }
    
    
      
}


