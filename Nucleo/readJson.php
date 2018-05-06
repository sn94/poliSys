<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
$fopen = fopen("recursos/registros_titulos.json", "r");
$cadenaJson="";
while( !feof( $fopen)){
    $cadenaJson.= fgets($fopen);
}
fclose($fopen);
$lista= json_decode($cadenaJson);
