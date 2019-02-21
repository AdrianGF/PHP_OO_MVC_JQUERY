<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/login/model/DAOLogin.php");
    include($path . "module/login/model/validate_login.php");

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
                    $daologin = new DAOLogin();
                    $rdo = $daologin->user_register($_POST['user'], $_POST['email'], $_POST['password']);
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

        //Default
        default:
            include("view/inc/error404.php");
        break;
        
    }