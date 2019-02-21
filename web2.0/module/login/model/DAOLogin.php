<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOLogin{
        
        //Register
        function user_register($user, $mail, $pass){
			$sql = "INSERT INTO users (user, email , `password`, avatar, `type`) VALUES ( '$user', '$mail', '$pass', null, 1)";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Usuario Unico
        function UQ_user($rdo){
            $user = $rdo['user'];
            $sql = "SELECT * FROM users WHERE user LIKE '$user'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }
    
		
	}