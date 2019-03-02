<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/shop/model/DAOShop.php");
    if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
	}

    $error = array();
    switch($_GET['op']){

        //list_shop
        case 'list_shop':
        include("module/shop/view/list_shop.php");
        break;

        //list_details
        case 'list_details':
        include("module/shop/view/details_shop.php");
        break;

        //entrada menu
        case 'all_pro':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_all();
        }catch (Exception $e){
            echo json_encode("error1");
        }
        
        if(!$rdo){
            echo json_encode("error2");
        }else{
            $shop = array();
            foreach ($rdo as $row){
                array_push($shop, $row);
            }
            echo json_encode($shop);
            exit;
        }
        break;
        
        //busqueda completa
        case 'data_shop':
            try{
                $daoshop = new DAOShop();
                $rdo = $daoshop->select_find($_GET['ProType'],$_GET['Ubica'],$_GET['ProName']);
            }catch (Exception $e){
                echo json_encode("error1");
            }
            
            if(!$rdo){
                echo json_encode("error2");
            }else{
                $shop = array();
                foreach ($rdo as $row){
                    array_push($shop, $row);
                }
                echo json_encode($shop);
                exit;
            }
        break;

        //busqueda por name
        case 'data_ProName':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_ProName($_GET['ProName']);
        }catch (Exception $e){
            echo json_encode("error1");
        }
        
        if(!$rdo){
            echo json_encode("error2");
        }else{
            $shop = array();
            foreach ($rdo as $row){
                array_push($shop, $row);
            }
            echo json_encode($shop);
            exit;
        }
     break;

     //busqueda por type
     case 'data_ProType':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_ProType($_GET['ProType']);
        }catch (Exception $e){
            echo json_encode("error1");
        }
        
        if(!$rdo){
            echo json_encode("error2");
        }else{
            $shop = array();
            foreach ($rdo as $row){
                array_push($shop, $row);
            }
            echo json_encode($shop);
            exit;
        }
    break;

    //details
    case 'details':
        try{
            $daoshop = new DAOShop();
            $rdo = $daoshop->select_details($_GET['id']);
        }catch (Exception $e){
            echo json_encode("error1");
        }
        
        if(!$rdo){
            echo json_encode("error2");
        }else{
            $shop = array();
            foreach ($rdo as $row){
                array_push($shop, $row);
            }
            echo json_encode($shop);
            exit;
        }
    break;


        default:
            include("view/inc/error404.php");
        break;
        
    }