$(document).ready(function(){

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
     }
     var ProType = getQueryVariable('ProType');
     var Ubica = getQueryVariable('Ubica');
     var ProName = getQueryVariable('ProName');
     var id = getQueryVariable('id');
     var stored = JSON.parse(localStorage.getItem("api_pro"))


     if((!ProType) && (!Ubica) && (!ProName) && (!id) && (stored)){

        
        //busqueda por api

            $.each(stored[0], function(index, data){
                
                if((stored[1] == "Take what you raise" ) && (data.funding_type == "Take what you raise")){
                    //localStorage.clear();
                    $( "#list_api" ).append( "<a class='shop_proname_class' id="+ 'n' + data.nid +">" + data.title + "<a/></br>" );  
                    
                    
                }

                if((stored[1] == "Open ended" ) && (data.funding_type == "Open ended")){
                    //localStorage.clear();
                    //console.log(data)
                    $( "#list_api" ).append( "<img class='api_img' src='view/images/api05.png' /> </br><a class='shop_proname_class' id="+ 'n' + data.nid +">" + data.title + "<a/></br>" );   
                    
                }

                if((stored[1] == "All or nothing" ) && (data.funding_type == "All or nothing")){
                    //localStorage.clear();
                    $( "#list_api" ).append( "<a class='shop_proname_class' id="+ 'n' + data.nid +">" + data.title + "<a/></br>" );  
                    
                }
            });
    }else{

         //busqueda de todo por menu shop:
         if((!ProName) && (!ProType) && (!Ubica)){

            if (document.getElementById('container_shop')) {
                $.get("module/shop/controller/controller_shop.php?op=all_pro", function (data, status) {
                  var json = JSON.parse(data);
                  $.each(json, function(index, list) {
                        //console.log(list.idproject);
                        var ElementDiv = document.createElement('div');
                        ElementDiv.id = "list_shop";
                        ElementDiv.innerHTML =  "<div class='shop_img_class'> <img  src='view/images/bg.jpg' class='shop_img'></div>"
                                                + "<a class='shop_proname_class' id="+ list.idproject +">" + list.ProName + "</a>";
                        document.getElementById("list_products").appendChild(ElementDiv);
                    });
                });
            }

         }


         //busqueda por todos los campos
         if((ProType) && (Ubica) && (ProName)){

            if (document.getElementById('container_shop')) {
                $.getJSON("module/shop/controller/controller_shop.php?op=data_shop&ProType=" + ProType  + '&Ubica=' + Ubica + '&ProName=' + ProName, function (data, status) {
                  var json = data;
                    //console.log(data);
                    $.each(json, function(index, list) {
                        var ElementDiv = document.createElement('div');
                        ElementDiv.id = "list_shop";
                        ElementDiv.innerHTML =  "<div class='shop_img_class'> <img  src='view/images/bg.jpg' class='shop_img'></div>"
                                                + "<a class='shop_proname_class' id="+ list.idproject +">" + list.ProName + "</a>";
                        document.getElementById("list_products").appendChild(ElementDiv);
                  });
                });
            }

         }

         //busqueda nombre unicamente
         if((!ProType) && (!Ubica) && (ProName)){
            if (document.getElementById('container_shop')) {
                $.getJSON("module/shop/controller/controller_shop.php?op=data_ProName&ProName=" + ProName, function (data, status) {
                  var json = data;
                    //console.log(data);
                    $.each(json, function(index, list) {
                        var ElementDiv = document.createElement('div');
                        ElementDiv.id = "list_shop";
                        ElementDiv.innerHTML =  "<div class='shop_img_class'> <img  src='view/images/bg.jpg' class='shop_img'></div>"
                                                + "<a class='shop_proname_class' id="+ list.idproject +">" + list.ProName + "</a>";
                        document.getElementById("list_products").appendChild(ElementDiv);
                  });
                });
            }

         }


        //busqueda tipo unicamente
         if((ProType) && (!Ubica) && (!ProName)){
            if (document.getElementById('container_shop')) {
                $.getJSON("module/shop/controller/controller_shop.php?op=data_ProType&ProType=" + ProType, function (data, status) {
                  var json = data;
                    //console.log(data);
                    $.each(json, function(index, list) {
                        var ElementDiv = document.createElement('div');
                        ElementDiv.id = "list_shop";
                        ElementDiv.innerHTML =  "<div class='shop_img_class'> <img  src='view/images/bg.jpg' class='shop_img'></div>"
                                                + "<a class='shop_proname_class' id="+ list.idproject +">" + list.ProName + "</a>";
                        document.getElementById("list_products").appendChild(ElementDiv);
                  });
                });
            }

         }


        //details
        if (document.getElementById('container_details')) {
            $.get("module/shop/controller/controller_shop.php?op=details&id=" + id, function (data, status) {
                var json = JSON.parse(data);
                //console.log(json);
                $.each(json, function(index, list) {
                    //console.log(list.idproject);
                    var ElementDiv = document.createElement('div');
                    ElementDiv.id = "list_shop";
                    ElementDiv.innerHTML =  "<div class='details' >"
                                            + "<p>" + list.ProName + "</p>"
                                            + "<p>" + list.ProDesc + "</p>"
                                            + "</div>";
                    document.getElementById("details_prod").appendChild(ElementDiv);
                });
            });
        }//end

        //details_api
        if (document.getElementById('container_details')) {

            $.each(stored[0], function(index, data){
                if( 'n'+ data.nid == id ){
                    $( "#details_prod_api" ).append( "<div class='shop_proname_class' id="+ 'n' + data.nid +">" + data.title + "<div/>" 
                                                    + "<div>" + data.intro + "</div>" );  
                }
             });
        }//end

         
    
    
    }   

    $(document).on('click','.shop_proname_class',function () {
        var id = this.getAttribute('id');
        if( id.substring(0,1) == "n"  ){
            window.location.href = 'index.php?page=controller_shop&op=list_details&id=' + id;
        }else {
            window.location.href = 'index.php?page=controller_shop&op=list_details&id=' + id;
        }
        
    });



});

