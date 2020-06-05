<?php 

require_once "conexion.php"; //se importa la conexion
//definir variables e inicializar con valores vacios
$username = $email ="";
$username_err = $email_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){//si el campo nombre esta vacio..
        $username_err = "Ingrese un nombre de usuario, por favor";//entonces se mandara un mensaje de error
    }else{//pero si no lo esta
        $sql="SELECT id_user FROM registros WHERE usuario = ?";// se guarda la sentencia sql

        if($stmt = mysqli_prepare($link,$sql) ){
            mysqli_stmt_bind_param($stmt,"s",$param_username);

            $param_username = trim($_POST["username"]);//tomara el dato que esta en el campo nombre de usuario

            if(mysqli_stmt_execute($stmt)){//se ejecuta la sentencia
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt)==1){//si el nombre de usuario ya esta en uso...
                    $username_err="Este nombre de usuario ya esta en uso";//entonces mandará este mensaje de error
                }else{
                    $username=trim($_POST["username"]);//sino entonces la sentencia se ejecutara correctamente
                }
            }else{//si no se ejecuto mandara este mensaje de erro
                echo "Algo salio mal, intentalo mas tarde";
            }
        }
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Ingrese un correo, por favor";
    }else{
        $sql="SELECT id_user FROM registros WHERE correo = ?";

        if($stmt = mysqli_prepare($link,$sql) ){
            mysqli_stmt_bind_param($stmt,"s",$param_email);

            $param_email = trim($_POST["email"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt)==1){
                    $email_err="Este correo ya ha sido registrado";
                }else{
                    $email=trim($_POST["email"]);
                }
            }else{
                echo "Algo salio mal, intentalo mas tarde";
            }
        }
    }

    //comprobando errores de entrada
    if(empty($username_err) && empty($email_err)){//evalua si los campos estan vacios
        $sql="INSERT INTO registros (usuario, correo) VALUES (?,?)";//se guarda la sentencia insert
        if($stmt = mysqli_prepare($link,$sql)){ //se envia la sentencia
            mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_email);

            //estableciendo parametros
            $param_username = $username;
            $param_email = $email;

            if( mysqli_stmt_execute($stmt)){//si se ejecuto correctamente
                header("location: reg.php"); //entonces se direccionara a la pagina reg.php
            }else{//sino...
                echo "Algo salio mal, intentelo más tarde";//enviara a este error.
            }
        }
    }
    mysqli_close($link);//se cierra la conexion
}
?>