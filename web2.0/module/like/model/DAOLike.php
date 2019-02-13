<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOLike{
        
        function select_like(){
			$sql = "SELECT ProName, Mail, ProType, Ubica FROM projects";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function add_like($idproject, $likes){
			$sql = "INSERT INTO likes VALUE ( $idproject , $likes )";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
    
		
	}