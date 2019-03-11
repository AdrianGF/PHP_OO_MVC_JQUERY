<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOHome{
        
        //Home list pro
        function select_demo_projects(){
			$sql = "SELECT ROUND(((ProDonate * 100)/ProPrice),1)AS Percent, ProName, ProDesc ,ProPrice, Curr, Mail, idproject, ProDonate FROM projects ORDER BY ProDonate DESC LIMIT 4";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }


        //1.Filtro type
        function select_all_type(){
			$sql = "SELECT DISTINCT ProType FROM projects";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //2.Filtro ubica
        function select_all_city($type){
			$sql = "SELECT DISTINCT Ubica FROM projects WHERE ProType = '$type'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //3.Friltro name
        function select_all_name($checks){
            $tecla_pulsada = $_POST['aa_name'];
            $sql = "SELECT * FROM projects $checks AND ProName LIKE '" . $tecla_pulsada . "%' GROUP BY idproject";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //4.Filtro ALL
        function filter($type, $ubica, $name){
			$sql = "SELECT DISTINCT * FROM projects WHERE ProType = '$type' AND Ubica = '$ubica' AND ProName = '$name'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }
        
        //Busqueda solo por name
        function select_name_only($checks){
            $tecla_pulsada = $_POST['aa_name'];
            $sql = "SELECT * FROM projects $checks '" . $tecla_pulsada . "%' GROUP BY idproject";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
        //Busqueda solo por type
        function select_type_only($checks){
            $sql = "SELECT * FROM projects $checks GROUP BY idproject";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }


    
		
	}