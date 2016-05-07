<?php
	session_start();
	if(isset($_REQUEST)){
		$offset = $_REQUEST['num'];
		$limit = $_REQUEST['num']+10;
		require "../Modelo/connect.php";
		$data = $db->query("SELECT tweet.id_tweet, tweet.tags,tweet.post, tweet.link_image, tweet.fecha_tweet, tweet.handle, tweet.num_likes, usuario.nombre, usuario.profile_link, usuario.id_universidad FROM tweet LEFT JOIN usuario ON tweet.handle=usuario.handle WHERE usuario.id_universidad ='".$_SESSION['id_universidad']."' ORDER BY fecha_tweet DESC LIMIT $limit OFFSET $offset");
		if(mysqli_num_rows($data)>0){
			while($object = mysqli_fetch_object($data)){
				$tweets[]=$object;
			}
			//var_dump($tweets);
			if($tweets == null){
				echo '<a href="Vista/tweet.html?num=0">next page</a>';

			}else{
				$string="";
				foreach ($tweets as $tweet) {
					
					$string.='<div class="panel panel-default">';
					$string.='<div class="panel-body" data-toggle="collapse" href="#collapse1">';
					$string.='<div class="col-xs-2">';
					if($tweet->profile_link =="" || empty($tweet->profile_link) || $tweet->profile_link == "default.png"){
						if($tweet->profile_link =="" || empty($tweet->profile_link) ){
							$string.='<img src="Vista/IMG/ProfilePhoto/default.png" alt="ProfileOf'.$tweet->nombre.'" class="img-rounded img-responsive" size="auto">';
						}else{	
							$string.='<img src="Vista/IMG/ProfilePhoto/'.$tweet->profile_link.'" alt="ProfileOf'.$tweet->nombre.'" class="img-rounded img-responsive" size="auto">';
						}
					}else{
						$string.='<img src="Vista/IMG/ProfilePhoto/'.$tweet->profile_link.'.jpg" alt="ProfileOf'.$tweet->nombre.'" class="img-rounded img-responsive" size="auto">';
					}
					$string.='</div>';
					$string.='<div class="col-sm-10">';
					$string.='<p><b>'.$tweet->nombre.'</b> @'.$tweet->handle.'</p>';
					$string.='<p>'.$tweet->post.'</p>';
					if($tweet->link_image!=" "){
						$string.= '<div data-toggle="modal" data-target="#myModal'.$tweet->id_tweet.'">
										<div style="height:300px; width:300px">
		  									<img src="Vista/IMG/'.$tweet->link_image.'"" style="height:100%; width:100%">
		  								</div>
								   </div>';
					}
					$string.='<a href="#" class="btn btn" role="button">';
					$string.='<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> · '.$tweet->num_likes;
					$string.='</a>';
					$string.='</p>';
					$string.='</div>';
					$string.='</div>';
					$string.='</div>';
					if($tweet->link_image!=" "){
						$string.='<!-- Tweet Modal -->
								    <div class="modal fade" id="myModal'.$tweet->id_tweet.'" role="dialog">
								        <div class="modal-dialog">
								        
								            <!-- Modal content-->
								            <div class="modal-content">
								                <div class="modal-header">
								                    <button type="button" class="close" data-dismiss="modal">&times;</button>
								                </div>
								                <div class="modal-body">
								                    <img src="Vista/IMG/'.$tweet->link_image.'"" style="height:100%; width:100%">
								                </div>
								            </div>
								            <!-- /Modal content-->
								        </div>
								    </div>
								    <!-- /Tweet Modal -->';
					}
				}
				$string.='<a href="Vista/tweet.php?num='.$limit.'">next page</a>';
				echo $string;
			}
		}

	}
	
?>


