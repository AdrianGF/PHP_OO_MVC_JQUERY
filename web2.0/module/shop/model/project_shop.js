$(document).ready(function(){


    //var stored = localStorage.getItem("api_pro")
    //console.log('test: ', JSON.parse(stored));

    var stored = JSON.parse(localStorage.getItem("api_pro"))
    //console.log(stored[0][0]["funding_type"]);
    $.each(stored[0], function(index, data){
        
        if((stored[1] == "Take what you raise" ) && (data.funding_type == "Take what you raise")){
                console.log(data.funding_type);
                $( "#test" ).append( "<div class='api_info'>" + data.title + "<div/>" );  
            
        }
    });
    

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
                                                + "<a class='shop_proname_class' href='index.php?page=controller_shop&op=list_details&id="+ list.idproject + "'>" + list.ProName + "</a>";
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
                                                + "<a class='shop_proname_class' href='index.php?page=controller_shop&op=list_details&id="+ list.idproject + "'>" + list.ProName + "</a>";
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
                                                + "<a class='shop_proname_class' href='index.php?page=controller_shop&op=list_details&id="+ list.idproject + "'>" + list.ProName + "</a>";
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
                                                + "<a class='shop_proname_class' href='index.php?page=controller_shop&op=list_details&id="+ list.idproject + "'>" + list.ProName + "</a>";
                        document.getElementById("list_products").appendChild(ElementDiv);
                  });
                });
            }

         }


                 //details
        if (document.getElementById('container_details')) {
            $.get("module/shop/controller/controller_shop.php?op=details&id=" + id, function (data, status) {
                var json = JSON.parse(data);
                console.log(json);
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

         



});
