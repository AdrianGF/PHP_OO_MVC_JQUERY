var cart = [];
$(document).ready(function(){
    
    $(function () {
        if (localStorage.cart){
            cart = JSON.parse(localStorage.cart);
            showCart();
        }
    });

    $(document).on('change','.cant', function() {  
        var testy = JSON.parse(localStorage.cart); 
        
        //console.log("");
        
        for (var i in cart) {
            if(cart[i].IdPro ===  $(this).attr("id")){
                var cant = $(this).val();
                cart[i].Cant = cant;
                //console.log(cant);
                showCart();
                saveCart();
                return;  

            }
        }

    });

    $(document).on('click','.donate_cart', function() { 

        alert("Añadido al carrito");
        
        var idproject = $(this).attr("id");


        //console.log(idproject);
        $.post("module/cart/controller/controller_cart.php?&op=project_shop&idproject=" + idproject, function(data,status) {
            var json = JSON.parse(data);

            //console.log(json.ProName);
            for (var i in cart) {
                //console.log(cart);
                if(cart[i].idproject == json.idproject){
                    showCart();
                    saveCart();
                    return;
                }
            }
        
            var item = { IdPro: json.idproject};
            cart.push(item);
            //console.log(cart);
            saveCart();
            showCart();
                
        });
    });
});



function CalcPrice(data, cant, cont) {
    const promise = new Promise(function (resolve, reject) {
      $.get("module/cart/controller/controller_cart.php?&op=project_price&idproject=" + data , function(data1,status) {
          //console.log(data1);
          json = JSON.parse(data1);
          json.cant=cant;
          json.cont=cont;
          resolve(json);
      });
      if (!data) {
        reject(new Error('No hay datos'));
      }
    });
    return promise;
  }

function FinalData (data, array) {
    const promise = new Promise(function (resolve, reject) {
        setTimeout(function() {
        array.push(data)
        resolve(array)
        }, 100);
        if (!array) {
        reject(new Error('No existe un array'))
        }
    })
    return promise
}

const finaldata = [];

function InsertCompra() {
  if (!localStorage.cart) {
      console.log("error");
  }else{
    var prodata = [];
    var finaldata = [];
    $.get("module/cart/controller/controller_cart.php?&op=user_info", function(data,status) {
        if (data === '"error"') {
            setTimeout(' window.location.href = "index.php?page=controller_login&op=view"; ',1000);
        } else{
            var prod = JSON.parse(localStorage.cart);
            //console.log(data);
            for (var i = prod.length - 1; i >= 0; i--) {
                CalcPrice(prod[i].IdPro, prod[i].Cant, i).then(function (response) {
                var pdata = JSON.parse(JSON.stringify(response));
                console.log(pdata);

                prodata = [pdata.idproject, pdata.ProName, data, pdata.ProDonate, pdata.cant, parseFloat(pdata.ProDonate) + parseFloat(pdata.cant)];

                FinalData(prodata,finaldata).then(function () {
                    //console.log(finaldata);

                });   
              });   
            }

            setTimeout(function() {
                console.log(finaldata)
                $.post("module/cart/controller/controller_cart.php?&op=add_info&info=" + finaldata, function(data,status) {
                  
                  console.log(data);
                  alert("Compra realizada correctamente");
                  DelCart();
                  $( "#butttram" ).hide();
                  $( "#cart" ).hide();
                  $("#confpurch").show();
                  $("#confpurch").append("Compra realizada correctamente");
                  setTimeout('window.location.replace("index.php?page=controller_home&op=home");',2000);
                });  
              }, 1000);

        }
    });
  }
}




function showCart() {
    if (cart.length == 0) {
        $("#cart").css("visibility", "hidden");
        return;
    }
    
    $("#cart").css("visibility", "visible");
    $("#cartBody").empty();
    var total = 0;
    for (var i in cart) {
        var item = cart[i];
        
        CalcPrice(item.IdPro, item.Cant, i).then(function (response) {
            var DataPre = JSON.parse(JSON.stringify(response));
                    total = parseInt(total) + parseInt(DataPre.cant) ;
                    //console.log(total);


            var row = "<tr><td>" + DataPre.ProName + "</td><td>"
            + DataPre.ProDonate  + DataPre.Curr + " / " + DataPre.ProPrice + DataPre.Curr + "</td><td>"
            + "<select id='"+ DataPre.idproject + "' class='cant'> <option value='5'>5€</option> <option value='10'>10€</option> <option value='20'>20€</option> <option value='50'>50€</option> <option value='100'>100€</option> <option value='500'>500€</option> </slect> </td><td>"
            + "<button onclick='deleteItem(" + i + ")'>Delete</button></td></tr>";
            $("#cartBody").append(row);
            
            $( "#" + DataPre.idproject).append("<option value='" +  parseInt(DataPre.cant) +"' selected>" +  parseInt(DataPre.cant) +"€</option>");

            $("#cartFoot").empty();
            $("#cartFoot").append("Total a pagar: " + total + "€");
        });
    }

}

function DelCart(){
    localStorage.removeItem('cart');
  }

function deleteItem(index){
    cart.splice(index,1); // delete item at index
    showCart();
    saveCart();
}

function saveCart() {
    if ( window.localStorage){
        localStorage.cart = JSON.stringify(cart);
    }
}

