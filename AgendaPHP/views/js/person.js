$(document).ready(function () {
    
    /*
    **	@ Agregamos a nuestra tabla el plugin de DATA TABLE 
    */

    $(".tablas").DataTable({
       
        "language": {
 
           "sProcessing":     "Procesando...",
           "sLengthMenu":     "Mostrar _MENU_ registros",
           "sZeroRecords":    "No se encontraron resultados",
           "sEmptyTable":     "Ningún dato disponible en esta tabla",
           "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
           "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
           "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
           "sInfoPostFix":    "",
           "sSearch":         "Buscar:",
           "sUrl":            "",
           "sInfoThousands":  ",",
           "sLoadingRecords": "Cargando...",
           "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
           },
           "oAria": {
             "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
             "sSortDescending": ": Activar para ordenar la columna de manera descendente"
           }
         }
       });

    /*
    **	@ input masks 
    */  
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()


    //Date picker
    $('#fechaNacimiento').datepicker({
      format:"yyyy/mm/dd",
      clearBtn: true,
      language: "es",
      autoclose: true,
      keyboardNavigation: false,
      todayHighlight: true

    });

    /*
    **	@ Mostrando los datos del contacto en los values     
    */

    $(".btnEditarContacto").click(function () { 
      
        var idContacto = $(this).attr("idContacto");
        // $(".nuevoFechaNacimiento").val("1991/08/04");



        var datos = new FormData();
        datos.append("idContacto",idContacto);

        $.ajax({
           method: "post",
            url: "ajax/ajax_person.php",
            dataType:'json',
            data: datos,
            processData: false,
            contentType: false,
            cache:false, 
            success: AjaxSucceeded,
            error: AjaxFailed,
            
        });
        function AjaxSucceeded(resultado){
          console.log(resultado);

          $("#editarNombre").val(resultado["nombre"]);
          $("#editarApellido").val(resultado["apellido"]);
          $("#editarEmpresa").val(resultado["empresa"]);
          $("#editarCorreo").val(resultado["email"]);
          $("#editarNumero").val(resultado["telefono"]);
          $("#fecha_nacimiento_actual").val(resultado["fecha_nacimiento"]);
          $("#foto_actual").val(resultado["foto"]);
          $("#idContacto").val(resultado["id"]);

          

          $('#editarfechaNacimiento').datepicker({
            format:"yyyy/mm/dd",
            clearBtn: true,
            language: "es",
            autoclose: true,
            keyboardNavigation: false,
            todayHighlight: true
      
          });

          
        }
        function AjaxFailed(result){
          console.log("error");
          
          console.log(result.status +' '+result.statusText);
        }
    
      
    });


    /*
    ** @Eliminar un contacto mediante la cabecera 
    */
   $(".btnBorrarContacto").click(function () { 
      
      var idContacto = $(this).attr("idContacto");
      var ruta = $(this).attr("imagen");

          swal({
            title: '¿Está seguro de borrar el contacto?',
            text: "¡Si no lo está puede cancelar la accíón!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Cancelar',
              confirmButtonText: 'Si, borrar cliente!'
          }).then((result)=>{
          
            if(result.value){
            
              window.location = "index.php?idContacto="+idContacto+"&ruta="+ruta;
            
            }
          
          })
      
      
      
   });


    
    


    

    



});