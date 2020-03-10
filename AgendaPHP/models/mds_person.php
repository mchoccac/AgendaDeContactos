<?php


require_once "conexion.php";


class Model_person {

    /*
    **	@Metodo para Guardar un contacto en la BD 
    */

    public static function crear_person_mds($datos,$tabla)
    {
        try{

            $peticion = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, empresa, email, telefono, fecha_nacimiento, foto) 
            VALUES (:nombre, :apellido, :empresa, :email, :telefono, :fecha_nacimiento, :foto)");
    
            $peticion -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $peticion -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $peticion -> bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
            $peticion -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $peticion -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $peticion -> bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $peticion -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

    
            if ($peticion -> execute()) {
                
                return "ok";
            }else {
                # code...
                return "error";
            }
            
        }catch(PDOException $e){

            return "error".$e->getMessage();
            
        }
        
        $peticion->close();
    }

    /*
    **	@Listar todos los contactos 
    */
    public static function listar_person_mds($tabla)
    {   
        try{
            
            $peticion  = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
            $peticion->execute();
    
            return $peticion->fetchAll();

        }catch(PDOException $e){
            
            return $e->getMessage();
        }

        $peticion->close();


    }

    /*
    **	@Listar solo un contacto en especifico 
    */  
    public static function seleccionar_contacto_mds($datos,$tabla)
    {

        try{

            $peticion = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
    
            $peticion -> bindParam(":id",$datos,PDO::PARAM_INT);

            $peticion -> execute();

            return $peticion -> fetch();

        }catch(PDOException $e){

            return $e->getMessage();
            
        }

        $peticion->close();

    
    }

    /*
    **	@Editar contacto en la BD 
    */
    public static function editar_person_mds($datos,$tabla)
    {
        try{
            $peticion = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, empresa = :empresa, email = :email, telefono = :telefono, 
                                                        fecha_nacimiento = :fecha_nacimiento, foto = :foto WHERE id = :id");

            $peticion->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $peticion->bindParam(":apellido", $datos["apellido"],PDO::PARAM_STR);
            $peticion->bindParam(":empresa", $datos["empresa"],PDO::PARAM_STR);
            $peticion->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $peticion->bindParam(":telefono", $datos["telefono"],PDO::PARAM_STR);
            $peticion->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"],PDO::PARAM_STR);
            $peticion->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);
            $peticion->bindParam(":id", $datos["id"],PDO::PARAM_INT);

                if ($peticion -> execute()) {
                
                    return "ok";
                }
                else{
                    return "error";
                }

            }catch(PDOException $e){
                return $e->getMessage();
            }

            $peticion -> close();
    }

    /*
    **	@Eliminar un contacto de BD 
    */
    public static function eliminar_person_mds($dato,$tabla)
    {
        try{

            $peticion = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id ");
    
            $peticion->bindParam(":id",$dato,PDO::PARAM_INT);

            if ($peticion -> execute()) {
                return "ok";
            }
        }catch(PDOException $e){

            $e->getMessage();
        }

        $peticion->close();

        
    }
}