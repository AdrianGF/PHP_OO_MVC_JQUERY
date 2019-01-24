<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/home/model/DAOHome.php");

    $error = array();
    switch($_GET['op']){
        case 'home':
            try{
                $daohome = new DAOHome();
            	$rdo = $daohome->select_demo_projects();

            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/home/view/home.php");
    		}
            break;

        default:
            include("view/inc/error404.php");
        break;
        
    }