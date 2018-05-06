<?php

   
$table = 'universitario';
 
// Table's primary key
$primaryKey = 'codigo';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier - in this case object
// parameter names




 $columns = array(
    array(
        'db' => 'codigo',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array( 'db' => 'nombre_completo', 'dt' => 'nombre_completo' ),
    array( 'db' => 'titulo',  'dt' => 'titulo' ),
    array( 'db' => 'institucion',   'dt' => 'institucion' ), 
    array(
        'db'        => 'fecha_resolucion',
        'dt'        => 'fecha_resolucion',
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'anio',
        'dt'        => 'anio',
        'formatter' => function( $d, $row ) {
             return '$'.number_format($d);
        }
    )
);



 
  $sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'universitarios',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
 
    
 include( '../../Librerias/spp.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ));  

 
 
 


 
 
