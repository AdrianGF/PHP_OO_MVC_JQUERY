
<?php
    if ((isset($_GET['page']))){
		
		switch($_GET['page']){
			
			case "controller_like";
				include("module/like/controller/".$_GET['page'].".php");
				break;
			case "controller_home";
				include("module/home/controller/".$_GET['page'].".php");
				break;
			case "controller_shop";
				include("module/shop/controller/".$_GET['page'].".php");
				break;
			case "controller_pro";
				include("module/project/controller/".$_GET['page'].".php");
				break;
			case "controller_contact";
				include("module/contact/controller/".$_GET['page'].".php");
				break;
			case "controller_login";
				include("module/login/controller/".$_GET['page'].".php");
				break;
			case "elements";
				include($_GET['page'].".html");
				break;
				/*
			case "contact";
				include("module/contact/".$_GET['page'].".php");
				break;
				*/
			case "404";
				include("view/inc/error".$_GET['page'].".php");
				break;
				
			case "503";
				include("view/inc/error".$_GET['page'].".php");
				break;
				
			default;
				break;
		}
	}else{
		$_GET['op'] = 'home';
		include("module/home/controller/controller_home.php");
		
	}
?>