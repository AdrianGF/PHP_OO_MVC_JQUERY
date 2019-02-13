<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOShop{

        //busqueda completa
        function select_find($type, $ubica, $name){
            $sql = "SELECT * FROM projects WHERE ProType = '$type' AND Ubica = '$ubica' AND ProName LIKE '$name%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //entrada menu shop
        function select_all(){
            $sql = "SELECT * FROM projects LIMIT 12";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //busqueda por name
        function select_ProName($name){
            $sql = "SELECT * FROM projects WHERE ProName LIKE '$name%'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //busqeuda por type
        function select_ProType($type){
            $sql = "SELECT * FROM projects WHERE ProType LIKE '$type'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //details
        function select_details($id){
            $sql = "SELECT * FROM projects WHERE idproject LIKE '$id'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

	}