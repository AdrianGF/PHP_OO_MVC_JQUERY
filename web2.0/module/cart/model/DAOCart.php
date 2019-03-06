<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOCart{
        
        //select_project
        function select_project( $idproject ){
            $sql = "SELECT ProName FROM projects WHERE idproject = '$idproject'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }

        //select_ProPrice
        function select_price( $ProName ){
            $sql = "SELECT ProPrice, ProName FROM projects WHERE ProName = '$ProName'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }
		
	}