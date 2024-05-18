
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
                            personal.unidad_nombre,
                            '<button class="btn btn-sm btn-primary edit-btn" data-id="' + personal.id + '">Editar</button>' +
                            '<button class="btn btn-sm btn-info view-btn" data-id="' + personal.id + '">Visualizar</button>'
                        ]).draw();
                    });
                }
            });
        }
    });
    $('#data_personal tbody').on('click', '.view-btn', function () {
        var personalId = $(this).data('id');
        // Redirection to a new page with the personal ID
        window.location.href = '/personal_lista/' + personalId;
        //window.location.href = '/personal/detalle_personal?id=' + personalId;
    });
    $('#data_personal tbody').on('click', '.edit-btn', function () {
        var personalId = $(this).data('id');
        // Redirection to a new page with the personal ID
        alert(personalId)
        //window.location.href = '/personal/detalle_personal?id=' + personalId;
    });

} );
