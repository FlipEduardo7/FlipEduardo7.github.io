<?php

//se tablecen estas variables con el servidor, usuario, contraseña y el nombre de la base de datos
    define('server','localhost');
    define('user','root');
    define('pass','');
    define('name','feelgym');

    //aqui la variable "link" tomará la conexion con sus valores
    $link = mysqli_connect(server,user,pass,name);
    if($link===false){//si hubo algun fallo se mostrara el mensaje de error.
        die("ignorar mensaje".mysqli_connect_error());
    }

?>