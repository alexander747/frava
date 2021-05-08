<?php
require_once "modelos/persona.php";


class PersonaController{
     
    public function index(){
         
        //Creamos el objeto usuario
        $paginaActual = 1;
        $registros = 5;


        if( isset($_GET['pagina']) && isset($_GET['registros']) ){
            $paginaActual = $_GET['pagina'];
            $registros = $_GET['registros'];
        }

        $persona=new Persona();
         
        //Conseguimos todos los usuarios
        $allusers=$persona->getPersonas($paginaActual, $registros);

        $cad='';
        foreach ($allusers as $llave => $valor) {
            $nombre = $allusers[$llave]["per_nombre"];
            $apellidos = $allusers[$llave]["per_apellidos"];
            $fecha = $allusers[$llave]["per_fecha_nacimiento"];
            $sexo = $allusers[$llave]["per_sexo"];
            $estatura = $allusers[$llave]["per_estatura"];
            $colombiano = $allusers[$llave]["per_colombiano"];
            $id = $allusers[$llave]["per_id"];


            $cad.="<tr onClick='cargarInformacion($id);'>
                    <td>$nombre</th>
                    <td>$apellidos</th>
                    <td>$fecha</th>
                    <td>$sexo</th>
                    <td>$estatura</th>
                    <td>$colombiano</th>
            </tr>";
            
        }
        
        echo $cad;
    }
     
    public function crear(){
        if( isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["sexo"]) && isset($_POST["estatura"]) ){
             
            //Creamos un usuario
            $persona=new Persona();
            $persona->setNombre($_POST["nombre"]);
            $persona->setApellidos($_POST["apellidos"]);
            $persona->setFechaNacimiento($_POST["fecha_nacimiento"]);
            $persona->setSexo($_POST["sexo"]);
            $persona->setEstatura($_POST["estatura"]);
            
            if( isset($_POST["colombiano"]) ){
                $persona->setColombiano("Si");
            }else{
                $persona->setColombiano("No");
            }

            $persona->guardar();
            echo '<script>
               window.location = "index.php";
            </script>';
        }
        // $this->redirect("Usuarios", "index");
    }

    public function eliminarPersona(){
        if(isset($_GET["idUsuario"])){
            $persona=new Persona();
            $persona->setId($_GET["idUsuario"]);
            $respuesta = $persona->borrarPersona();
            echo '<script>
                window.location = "index.php";
            </script>';
        }
    }
     

 
}
?>