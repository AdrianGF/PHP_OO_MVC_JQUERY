<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/cart/model/DAOCart.php");
    if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
	}
    
        $error = array();
        switch($_GET['op']){
            
        //view
        case 'view':
            include("module/cart/view/view.html");
        break;

        //Project_shop
        case 'project_shop':
            try{
                $daocart = new DAOCart();
                $rdo = $daocart->select_project($_GET['idproject']);

            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                echo json_encode($rdo);
            }

            break;


            //Project_shop
            case 'project_price':
                try{
                    $daocart = new DAOCart();
                    $rdo = $daocart->select_price($_GET['ProName']);
    
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    echo json_encode($rdo);
                }
    
            break;

        default:
            include("view/inc/error404.php");
        break;
    }
