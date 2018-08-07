<?php
	class Conexion{
		private $usuario="root";
		private $db="mydb";
		private $contrasena="mysql";
		private $server="localhost";
		private $con;

		public function __construct(){
			$this->establecerConexion();			
		}

		public function establecerConexion(){
			$this->con = mysqli_connect($this->server, $this->usuario, $this->contrasena, $db);
			$this->con->autocommit(FALSE);
			if (!$link) {
			    echo "Error: No se pudo conectar." . PHP_EOL;
			    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
		}

		public function cerrarConexion(){
			mysqli_close($this->con);
		}
		public function commit(){
			
		}
		public function rollback(){
			
		}
		public function ejecutarInstruccion($sql){
			$res = $this->con->query($sql);
			return $res;
		}

		public function obtenerFila($resultado){
			return oci_fetch_array($resultado);
		}

		public function obtenerArregloAsociativo($resultado){
			return oci_fetch_assoc($resultado);
		}

		public function cantidadRegistros($resultado){
			return oci_num_rows($resultado);
		}

		public function liberarResultado($resultado){
			mysqli_free_result($resultado);
		}		
		public function getCon(){
			return $this->con;
		}
	}
?>