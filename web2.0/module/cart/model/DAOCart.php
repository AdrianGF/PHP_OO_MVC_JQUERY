<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOCart{
        
        //select_project
        function select_project( $idproject ){
            $sql = "SELECT idproject FROM projects WHERE idproject = '$idproject'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }

        //select_ProPrice
        function select_price( $idproject ){
            $sql = "SELECT ProPrice, ProName, ProDonate, Curr, idproject FROM projects WHERE idproject = '$idproject'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }

        //add_info
        function add_info( $idproject, $proname , $user, $old, $new, $total ){
            $sql = "INSERT INTO shop( idproject, proName, user, oldD, newD, `date`, total) VALUES( $idproject , '$proname' , '$user', $old, $new, now(), $total);";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
		
	}