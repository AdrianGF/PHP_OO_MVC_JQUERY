<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/cart/model/DAOCart.php");
    @session_start();
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
                    $rdo = $daocart->select_price($_GET['idproject']);
    
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

            //User_info
            case 'user_info':
                $user = $_SESSION['user'];
                if(!$user){
                    echo json_encode("error");
                }else{
                    echo json_encode($user);
                }
                
    
            break;

            //add_info
            case 'add_info':  
            $a = $_GET['info'];
            $ss = explode(',',$a); 
            $count = count($ss);
            
            for($i = 0; $i < $count; $i=$i+6){
                try{
                        $infobuy = array(
                            "IDPRO" => $ss[$i],
                            "NAMEPRO" => $ss[$i+1],
                            "USER" => $ss[$i+2],
                            "OLD" => $ss[$i+3],
                            "NEW" => $ss[$i+4],
                            "TOTAL" => $ss[$i+5]
                        );
                        $daocart = new DAOCart();
                        $rdo = $daocart->add_info($infobuy["IDPRO"], $infobuy["NAMEPRO"], $infobuy["USER"], $infobuy["OLD"], $infobuy["NEW"], $infobuy["TOTAL"]);
                    
                    

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
            }
            break;

        default:
            include("view/inc/error404.php");
        break;
    }
