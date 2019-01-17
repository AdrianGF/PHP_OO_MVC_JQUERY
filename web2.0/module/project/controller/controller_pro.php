<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "module/project/model/DAOProject.php");

    $error = array();
    switch($_GET['op']){
        case 'list':
            try{

                $daoproject = new DAOProject();
            	$rdo = $daoproject->select_all_projects();


            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/project/view/ProList.php");
    		}
            break;


            case 'read_modal':
            //echo $_GET["modal"]; 
            //exit;
            
            try{
                $daoproject = new DAOProject();
                $rdo = $daoproject->select_project($_GET['modal']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $idproject=get_object_vars($rdo);
                echo json_encode($idproject);
                exit;
            }
            break;


            case 'read':
            try{
                $daoproject = new DAOProject();
                $rdo = $daoproject->select_project($_GET['id']);
                $project=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                include("module/project/view/ProRead.php");
            }
            break;

        case 'delete':
            if (isset($_POST['delete'])){
                try{
                    $daoproject = new DAOProject();
                    $rdo = $daoproject->delete_project($_GET['id']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
                    $callback = 'index.php?page=controller_pro&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }
            
            include("module/project/view/ProDelete.php");
            break;
     

            


        case 'deleteAll':
            if (isset($_POST['deleteAll'])){
                try{
                    $daoproject = new DAOProject();
                    $rdo = $daoproject->delete_all_project();
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("Borrado en la base de datos correctamente")</script>';
                    $callback = 'index.php?page=controller_pro&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }
            
            include("module/project/view/ProDeleteAll.php");
            break;






        case 'create':
            include("module/project/model/validate.php");

            if($_POST){
                $resultado=validate_project();
                if ($resultado['resultado']){
                    $_SESSION['resultado']=$_POST;
                    try{
                        $daoproject = new DAOProject();
                        $rdo = $daoproject->new_project($_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=404';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
                    if($rdo){
                        //echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
                        $callback = 'index.php?page=controller_pro&op=list';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }else{
                        $callback = 'index.php?page=404';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }
                }else{
                    $error = $resultado['error'];
                }
            }
            include("module/project/view/ProCreate.php");
            break;
       

        case 'update':
            include("module/project/model/validate.php");
            
            
            if($_POST){
                $resultado=validate_project();
                if ($resultado['resultado']){
                    $_SESSION['resultado']=$_POST;
                    try{
                        $daoproject = new DAOProject();
                        $rdo = $daoproject->update_project($_GET['id'], $_POST);
                    }catch (Exception $e){
                        $callback = 'index.php?page=503';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }
                    
                    if($rdo){
                        echo '<script language="javascript">alert("Actualizado en la base de datos correctamente")</script>';
                        $callback = 'index.php?page=controller_pro&op=ProList';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }else{
                        $callback = 'index.php?page=503';
                        die('<script>window.location.href="'.$callback .'";</script>');
                    }
                }else{
                    $error = $resultado['error'];
                }
            }
            
            try{
                $daoproject = new DAOProject();
                $rdo = $daoproject->select_project($_GET['id']);
                $project=get_object_vars($rdo);
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                include("module/project/view/ProUpdate.php");
            }
            break;

        default:
            include("view/inc/error404.php");
        
    }