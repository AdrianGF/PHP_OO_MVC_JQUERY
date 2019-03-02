<?php
	if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
	}
    include("module/contact/view/contact.php");