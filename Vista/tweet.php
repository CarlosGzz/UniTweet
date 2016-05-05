<?php
	session_start();
	if(isset($_REQUEST)){
		$num = $_REQUEST['num']+1;
		require "../Modelo/connect.php";
		$data = $db->query("SELECT tweet.id_tweet, tweet.tags,tweet.post, tweet.link_image, tweet.fecha_tweet, tweet.handle, tweet.num_likes, usuario.nombre, usuario.profile_link, usuario.id_universidad FROM tweet LEFT JOIN usuario ON tweet.handle=usuario.handle WHERE usuario.id_universidad = '".$_SESSION['id_universidad']."'ORDER BY fecha_tweet");
		$tweet = array();
		while($object = mysqli_fetch_object($data)){
			$tweet[]=$object;
		}
		var_dump($tweet[0]);
	
?>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-xs-2">
			<img src="Vista/profilesuperadmin.jpg" alt="..." class="img-rounded img-responsive" size="auto">
		</div>
		<div class="col-sm-10">
			<p><b><?php echo $tweet[0]->nombre?></b> @<?php echo $tweet[0]->handle?></p>
			<p><?php echo $tweet[0]->post?> </p>
			<?php 
				if($tweet[0]->link_image!=" "){
					echo "<img src='".$tweet[0]->link_image."'";
				}else{
					echo "no image";
				}
			?>
			<p>
				<a href="#" class="btn btn" role="button">
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> · <?php echo $tweet[0]->num_likes?>
				</a>
				<!--SI EL POST ES TUYO PONER UN BOTON PARA BORRAR<a href="#" class="btn btn-default" role="button">borrar</a>-->
			</p>
		</div>
	</div>
</div>
<a href="Vista/tweet.html?num=<?php echo $num+1;?>">next page</a>
<?php
	}
?>