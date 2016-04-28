<?php
  //Index
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pagina de login para Treats Enterprise Dashboard">
  <meta name="author" content="Carlos Gonzalez/Chief IronMan Oficcer">
  <link rel="icon" href="Vista/IMG/diamond.ico">

  <title>Login/Signin For Treats Enterprise Dashboard</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body >

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <h1 class="login-block-h1" >Treats Enterprise Dashboard</h1>
        <section class="login_content">
          <form action="Controlador/login.php" method="POST" name="form">
            <h1 style="color:white;">Login</h1>
            <div class="alert alert-danger" role="alert" id="mensaje" style="display: none;"></div>
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

              <p  style="color:white;" class="change_link">New to site?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p>
              <div class="clearfix"></div>
              <br />
              
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <h1 class="login-block-h1" >Treats Enterprise Dashboard</h1>
        <section class="login_content">
          <form>
            <h1 style="color:white;">Crear Cuenta</h1>
            <div>
              <input type="text" class="form-control" placeholder="Usuario" required="" />
            </div>
            <div>
              <input type="text" class="form-control" placeholder="Nombre Completo" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Coreo" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />

            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

  <script src="Controlador/JS/loginOperations.js"></script>
  <script src="Controlador/JS/validarInput.js"></script>
</body>

</html>