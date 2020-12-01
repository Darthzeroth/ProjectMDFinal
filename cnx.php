<?php

  $SERVER_servidor = "localhost";
  $SERVER_usuario = "root";
  $SERVER_contraseña = "";
  $SERVER_base_datos = "proymd"; 
  
  $cnx = mysqli_connect($SERVER_servidor,$SERVER_usuario, $SERVER_contraseña,$SERVER_base_datos) or die ("No se puede conectar al servidor");

?>