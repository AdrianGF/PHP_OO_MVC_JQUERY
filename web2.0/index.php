<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/framework/FW_PHP_OO_MVC_JQUERY/web2.0/';
    include($path . "model/functions.php");
    
    if ((isset($_GET['page'])) && ($_GET['page']==="controller_pro")){
		include("view/inc/top_page_pro.php");
	}else{
        if ((isset($_GET['page'])) && ($_GET['page']==="controller_contact")){
            include("view/inc/top_page_contact.php");
        }else{
            include("view/inc/top_page.php");
        }
    }

    
    if ((isset($_GET['page'])) && ($_GET['page']==="controller_pro") || ($_GET['page']==="controller_like") || ($_GET['page']==="controller_contact")){
		include("view/inc/banner2.php");
	}else{
		include("view/inc/banner.php");
	}

	session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    if(isset($_SESSION['user'])){
        if($_SESSION['type'] == "1"){
            //print_r($_SESSION);
            $menu = "view/inc/menu1.php"; //user
        }elseif($_SESSION['type'] == "0"){
            //print_r($_SESSION);
            $menu = "view/inc/menu0.php"; //admin
        }
    }else{
        $menu = "view/inc/menu.php"; //other
    }


    
?>
<div id="wrapper">		
    <header  id="header" class="alt">    	
    	<?php
    	    include("view/inc/header.php");
    	?>
    </header>  
	
    <nav id="menu">
    	<?php 
		    include($menu); 
		?>        
    </nav>
    <div id="">
        <?php 
            include("view/inc/pages.php"); 
        ?>        
        <br style="clear:both;" />
    </div>
    <div id="footer">   	   
	    <?php
	       include("view/inc/footer.php");
	    ?>        
    </div>
</div>
<?php
    include("view/inc/bottom_page.php");
?>