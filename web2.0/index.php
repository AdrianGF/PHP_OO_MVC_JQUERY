<?php
    if ((isset($_GET['page'])) && ($_GET['page']==="controller_pro") ){
		include("view/inc/top_page_pro.php");
	}else{
		include("view/inc/top_page.php");
    }
    
    if ((isset($_GET['page'])) && ($_GET['page']==="controller_pro") ){
		include("view/inc/banner2.php");
	}else{
		include("view/inc/banner.php");
	}

	session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<div id="wrapper">		
    <header  id="header" class="alt">    	
    	<?php
    	    include("view/inc/header.php");
    	?>
    </header>  
	
    <nav id="menu">
    	<?php 
		    include("view/inc/menu.php"); 
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