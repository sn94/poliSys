<?php

class bdConexion{
    
    private $HOST="localhost";
    private $USER="root";
    private $CLAVE="";
    private $BD="universitarios";
    private $bd= null;
    private $Conectado= false;
    private $Success= false;
    
    
    public function __construct() {
        $this->db= new mysqli( $this->HOST, $this->USER,$this->CLAVE, $this->BD);
        if( !$this->db->connect_errno){  $this->Conectado= true; }
    }
    
    public function insert($arg){
       $resultados=$this->db->query( $arg );
       return $resultados? true: false;
    }
    
    
    public function  select($arg){
        $resultado= $this->db->query(  $arg) ; 
        $lista= array();
        while($objeto=  $resultado->fetch_object() ){
            array_push($lista, $objeto); 
        }
        
        return $lista;
    }
    
}


/*
print $_SERVER['QUERY_STRING']."  REQUEST URI   ";
print $_SERVER['REQUEST_URI']."   ".  $_SERVER['DOCUMENT_ROOT'];*/