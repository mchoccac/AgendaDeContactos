<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Si se  va a utilizar datatable tenemos que usar bootstrap 3.3.7 porque en la version 4 da errror -->

    <!-- Estilos CSS -->

      <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="views/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/estilos.css">
    <link rel="stylesheet" href="views/plugins/font-awesome/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="views/plugins/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="views/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Script o plugins -->
    <script src="views/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
  <script src="views/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- DataTables -->
    <script src="views/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="views/plugins/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

      <!-- InputMask -->
    <script src="views/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="views/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- bootstrap datepicker -->
    <script src="views/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!--Alertas Sueaves  -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>



    <title>Agenda</title>
</head>
<body >

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
            <p class="text-center titulo"> Agenda de Contactos</p>
   
            </div>
            <div class="col-sm-4">
                <div>
                <img  src="views/img/contacto.png" width="150px" class="img-fluid imagenTitulo" alt="foto">
                </div>
            <button type="button" class="btn btn-success mb-3" style="margin-left: 80px;" data-toggle="modal" data-target="#modelAgenda">Nuevo Contacto</button>
            </div>
        </div>
        
        <div class="row tablaEdicion">
            <div>
                <table class="table table-striped table-bordered dt-responsive tablas nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Empresa</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Fecha Nacimineto</th>
                            <th>foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $lista_person = new Controller_person();
                        $lista_person -> listar_person_ctr();
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <footer class="main-footer">
                <strong>Copyright &copy; 2018 <a href="#" target="_blank">_____</a>.</strong>
                Todos los derechos reservados.
                </footer>
            </div>
        </div>

        
    </div>
      <!-- Modal -->
    <div class="modal fade" id="modelAgenda" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data" >

                <div class="modal-header">
                    <h4 class="modal-title text-info" id="modelTitleId">Agrear un nuevo Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">

                            <!--Nombres -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                <input type="text" name="nuevoNombre" id="nuevoNombre" class="form-control" placeholder="Ingrese Nombre" required>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-plus"aria-hidden="true"></i></span>
                            <input type="text" name="nuevoApellido" id="nuevoApellido" class="form-control" placeholder="Ingrese Apellidos" required>
                            </div>
                        </div>

                        <!-- Empresa -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" name="nuevoEmpresa" id="nuevoEmpresa" class="form-control" placeholder="Ingresa el nombre de la empresa" required>
                            </div>
                        </div>
                        
                        <!-- Correo electronico -->
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            <input type="email" name="nuevoCorreo"class="form-control" id="nuevoCorreo" placeholder="Ingresa tu correo electronico" required>
                            </div>
                        </div>

                        <!-- numero -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile-phone" aria-hidden="true"></i></span>
                                <input type="text" class="form-control"  name="nuevoNumero" id="nuevoNumero" placeholder="Ingresa tu numero telefonico"
                                data-inputmask='"mask": "(999) 9999-9999"' data-mask required>
                            </div>
                        </div>

                        <!-- fecha nacimiento -->
                         <!-- Date -->
                        <div class="form-group">            
                          <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="fechaNacimiento" name="nuevoFechaNacimiento" required>
                          </div>
                        </div>


                       <div class="form-group">
                         <label for="">Foto</label>
                         <input type="file" class="form-control-file btn btn-default" name="nuevaFoto" id="nuevaFoto" placeholder="Aqui" >
                         <p class="text-info text-center">Tamaño recomendado <strong>200px * 200px</strong>, peso maximo 2MB extencion JPG</p>
                       </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
                    <?php
                        $crear_person = new Controller_person();
                        $crear_person -> crear_person_ctr();
                    ?>
            </div>
        </div>
    </div>

    <!-- modal para la edicion -->
     <!-- Modal -->
     <div class="modal fade" id="modelEditarAgenda" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="post" role="form" enctype="multipart/form-data" >

                <div class="modal-header">
                    <h4 class="modal-title text-info" id="modelTitleId">Editar un Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">

                            <!--Nombres -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                <input type="text" name="editarNombre" id="editarNombre" class="form-control"  required>
                                <input type="hidden" name="idContacto" id="idContacto">
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-plus"aria-hidden="true"></i></span>
                            <input type="text" name="editarApellido" id="editarApellido" class="form-control"  required>
                            </div>
                        </div>

                        <!-- Empresa -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" name="editarEmpresa" id="editarEmpresa" class="form-control"  required>
                            </div>
                        </div>
                        
                        <!-- Correo electronico -->
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            <input type="email" name="editarCorreo"class="form-control" id="editarCorreo" required>
                            </div>
                        </div>

                        <!-- numero -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile-phone" aria-hidden="true"></i></span>
                                <input type="text" class="form-control"  name="editarNumero" id="editarNumero" 
                                data-inputmask='"mask": "(999) 9999-9999"' data-mask required>
                            </div>
                        </div>

                        <!-- fecha nacimiento -->
                         <!-- Date -->
                        <div class="form-group">            
                          <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="editarfechaNacimiento" name="editarFechaNacimiento">
                            <input type="hidden" name="fecha_nacimiento_actual" id="fecha_nacimiento_actual">
                          </div>
                        </div>

                        <!-- Foto contacto -->
                       <div class="form-group">
                         <label for="">Foto</label>
                         <input type="file" class="form-control-file btn btn-default" name="editarFoto" id="editarFoto"  >
                         <input type="hidden" name="foto_actual" id="foto_actual">
                         <p class="text-info text-center">Tamaño recomendado <strong>200px * 200px</strong>, peso maximo 2MB extencion JPG</p>
                       </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </div>

            </form>
            <?php

                $editarContacto = new Controller_person();
                $editarContacto -> editar_person_ctr();

            ?>
                    
            </div>
        </div>
    </div>

     <?php

        $eliminarContacto = new Controller_person();
        $eliminarContacto -> eliminar_person_ctr();

    ?>



        
               
    
  


    <script src="views/js/person.js"></script>
   
</body>
</html>