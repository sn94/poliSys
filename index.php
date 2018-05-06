<?php

$segmentos= explode("/", $_SERVER['REQUEST_URI']) ;
array_shift($segmentos);//quitar espacio en blanco
array_shift($segmentos);//quitar nombre de aplicacion
array_shift($segmentos);//quitar indice



/*****URL *****/
$dominio= "localhost";
$app="poliSys";
$Url_base="http://$dominio/$app/";
putenv("POLISYS_URLBASE=$Url_base");









/****Llamadas ********/
$controlador="";
$metodo="";
$params= array();


if(sizeof($segmentos)> 1){
    // app  indice controlador metodo param1 param2
$controlador=  $segmentos[0];
//metodo
$metodo= $segmentos[1];
if(sizeof($segmentos) > 2 ){
    array_shift($segmentos);//quitar controller
    array_shift($segmentos);//quitar metodo
    foreach ($segmentos as $val){
        array_push( $params, $val);
    }
}
}else{
    //llamar  a controlador por defecto
    
}




if($controlador == "universitario" || !sizeof($segmentos)){
    include("Controladores/UniversitarioController.php");
    $objUni= new UniversitarioController();
    if( $metodo == "inicio"  || !sizeof($segmentos) ){
        $objUni->inicio( $params );
    }
     if( $metodo == "pagina"){
        $objUni->pagina( $params[0],$params[1] );
    }
    
    if( $metodo == "ficha"){
        $objUni->ficha( $params[0] );
    }
    if( $metodo == "tablasJson"){
        $objUni->tablasJson( );
    }
     if( $metodo == "index"){
        $objUni->index($params );
    }
    
     if( $metodo == "tablas"){
        $objUni->tablas( );
    }
    
    
}



/****** 
 if($controlador == "Datatable.php" || !sizeof($segmentos)){
    include("Controladores/Datatable.php");     
}
 ***********/


