<?php
	class Conexion{
		private $usuario="root";
		private $db="mydb";
		private $contrasena="";
		private $server="localhost";
		private $con;

		public function __construct(){
			$this->establecerConexion();			
		}
		public function establecerConexion(){
			$this->con = mysqli_connect($this->server, $this->usuario, $this->contrasena, $this->db);
			if ($con->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
		}
		public function ejecutarConsulta($sql){//"CALL PROCEDIMIENTO(PARAMETROS)" para SPs
			$mysqli = $this->con;
			$res = $mysqli->query($sql);
			return $res;
		}
		public function cerrarConexion(){
			mysqli_close($this->con);
		}
	}
?>