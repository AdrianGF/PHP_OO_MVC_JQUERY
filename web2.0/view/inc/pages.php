<?php
	switch($_GET['page']){
		case "home";
			include("module/home/view/home.php");
			break;
		case "controller_pro";
			include("module/project/controller/".$_GET['page'].".php");
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
			include("module/home/view/home.php");
			break;
	}
?>