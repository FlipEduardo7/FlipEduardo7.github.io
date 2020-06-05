<?php 

//se crean tres variables que serán igual al campo de "nombre", "email" y al area de texto "mensaje" en el html
$nombre = $_POST["nombre"]; 
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

//se crean estas dos variables de tipo cadena que guardarán el correo destino y el nombre de la persona
$para = "feelgym@outlook.es"; 
$asunto = "Nuevo mensaje de $nombre";

//esta variable guardara lo que es el nombre, el correo de la persona y el mensaje
$mensaje = "
    Nombre del remitente: ".$nombre."
    Correo: ".$email."
    Mensaje: ".$mensaje."
";
//con el metodo mail se especifica el correo destino, el nombre de la persona, y el mensaje
mail($para,$asunto,utf8_decode($mensaje));
//despues de hacer la accion de enviar la pagina se recargará
header("location:contacto.html");
?>