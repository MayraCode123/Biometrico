$(document).ready( function () {
    $('#example').DataTable({
        "paging": true,
        "pageLength": 10,
        "order": [[ 1, 'asc' ]],
        responsive:true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por paginas",
            "emptyTable": "No hay registros disponibles",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existe registros",
            "infoFiltered": "(Filtrado from _MAX_ registros totales)",
            "search": 'Buscar:',
            "paginate": {
                "next":"Siguiente",
                "previous":"Anterior"
            }
        }
    });

} );
