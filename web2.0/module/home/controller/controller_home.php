<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/home/model/DAOHome.php");
    if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
	}
    
        $error = array();
        switch($_GET['op']){
            
        //listado Home
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

        //Drop de type
        case 'dropdown_type':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_all_type();
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $home = array();
                foreach ($rdo as $row){
                    array_push($home, $row);
                }
                echo json_encode($home);
                exit;
            }
        break;

        //Drop de Ubica
        case 'dropdown_city':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_all_city($_GET['ProType']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $home = array();
                foreach ($rdo as $row){
                    array_push($home, $row);
                }
                echo json_encode($home);
                exit;
            }
        break;

        //AutoC de name
        case 'list_name':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_all_name($_GET['checks']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                foreach ($rdo as $row) {
                    echo '<div>
                            <a class="suggest-element" data="'.$row['ProName'].'" id="aa_name'.$row['idproject'].'">'.utf8_encode($row['ProName']).'</a>
                        </div>';
                }
                exit;
            }
        break;

        //ALL
        case 'redi':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->filter($_GET['ProType'],$_GET['Ubica'],$_GET['ProName']);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                include("module/shop/view/list_shop.php");
            }
        break;

        //Busqueda solo por name
        case 'list_name_only':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_name_only($_GET['checks']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                foreach ($rdo as $row) {
                    echo '<div>
                            <a class="suggest-element" data="'.$row['ProName'].'" id="aa_name'.$row['idproject'].'">'.utf8_encode($row['ProName']).'</a>
                        </div>';
                }
                exit;
            }
        break;

        //Busqueda solo por type
        case 'list_type_only':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_type_only($_GET['checks']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                foreach ($rdo as $row) {
                    echo '<div>
                            <a class="suggest-element" data="'.$row['ProName'].'" id="aa_name'.$row['idproject'].'">'.utf8_encode($row['ProName']).'</a>
                        </div>';
                }
                exit;
            }
        break;

        //Busqueda por type y name
        case 'list_type_and_name':
            try{
                $daohome = new DAOHome();
                $rdo = $daohome->select_type_and_name($_GET['checks']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                foreach ($rdo as $row) {
                    echo '<div>
                            <a class="suggest-element" data="'.$row['ProName'].'" id="aa_name'.$row['idproject'].'">'.utf8_encode($row['ProName']).'</a>
                        </div>';
                }
                exit;
            }
        break;



        default:
            include("view/inc/error404.php");
        break;
    }
