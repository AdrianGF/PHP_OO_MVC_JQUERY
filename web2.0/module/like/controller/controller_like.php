<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/like/model/DAOLike.php");

    
    switch($_GET['op']){

       case 'list':
            include("module/like/view/ListLike.php");
       break;

       case 'datatable':
       try{
           $daolike = new DAOLike();
           $rdo = $daolike->select_like();
       } catch(Exception $e){
           echo json_encode("error");
       }

       if(!$rdo){
           echo json_encode("error");
       }
       else{
           $rdolike = array();
           foreach ($rdo as $row) {
               array_push($rdolike, $row);
           }
           echo json_encode($rdolike);
       }
       break;
       
   default:
       include("view/inc/error404.php");
       break;
        
    }