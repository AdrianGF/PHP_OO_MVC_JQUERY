<?php
	class connect{
		public static function con(){
			$host = '127.0.0.1';  
    		$user = "root";                     
    		$pass = "";                             
    		$db = "bdproject";                      
    		$port = 3306;                           
			
			
			$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			//print_r($conexion);
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}