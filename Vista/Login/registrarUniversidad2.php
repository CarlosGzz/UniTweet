<?php
  //Index
  session_start();
  session_destroy();

   require "../../Modelo/connect.php";

   $sql = "INSERT INTO universidad 
          (direccion, nombre_universidad, id_universidad, correo_prefijo)
          VALUES 
          ('Avenida Ignacio Morones Prieto 4500 Pte., Jesús M. Garza, 66238 San Pedro Garza García, N.L.', 'Universidad de Monterrey', '', '@udem.edu' )";

      if ($db->query($sql) === TRUE) {
        echo "<script> alert('Nuevo Usuario Creado Exitosamente')</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      } 
      $db->close();
    
?>