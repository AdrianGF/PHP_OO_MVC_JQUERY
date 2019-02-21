function valide_login(){
	//User
	if(document.LogForm.user.value.length === 0){
		document.getElementById('e_user').innerHTML = "Tienes que escribir el usuario";
		document.formlogin.user.focus();
		return 0;
	}
	document.getElementById('e_user').innerHTML = "";

	//Password
	if(document.LogForm.password.value.length === 0){
		document.getElementById('e_password').innerHTML = "Tienes que escribir la contraseña";
		document.formlogin.password.focus();
		return 0;
	}
	document.getElementById('e_password').innerHTML = "";

	//document.formlogin.click();//click
	//document.formlogin.action="index.php?page=controller_login&op=list_login";
}

function validate_register(){
	var v_mail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    
    //User
	if(document.RegForm.user.value.length === 0){
		document.getElementById('error_register').innerHTML = "Tienes que escribir el usuario";
		document.RegForm.user.focus();
		return 0;
	}
	if(document.RegForm.user.value.length <= 5){
		document.getElementById('error_register').innerHTML = "El usuario tiene que tener más de 5 caracteres";
		document.RegForm.user.focus();
		return 0;
	}
    document.getElementById('error_register').innerHTML = "";

    //Mail
	if(document.RegForm.email.value.length === 0){
		document.getElementById('error_register').innerHTML = "Tienes que escribir el mail";
		document.RegForm.email.focus();
		return 0;
	}
	if(!v_mail.test(document.RegForm.email.value)){
		document.getElementById('error_register').innerHTML = "El formato del mail es invalido";
		document.RegForm.email.focus();
		return 0;
	}
	document.getElementById('error_register').innerHTML = "";
    
    //Pass
    if(document.RegForm.password.value.length === 0){
		document.getElementById('error_register').innerHTML = "Tienes que escribir la contraseña";
		document.RegForm.password.focus();
		return 0;
	}
	if(document.RegForm.password.value.length < 5){
		document.getElementById('error_register').innerHTML = "La contraseña tiene que tener más de 5 caracteres";
		document.RegForm.password.focus();
		return 0;
	}
    document.getElementById('error_register').innerHTML = "";

    
}

$(document).ready(function(){

	$("#RegForm").submit(function (e) {
		e.preventDefault();
		if (validate_register() != 0) {
			var data = $("#RegForm").serialize();
			$.ajax({
				type : 'POST',
				url  : 'module/login/controller/controller_login.php?op=register&' + data,
				data : data,
				beforeSend: function(){	
					//console.log(data)
					$("#error_register").fadeOut();
				},
				success: function(response){	
                    //console.log(response);					
					if(response==="ok"){
						setTimeout(' window.location.href = "index.php?page=controller_home&op=home"; ',1000);
					}else{
						$("#error_register").fadeIn(1000, function(){						
							$("#error_register").html('<div class="error_register_BD">' + response + '</div>');
						});
					}
			  }
			});
		}
    });
    
});
