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

        //Dupli
        function dupli( $idproject ){
            $sql = "INSERT INTO temp (idproject) VALUES ($idproject)";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Group_by
        function group_by(){
            $sql = "SELECT idproject, count(idproject) AS count FROM temp GROUP BY idproject HAVING count(idproject)";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Group_by->delete 
        function delete(){
            $sql = "DELETE FROM temp";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //add_info
        function add_info( $idproject, $proname , $user, $old, $new, $total ){
            if( ($new > 500) || ($new < 5) ){

            }else{
                $sql = "INSERT INTO shop( idproject, proName, user, oldD, newD, `date`, total) VALUES( $idproject , '$proname' , '$user', $old, $new, now(), $total);";
                $sql2 = "UPDATE projects SET ProDonate = $total WHERE idproject = $idproject;";
                $conexion = connect::con();
                $res = mysqli_query($conexion, $sql);
                mysqli_query($conexion, $sql2);
                connect::close($conexion);
            }
            return $res;
        }
		
	}