
$(document).ready( function () {
    var table = $('#data_personal').DataTable({
            "paging": true,
            "pageLength": 10,
            "order": [[ 0, 'asc' ]],
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
    $('#category').on('change', function () {
        var area_id = $(this).val();
        if (area_id == 'reset') {
            table.clear().draw();
        } else {
            $.ajax({
                url: '/personal/listalista_personal_area',
                method: 'GET',
                data: {
                    category: area_id
                },
                success: function (response) {
                    table.clear();
                    $.each(response.data, function (index, personal) {
                        table.row.add([
                            personal.id,
                            personal.nombre_personal,
                            personal.nombre_usuario,
                            personal.area_nombre,
                            personal.unidad_nombre
                        ]).draw();
                    });
                }
            });
        }
    });

} );
