<?php
	session_start();
	if(isset($_REQUEST)){
		$num = $_REQUEST['num']+1;
		require "../Modelo/connect.php";
		$data = $db->query("SELECT tweet.id_tweet, tweet.tags,tweet.post, tweet.link_image, tweet.fecha_tweet, tweet.handle, tweet.num_likes, usuario.nombre, usuario.profile_link, usuario.id_universidad FROM tweet LEFT JOIN usuario ON tweet.handle=usuario.handle WHERE usuario.id_universidad = '".$_SESSION['id_universidad']."'ORDER BY fecha_tweet");
		while($object = mysqli_fetch_object($data)){
			$tweets[]=$object;
		}
		var_dump($tweets);
		//create table
		$string;
		foreach ($tweets as $tweet) {
			$string.='<div class="panel panel-default">';
			$string.='<div class="panel-body" data-toggle="collapse" href="#collapse1">';
			$string.='<div class="col-xs-2">';
			$string.='<img src="Vista/IMG/ProfilePhoto/'.$tweet->profile_link.'.jpg" alt="ProfileOf'.$tweet->nombre.'" class="img-rounded img-responsive" size="auto">';
			$string.='</div>';
			$string.='<div class="col-sm-10">';
			$string.='<p><b>'.$tweet->nombre.'</b> @'.$tweet->handle.'</p>';
			$string.='<p>'.$tweet->post.'</p>';
			if($tweet[0]->link_image!=" "){
				$string.= '<div id="collapse1" class="panel-collapse collapse">
								<div class="panel-footer" style="height:40px, width:40px">
  									<img src="Vista/IMG/'.$tweet->link_image.'"" style="height:100%, width:100%">
  								</div>
						   </div>';
			}
			$string.='<a href="#" class="btn btn" role="button">';
			$string.='<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> · '.$tweet->num_likes;
			$string.='</a>';
			$string.='</p>';
			$string.='</div>';
			$string.='</div>';
		}
		echo $string;

	}
	
?>

