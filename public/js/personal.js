
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
                            // '<button class="btn btn-sm btn-primary edit-btn" data-id="' + personal.id + '">Editar</button>' +
                            '<button class="btn btn-sm btn-info view-btn" data-id="' + personal.id + '"><i class="fas fa-fw fa-eye"></i></button>'
                        ]).draw();
                    });
                }
            });
        }
    });
    $('#data_personal tbody').on('click', '.view-btn', function () {
        var rowData = table.row($(this).parents('tr')).data(); // Obtener los datos de la fila actual
        var personalId = rowData[0]; // Suponiendo que la primera columna contiene el ID del personal
        var areaId = rowData[3]; // Suponiendo que la cuarta columna contiene el nombre del área

        console.log('Personal ID:', personalId); // Depuración
        console.log('Area ID:', areaId); // Depuración

        if (areaId.toLowerCase() === 'direccion') {
            window.location.href = '/personal/direccion/' + personalId;
        } else if (areaId.toLowerCase() === 'marketing') {
            window.location.href = '/personal/marketing/' + personalId;
        } else if (areaId.toLowerCase() === 'ti') {
            window.location.href = '/personal/ti/' + personalId;
        } else if (areaId.toLowerCase() === 'academicos') {
            window.location.href = '/personal/academicos/' + personalId;
        } else {
            window.location.href = '/personal/general/' + personalId;
        }
    });

} );
