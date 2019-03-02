<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/connect.php");
	class DAOLogin{
        
        //Register
        function user_register($user, $mail, $pass){
            $avatar= "http://i.pravatar.cc/150?u=$mail"; 
			$sql = "INSERT INTO users (user, email , `password`, avatar, `type`) VALUES ( '$user', '$mail', '$pass', '$avatar', 1)";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Usuario/Email Unico
        function UQ_user($rdo, $email){
            $user = $rdo['user'];
            $sql = "SELECT * FROM users WHERE user LIKE '$user' OR email LIKE '$email'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Avatar
        function user_avatar($user, $avatar){
            $sql = "SELECT avatar FROM users WHERE user LIKE '$user' OR avatar LIKE '$avatar'";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
        }

        //Login
        function user_login($user){
			$sql = "SELECT * FROM users WHERE user LIKE '$user'";
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
        }
		
	}