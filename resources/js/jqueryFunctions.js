$.when( $.ready ).then(function() {
    
    let task_id;
    let tasksArray = [];

    /*
    *   Boton para obtener el id del task a eliminar
    */
    $(".eliminar").on('click', function () {
        task_id = $(this).attr('data-id');
        console.log(task_id);
    });

    /*
    *   Funcion para obtener el objeto task y modificar el botton  de carrito
    */
    $(".addToCar").on('click', function () {
        task = $(this).attr('data-task');
        //console.log(typeof JSON.parse(task));
        task = JSON.parse(task);
        tasksArray.push(task);
        $('#carrito_cantidad').attr('hidden', false);
        $('#carrito_cantidad').text(tasksArray.length);
    });

    /*
    *   Funcion para mostrar el modal detalle del carrito
    */
    $('#carrito').on('click', function (){
        let tableContent = "";

        tasksArray.forEach((task) => {
            tableContent += "<tr>";
            tableContent += "<td>"+task.title+"</td>";
            tableContent += "<td>"+task.description+"</td>";
            tableContent += "<td>"+666+"</td>";
            tableContent += "</tr>";
        });

        $('#carrito_detalle').modal('show');
        $('#modal_body_detalle').html(tableContent);
    });


    /*
    *   Modal de confirmacion para la eliminación de un task
    */    
    $('#deleteTaskModal').on('shown.bs.modal', function(e) {
        $('#botonEliminar').click(function () {
            $("#deleteTaskModal").modal("hide");
            $('#form'+task_id).submit();
            task_id=null;
        });
    });


    /*
    *   Configuración de ajax para peticiones post LARAVEL
    */
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
        }
       });


    /*
    *   peticion ajax para guardar productos de la compra BORRADOR
    */
    $('.ajax').on('click', function (e) {
        e.preventDefault();
        $.ajax({
                // la URL para la petición
                url : 'test',
             
                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data : {productos_venta:productos_venta} ,
             
                // especifica si será una petición POST o GET
                type : 'post',
             
                // el tipo de información que se espera de respuesta
                //dataType : 'json',
             
                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success : function(res) {
                    console.log(res);
                },
             
                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
                // de la petición y un texto con la descripción del error que haya dado el servidor
                error : function(jqXHR, status, error) {
                    console.log('Disculpe, existió un problema');
                },
             
                // código a ejecutar sin importar si la petición falló o no
                complete : function(jqXHR, status) {
                    console.log('Petición realizada');
                }
            });
    });   

  });