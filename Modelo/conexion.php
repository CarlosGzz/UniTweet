<?php

	class conexion{

		private $conexion ;
		private $server = "us-cdbr-iron-east-03.cleardb.net";
		private $username = "bd6ae5abdbbdd1";
		private $password = "3fc8f834";
		private $dbname = "heroku_9591bc77f0cc5ca";
		private $user;
		private $pass;



		public function __construct(){
			// Create connection
			$this->conexion = new mysqli($this->server, $this->username, $this->password, $this->dbname );
			// Check connection
			if ($this->conexion->connect_error) {
				die("Connección fallida: Lo sentimos estamos teniendo problemas".$this->conexion->connect_error);
			}
		}

		public function cerrar(){
			
			$this->conexion->close();

		}

		public function login($user, $pass){
			
			$this->user = $user;
			$this->pass = $pass;

			$query = "SELECT handle, nombre, id_universidad, biografia, email , profile_link
					  FROM usuario 
					  WHERE handle= '".$this->user."' and password='".$this->pass."' ";

			
			$consulta = $this->conexion->query($query);
			if($row = mysqli_fetch_array($consulta)){
					session_start(); 

					$_SESSION['validacion'] = 1 ; 
					$_SESSION['handle']= $row['handle'];
					$_SESSION['nom']= $row['nombre'];
					$_SESSION['correo']= $row['email'];
					$_SESSION['id_universidad']= $row['id_universidad'];
					$_SESSION['biografia']= $row['biografia'];
					$_SESSION['profile_link']= $row['profile_link'];

					echo "../../";
			} else {

				session_start();
				$_SESSION['validacion']=0;
				echo "1";
			}
		}
	}
?>