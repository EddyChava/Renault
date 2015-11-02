<?php 
	class DatabaseConectorStat{
		static $user="pruebas";
		static $password="admin";
		static $dbname="renault";
		static $port="5432";
		static $host="localhost";
		static $conexion;

		public function __construct(){
			
		}

		public function closeConexion(){
			pg_close(self::$conexion);
		}

		public function closeConexionDef($conect){
			pg_close($conect);
		}

		public function openConexion(){
			$cadenaConexion = "host=".self::$host." port=".self::$port." dbname=".self::$dbname." user=".self::$user." password=".self::$password."";
			return pg_connect($cadenaConexion) ;
		}	


		public function executeQuery($query){
			return pg_query(self::$conexion , $query);
		}


		public function executeQueryDefine($query , $conect){
			return pg_query($conect, $query);
		}	
	}

?>