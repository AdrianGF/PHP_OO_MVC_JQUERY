<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOProject{
		function new_project($pro){
            //print_r($pro);
            $url='/view/img/';

            foreach ($pro[req] as $requirements) {
                $req=$req."$requirements:";
            }

            $sql = "INSERT INTO projects(ProName, ProType, ProDesc, Ubica, Mail, ProDateIni, ProPrice, Curr, req, ProImg )".
            " VALUES ('$pro[ProName]', '$pro[ProType]', '$pro[ProDesc]', '$pro[Ubica]',  '$pro[Mail]',  '$pro[ProDateIni]',  '$pro[ProPrice]',  '$pro[Curr]',  '$req', '$url$pro[ProImg]' )";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            //die;
			return $res;
        }

        function valida_ProName($ProName){
            $test = $ProName['ProName'];
            $sql = "SELECT * FROM projects WHERE ProName='$test'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        
        function select_all_projects(){
			$sql = "SELECT * FROM projects ORDER BY idproject DESC";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
        function select_project($idproject){
			$sql = "SELECT * FROM projects WHERE idproject='$idproject'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }
        
        function delete_project($idproject){
			$sql = "DELETE FROM projects WHERE idproject='$idproject'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        function delete_all_project(){
			$sql = "DELETE FROM projects";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
        
        function update_project($idproject, $pro){

            foreach ($pro[req] as $requirements) {
                $req=$req."$requirements:";
            }

            $sql = "UPDATE projects SET ProName='$pro[ProName]', ProType='$pro[ProType]', ProDesc='$pro[ProDesc]', Ubica='$pro[Ubica]', Mail='$pro[Mail]', ProDateIni='$pro[ProDateIni]', ProPrice='$pro[ProPrice]', Curr='$pro[Curr]', req='$req' WHERE idproject='$idproject'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
        }
		
	}