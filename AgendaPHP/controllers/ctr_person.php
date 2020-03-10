<?php


class Controller_person{
    
    /*
    **	@Metodo el cual vamos a mostrar en la vista  
    */

    public function template_ctr()
    {
        include_once "views/template.php";
    }

    /*
    **	@Metodo para crear unu usuario para enviar la peticion a la BD 
    */

    public function crear_person_ctr()
    {   
        if (!empty($_POST["nuevoNombre"])) {
           
            if (preg_match('/^[a-zA-Z ]+$/',$_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z ]+$/',$_POST["nuevoApellido"]) &&
                preg_match('/^[a-zA-Z ]+$/',$_POST["nuevoEmpresa"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}+$/',$_POST["nuevoCorreo"]) &&
                preg_match('/^[()\-0-9 ]+$/',$_POST["nuevoNumero"])) {


                $ruta ="";

                if (!empty($_FILES["nuevaFoto"]["tmp_name"])) {

                    /*
                    **	@asignamos la ruta donde colocaremos la imagen mas un numero aleatorio 
                    */  

                    $imagen = $_FILES["nuevaFoto"]["tmp_name"];

                    $random = mt_rand(100,999);

                    /*
                    **	@Validacion para trabajar en el formato jpeg 
                    */

                    if ($_FILES["nuevaFoto"]["type"] =="image/jpeg") {
                        # code...
                        $ruta = "views/img/perfil/perfil".$random.".jpg";
    
                        /*
                        **	@Creamos la imagen que del tamaño que queremos 
                        */
    
                        $origen = imagecreatefromjpeg($imagen);
                        $destino = imagecrop($origen,["x" => 0,"y"=>0,"width"=>200, "height"=>200]);
    
                        imagejpeg($destino,$ruta);
                    }
                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        $ruta = "views/img/perfil/perfil".$random.".png";

                        /*
                        **	@Creamos la imagen que del tamaño que queremos 
                        */
                        $origen = imagecreatefrompng($imagen);
                        $destino = imagecrop($origen,["x" => 0, "y" => 0, "width" => 200, "height" => 200]);
                        imagepng($destino,$ruta);
                    }    


                }

                if ($ruta == "")  {
                    $ruta ="views/img/photo.jpg";
                 }

                $datos = array("nombre" => $_POST["nuevoNombre"],
                                "apellido"=> $_POST["nuevoApellido"],
                                "empresa" => $_POST["nuevoEmpresa"],
                                "email" => $_POST["nuevoCorreo"],
                                "telefono" => $_POST["nuevoNumero"],
                                "fecha_nacimiento" => $_POST["nuevoFechaNacimiento"],
                                "foto"=>$ruta);



                $respuesta = Model_person::crear_person_mds($datos,"contactos");

                if ($respuesta =="ok") {
                    
                    echo '<script>
                            swal({
                                type: "success",
                                title: "¡Nuevo Contacto Creado Con Exito!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            
                                }).then((result)=>{
                                
                                if(result.value){
                                
                                    window.location = "index.php"
                                
                                }
                            });
                        </script>';
                }



                
                
            }
            else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "¡El contacto no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                        }).then((result)=>{

                        if(result.value){
                        
                           windows.location= "index.php";

                        }
                    });
                </script>';
            }
        }
    }

    /*
    **	@Metodo para Mostrar todos los contactos 
    */  
    public function listar_person_ctr()
    {
       $respuesta = Model_person::listar_person_mds("contactos");


       foreach ($respuesta as $row => $item) {
           echo '<tr>
                    <td scope="row">'.($row + 1).'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["apellido"].'</td>
                    <td>'.$item["empresa"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>'.$item["telefono"].'</td>
                    <td>'.$item["fecha_nacimiento"].'</td>  
                    <td><img src="'.$item["foto"].'" alt="foto perfil" width="40px;"></td>
                    <td><div class="btn-group" role="group" aria-label="">
                        <button type="button" class="btn btn-primary btnEditarContacto" idContacto="'.$item["id"].'" data-toggle="modal" data-target="#modelEditarAgenda" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                        <button type="button" class="btn btn-warning btnBorrarContacto" idContacto="'.$item["id"].'" imagen="'.$item["foto"].'"><i class="fa fa-close" aria-hidden="true"></i> Borrar</button>
                    </div></td>
                </tr>';
       }

    }

    /*
    **	@Seleccionar los datos de un contacto  en espesifico 
    */
    public static function seleccionar_contacto_ctr($dato)
    {
        $datos = $dato;

        $respuesta = Model_person::seleccionar_contacto_mds($datos,"contactos");
        
        
        return $respuesta;
    }

    /*
    **	@Editar un Contacto 
    */
    public function editar_person_ctr()
    {
        if (!empty($_POST["editarNombre"])) {
            # code...

            if (preg_match('/^[a-zA-Z ]+$/',$_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z ]+$/',$_POST["editarApellido"]) &&
                preg_match('/^[a-zA-Z ]+$/',$_POST["editarEmpresa"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}+$/',$_POST["editarCorreo"]) &&
                preg_match('/^[()\-0-9 ]+$/',$_POST["editarNumero"])) {

                    $ruta = $_POST["foto_actual"];

                    

                    if (!empty($_FILES["editarFoto"]["tmp_name"])) {

                        /*
                        **	@Borramos la foto anterior 
                        */

                        if ($ruta != "views/img/photo.jpg" && $ruta != "") {
                           unlink($ruta);
                        }

                        /*
                        **	@asignamos la ruta donde colocaremos la imagen mas un numero aleatorio 
                        */  
    
                        $imagen = $_FILES["editarFoto"]["tmp_name"];
    
                        $random = mt_rand(100,999);
    
                        /*
                        **	@Validacion para trabajar en el formato jpeg 
                        */
    
                        if ($_FILES["editarFoto"]["type"] =="image/jpeg") {
                            # code...
                            $ruta = "views/img/perfil/perfil".$random.".jpg";
        
                            /*
                            **	@Creamos la imagen que del tamaño que queremos 
                            */
        
                            $origen = imagecreatefromjpeg($imagen);
                            $destino = imagecrop($origen,["x" => 0,"y"=>0,"width"=>200, "height"=>200]);
        
                            imagejpeg($destino,$ruta);
                        }
                        if ($_FILES["editarFoto"]["type"] == "image/png") {
    
                            $ruta = "views/img/perfil/perfil".$random.".png";
    
                            /*
                            **	@Creamos la imagen que del tamaño que queremos 
                            */
                            $origen = imagecreatefrompng($imagen);
                            $destino = imagecrop($origen,["x" => 0, "y" => 0, "width" => 200, "height" => 200]);
                            imagepng($destino,$ruta);
                        }    
    
    
                    }

                    if ($_POST["foto_actual"] == "") {
                        # code...
                        $ruta ="views/img/photo.jpg";
                    }

                    $fecha = $_POST["fecha_nacimiento_actual"];

                    if (!empty($_POST["editarFechaNacimiento"])) {
                       $fecha =$_POST["editarFechaNacimiento"];
                    }

                    $datos = array("nombre" => $_POST["editarNombre"],
                                "apellido"=> $_POST["editarApellido"],
                                "empresa" => $_POST["editarEmpresa"],
                                "email" => $_POST["editarCorreo"],
                                "telefono" => $_POST["editarNumero"],
                                "fecha_nacimiento" => $fecha,
                                "foto"=>$ruta,
                                "id" => $_POST["idContacto"]);


                    $respuesta = Model_person::editar_person_mds($datos,"contactos");

                    if ($respuesta =="ok") {
                    
                        echo '<script>
                                swal({
                                    type: "success",
                                    title: "¡ Contacto editado Con Exito!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                
                                    }).then((result)=>{
                                    
                                    if(result.value){
                                    
                                        window.location = "index.php"
                                    
                                    }
                                });
                            </script>';
                    }
    




                }
                else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "¡Los Campos no puede ir vacio o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                        }).then((result)=>{

                        if(result.value){
                        
                           windows.location= "index.php";

                        }
                    });
                </script>';
            }
        }
    }

    /*
    **	@Borrar un contacto mediande la variable GET 
    */
    public function eliminar_person_ctr()
    {
        if (!empty($_GET["idContacto"])) {
            
            $dato = $_GET["idContacto"];
            $ruta = $_GET["ruta"];

            if ($ruta != "views/img/photo.jpg" && $ruta != "") {
                unlink($ruta);
            }
            
            $respuesta = Model_person::eliminar_person_mds($dato,"contactos");


            if ($respuesta =="ok") {
                    
                echo '<script>
                        swal({
                            type: "success",
                            title: "¡ Contacto fue Borrado Con Exito!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        
                            }).then((result)=>{
                            
                            if(result.value){
                            
                                window.location = "index.php"
                            
                            }
                        });
                    </script>';
            }


            
        }
    }

}