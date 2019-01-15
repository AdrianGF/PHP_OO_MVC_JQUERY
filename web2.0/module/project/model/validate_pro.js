function validate_project(redirect) {

	if (document.ProForm.ProName.value.length<=2){
        document.getElementById('e_ProName').innerHTML = "El nombre introducido no es valido.";
        document.ProForm.ProName.focus();
        return 0
    }
    document.getElementById('e_ProName').innerHTML = "";

    
/*   if (document.ProForm.ProType == '?'){
        document.getElementById('e_ProType').innerHTML = "Campo requerido.";
        return 0;
    }
    document.getElementById('e_ProType').innerHTML = "";*/


   if (document.ProForm.ProDesc.value.length<=19){
        document.getElementById('e_ProDesc').innerHTML = "Descripción minima de 20 caracteres.";
	    document.ProForm.ProDesc.focus();
	    return 0;
    }
    document.getElementById('e_ProDesc').innerHTML = "";

    if (document.ProForm.Ubica.value.length==0){
        document.getElementById('e_Ubica').innerHTML = "Se requiere ubicación.";
	    document.ProForm.Ubica.focus();
	    return 0;
    }
    document.getElementById('e_Ubica').innerHTML = "";

    if (document.ProForm.Mail.value.length==0){
        document.getElementById('e_Mail').innerHTML = "Se requiere un correo.";
	    document.ProForm.Mail.focus();
	    return 0;
    }
    document.getElementById('e_Mail').innerHTML = "";

    
    if (document.ProForm.ProDateIni.value.length==0){
        document.getElementById('e_ProDateIni').innerHTML = "Se requiere una fecha de inicio.";
	    document.ProForm.ProDateIni.focus();
	    return 0;
    }
    document.getElementById('e_ProDateIni').innerHTML = "";

    if (document.ProForm.ProDateIni.value.length==0){
        document.getElementById('e_ProDateIni').innerHTML = "Se requiere una fecha de inicio.";
	    document.ProForm.ProDateIni.focus();
	    return 0;
    }
    document.getElementById('e_ProDateIni').innerHTML = "";
    
    if (document.ProForm.ProPrice.value.length<3){
        document.getElementById('e_ProPrice').innerHTML = "Se requiere una subención minima de 100€";
	    document.ProForm.ProPrice.focus();
	    return 0;
    }
    document.getElementById('e_ProPrice').innerHTML = "";

document.ProForm.submit();
document.ProForm.action="index.php?page=controller_pro";
}

$(document).ready(function () {
    $('.Pro').click(function () {
        var id = this.getAttribute('id');
        
        console.log("hola001");
        console.log(id);
        $.get("module/project/controller/controller_pro.php?op=read_modal&modal=" + id, function (data, status) {
            var json = JSON.parse(data);
            //console.log(json);
            
            if(json === 'error') {
                //console.log(json);
                //pintar 503
                window.location.href='index.php?page=503';
            }else{
                //console.log(json.idproject);
                $("#idproject").html(json.idproject);
                $("#ProName").html(json.ProName);
                $("#ProType").html(json.ProType);
                $("#ProDesc").html(json.ProDesc);
                $("#Ubica").html(json.Ubica);
                $("#Mail").html(json.Mail);
                $("#ProDateIni").html(json.ProDateIni);
                $("#ProPrice").html(json.ProPrice);
                $("#Curr").html(json.Curr);
                $("#req").html(json.req);
     
                $("#details_project").show();
                $("#project_modal").dialog({
                    width: 850, //<!-- ------------- ancho de la ventana -->
                    height: 500, //<!--  ------------- altura de la ventana -->
                    //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
                    //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
                    resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
                    //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
                    modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                    buttons: {
                        Ok: function () {
                            $(this).dialog("close");
                        }
                    },
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });
            }//end-else
        });
    });
});