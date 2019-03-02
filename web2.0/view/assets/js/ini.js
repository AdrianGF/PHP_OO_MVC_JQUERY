$(document).ready(function(){

    if (document.getElementById('profile')) {
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?op=avatar',
            success: function(response){	
                response = JSON.parse(response);
                //console.log(response);			
                if(response){
                    var ElementDiv = document.createElement('div');
                    ElementDiv.id = "profile_info";
                    ElementDiv.innerHTML = "<img class='profile_img' src=" + response['avatar'] + " />"
                                                + "<div class='profile_top_bottom'><div class='profile_top'><label class='profile_lab_user'>" + response['user'] + "</label></div>"
                                                + "<div class='profile_bottom'><label class='profile_lab_email'>" + response['email'] + "</label></div></div>";
                    document.getElementById("profile").appendChild(ElementDiv);
                }else{
                    setTimeout(' window.location.href = "index.php?page=controller_home&op=home"; ',1000);
                }
        }
        });

        setInterval(function(){ 
            $.ajax({
                type : 'POST',
                url  : 'module/login/controller/controller_login.php?op=timeout',
                success: function(response){	
                    //response = JSON.parse(response);
                    //console.log(response);	
                    if(response === "inactivo"){
                        setTimeout(' window.location.href = "index.php?page=controller_login&op=logout"; ',1000);
                    }
                }
            });
        }, 1000);
        setInterval(function(){ 
            $.ajax({
                type : 'POST',
                url  : 'module/login/controller/controller_login.php?op=regenerate',
                success: function(response){	
                    //response = JSON.parse(response);
                    //console.log(response);	
                }
            });
         }, 10000);
    }



});