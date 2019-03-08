<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/login/model/DAOLogin.php");
    include($path . "module/login/model/validate_login.php");
    @session_start();

    $error = array();
    switch($_GET['op']){
        
        //view
        case 'view':
            include("module/login/view/login_register.html");
        break;

        //Register
        case 'register':
        $val = validate_register();
            if(($val['resultado']) && ($val['valido'] === true)){
                try {
                    $opciones = [
                        'cost' => 12,
                    ];
                    $pass= password_hash($_POST['password'], PASSWORD_BCRYPT, $opciones);
                    $daologin = new DAOLogin();
                    $rdo = $daologin->user_register($_POST['user'], $_POST['email'], $pass);
                } catch (Exception $e) {
                    echo "Error al registrarse";
                    exit();
                }
                if(!$rdo){
                    echo "Error al registrarse";
                    exit();
                }else{
                        echo 'ok';
                        exit();	
                }	
            }else{
                echo json_encode($val['error']['user']);
                exit();
            }
        break;

        //Login
        case 'login':
            try {
                $daologin = new DAOLogin();
                $rdo = $daologin->user_login($_POST['user']);
            } catch (Exception $e) {
                echo "error";
                exit();
            }
            if(!$rdo){
                echo "El usuario o la contraseña coinciden";
                exit();
            }else{
                $value = get_object_vars($rdo);
                if (password_verify($_POST['password'], $value['password'])) {
                    echo 'ok';
                    $_SESSION['type'] = $value['type'];
                    $_SESSION['user'] = $value['user'];
                    $_SESSION['avatar'] = $value['avatar'];
                    $_SESSION['email'] = $value['email'];
                    $_SESSION['time'] = time();
                    exit();
                }else {
                    echo "No coinciden los datos";
					exit();
                }
            }	
        break;

        //LogOut
        case 'logout':
        session_unset($_SESSION);
            if(session_destroy()) {
                $callback = 'index.php?page=controller_home&op=home';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
        break;

        //Avatar
        case 'avatar':
            if(isset($_SESSION['user'])){
                try {
                    $daologin = new DAOLogin();
                    $rdo = $daologin->user_avatar($_SESSION['user'], $_SESSION['avatar']);
                } catch (Exception $e) {
                    echo "Error 01";
                    exit();
                }
                if(!$rdo){
                    echo "Error 02";
                    exit();
                }else{
                    $data = array(
                    "avatar" => $_SESSION["avatar"],
                    "user" => $_SESSION["user"],
                    "email" => $_SESSION["email"]
                    );
                    echo json_encode($data);
                    exit();	
                }	
            }else{
                $callback = 'index.php?page=controller_home&op=home';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
        break;


         //TimeOut
        case 'timeout':
            if (!isset($_SESSION["time"])) {  
                echo "activo";
            } else {  
                if((time() - $_SESSION["time"]) >= 900) {  
                    echo "inactivo"; 
                    exit();
                }else{
                    echo "activo";
                    exit();
                }
            }
        break;

        //Regenerate
        case 'regenerate':
            if (!isset($_SESSION["time"])) {  
                echo "none";
            } else {  

                //session_start();

                //$id_sesion_antigua = session_id();
                    
                session_regenerate_id();
                
                    
                //$id_sesion_nueva = session_id();
                    
                //echo "Sesión Antigua: $id_sesion_antigua<br />";
                //echo "Sesión Nueva: $id_sesion_nueva<br />";
                exit();

            }
            
        break;

        //Default
        default:
            include("view/inc/error404.php");
        break;
        
    }