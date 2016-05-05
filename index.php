<?php

    session_start();

    function tweet(){
        if(isset($_POST)){
            if ($_POST['text']) {
                require "Modelo/connect.php";
                $post = $_POST['text'];
                $tags = $_POST['text'];
                $handle = $_SESSION['handle'];
                if(isset($_POST['image'])){
                    $link_image = $_POST['image'];
                }else{
                    $link_image=" ";
                }
                date_default_timezone_set("America/Monterrey");
                $fecha = date("Y-m-d H:i:s");
                $sql = "INSERT INTO tweet 
                      (tags, post, link_image, fecha_tweet, handle, num_likes)
                      VALUES 
                      ('$tags', '$post', '$link_image', '$fecha', '$handle', '0')";
                if ($db->query($sql) === TRUE) {
                    echo "<script> alert('tweet post correcto')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                } 
                $db->close();
            }
        }
    }

    if(isset($_SESSION)){
        if($_SESSION["validacion"] == 1){
            if(isset($_POST)){
                if (isset($_POST['text'])) {
                    tweet();
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
    <meta name="description" content="Pagina Inicial de UniTweet">
    <meta name="author" content="UNITEAM">

    <title>UNITweet</title>

    <!-- Bootstrap core CSS -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UniTweet</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a class ="dropdown-toggle" href="#" data-toggle="dropdown">Perfil</a></li>
            <li>
                <a href="#" type="button" data-toggle="dropdown">Perfil</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="Vista/Login">Logout</a></li>
                </ul>
            </li>
          </ul>

            <button type="button" class="btn btn-danger navbar-right  bajar" data-toggle="modal" data-target="#myModal">Tweet</button>

          <style>
          .bajar{
            margin-top: 9px;
          }
          </style>
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!--CONTENT-->
    <div class="container">
        <div class ="row">
            <!--Perfil-->
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-header">
                         <img src="Vista/IMG/ProfilePhoto/<?php if($_SESSION['profile_link']=="" || $_SESSION['profile_link']==null){echo "default.png";}else{echo $_SESSION['profile_link'].".jpg";}?>" alt="..." class=" img-responsive" size="auto">
                    </div>
                    <div class="panel-body">
                        <h4><?php echo $_SESSION['nom']?> </h4>
                        <p>@<?php echo $_SESSION['handle']?></p>
                    </div>
                </div>  
            </div>
            <!--/Perfil-->

            <!--Tweets-->
            <div class="col-md-6"> 
                <div class="scroll">
                    <a href="Vista/tweet.php?num=0">next page</a>
                </div>  
            </div>
            <!--/Tweets-->

            <!--Hashtags-->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>#HASHTAGSPHERE</h3>
                        <p>#miercolitos</p>
                        <p>#RoomieSearch</p>
                        <p>#CampusLife</p>
                        <p>#llegandoTarde</p>
                        <p>#estacionamientoUDEM</p>

                    </div>
                </div> 
            </div>
            <!--/Hashtags-->
        </div>
    </div>
    <!--/CONTENT-->


    <!-- Tweet Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Say what you think!</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                        <br>
                        <button type="button" class="btn btn-default btn-file">
                            <span  class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                            <input type="file" name="photo" id="photo">
                        </button>
                        <button type="submit" id="tweet" class="btn btn-default" >Tweet</button>
                    </form>
                </div>
            </div>
            <!-- /Modal content-->
        </div>
    </div>
    <!-- /Tweet Modal -->


</body>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jscroll JavaScript -->
    <script src="Controlador/JScroll/jquery.jscroll.min.js" /></script>
    <script src="Controlador/JScroll/jquery.jscroll.js" /></script>
    <script type="text/javascript">
      $(document).ready(function() { 
        $('.scroll').jscroll({
          autoTrigger: true,
          padding: 1
        })
      });
    </script>
    <!-- /Jscroll JavaScript -->
</html>
<?php
            }else{
                header("Location: Vista/Login");
            }
    }else{
        header("Location: Vista/Login");
    }
?>
