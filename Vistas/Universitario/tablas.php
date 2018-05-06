<style>

td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.details td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}


</style>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Nombre Completo</th>
                <th>Titulo</th>
                <th>Institucion</th>
                <th>fecha resolucion</th>
                <th>Anio</th> 
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                 <th>Nombre Completo</th>
                <th>Titulo</th>
                <th>Institucion</th>
                <th>fecha resolucion</th>
                <th>Anio</th> 
            </tr>
        </tfoot>
    </table>
    
    
    <script>
    
    
    function format ( d ) {
    return 'Full name: '+d.nombre_completo+' '+d.titulo+'<br>'+
        'Anio: '+d.anio+'<br>'+
        'The child row can contain any data you wish, including links, images, inner tables etc.';
}
 
$(document).ready(function() {
    var dt = $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../../Vistas/Universitario/Datatable.php",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            { "data": "nombre_completo" },
            { "data": "titulo" },
            { "data": "institucion" },
            { "data": "fecha_resolucion" },
              { "data": "anio" }
        ],
        "order": [[1, 'asc']]
    } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#example tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
} );



    </script>