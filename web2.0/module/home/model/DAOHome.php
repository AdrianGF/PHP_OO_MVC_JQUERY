<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOHome{
        
        function select_demo_projects(){
			$sql = "SELECT ProName, ProDesc ,ProPrice, Curr, Mail FROM projects ORDER BY ProPrice DESC LIMIT 4";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
    
		
	}