<?php
  //Index
  session_start();
  session_destroy();

   require "../../Modelo/connect.php";
   if(!empty($_POST)){
      if(!empty($_POST['handle'])){
         $handle = $_POST["handle"];
         $nombre = $_POST["nombre"];
         $correo = $_POST["correo"];
         $contrasena = $_POST["contrasena"];
         $prefijo = strstr($correo, '@');

      $sql ="SELECT id_universidad FROM universidad WHERE correo_prefijo='$prefijo' ";
      $data = $db->query($sql);
      $idUniversidad;

      if(mysqli_num_rows($data)>0){
         while($object = mysqli_fetch_array($data)){
            $idUniversidad = $object;
         } 

         var_dump($idUniversidad[0]);

         $sql = "INSERT INTO usuario 
             (nombre, handle, email, password, id_universidad)
             VALUES 
             ('$nombre', '$handle', '$correo', '$contrasena', '$idUniversidad[0]')";
         if ($db->query($sql) === TRUE) {
           echo "<script> alert('Nuevo Usuario Creado Exitosamente')</script>";
         } else {
           echo "Error: " . $sql . "<br>" . $db->error;
         } 
         $db->close();
      }else{
         echo "<script>alert('El correo que se introdujo no pertenece a ninguna Universidad registrada');</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Pagina login y signup de UniTweet">
    <meta name="author" content="UNITEAM">

   <title>Login/Signin para UniTweet</title>

   <!-- Bootstrap core CSS -->

   <link href="../css/bootstrap.min.css" rel="stylesheet">
   <link href="../css/signin.css" rel="stylesheet">

   <link href="../css/animate.min.css" rel="stylesheet">

   <!-- Custom styling plus plugins -->
   <link href="../css/custom.css" rel="stylesheet">

   <!-- Bootstrap core CSS -->

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>

<body >

   <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
         <div id="container" class="container">
         <div id="login" class="animate form">
            <h1 class="login-block-h1" style="color:DarkBlue ;" >UniTweet</h1>
            <section class="login_content">
               <!-- FORM -->
               <form action="Controlador/login.php" method="POST" name="form">
                  <h1>Login</h1>
                  <div class="alert alert-danger" role="alert" id="mensaje" style="width:80%; margin-left:40px; display: none;"></div>
                  <div>
                    <input type="text" class="form-control" placeholder="Username" id="user" name="user" onchange="validateChar(this)"  required="" />
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" onchange="validateChar(this)" required="" />
                  </div>
                  <div>
                    <button type="button" class="btn btn-default submit" id="envia">Log in</button>
                    <a class="reset_pass" href="#">Lost your password?</a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="separator">

                     <p class="change_link">New to site?
                        <a href="#toregister" class="to_register"> Create Account </a>
                     </p>
                     <div class="clearfix"></div>
                     <br />
                  </div>
               </form>
          <!-- form -->
            </section>
         </div>
      </div>
         <div id="register" class="animate form">
            <h1 class="login-block-h1" style="color:DarkBlue ;" >UniTweet</h1>
            <section class="login_content">
               <!-- FORM para crear cuenta -->
               <form action="index.php" method="POST">
                  <h1>Crear Cuenta</h1>
                  <div>
                     <input type="text" class="form-control" placeholder="Usuario" name="handle" required />
                  </div>
                  <div>
                     <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre"  required />
                  </div>
                  <div>
                     <input type="email" class="form-control" placeholder="Correo" name="correo" required />
                  </div>
                  <div>
                     <input type="password" class="form-control" placeholder="Password"  name="contrasena" required />
                  </div>
                  <div>
                     <input type="submit" class="btn btn-default submit">
                  </div>
                  <div class="clearfix"></div>
                  <div class="separator">

                     <p class="change_link">Already a member ?
                        <a href="#tologin" class="to_register"> Log in </a>
                     </p>
                     <div class="clearfix"></div>
                     <br/>

                  </div>
               </form>
            <!-- form -->
            </section>
         </div>
      </div>
   </div>
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="../../Controlador/JS/loginOperaciones.js"></script>
  <script src="../../Controlador/JS/validarInput.js"></script>
</body>

</html>