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
    //function addToCart() {
        alert("Añadido al carrito");
        var idproject = $(this).attr("id");

        //console.log(idproject);
        $.post("module/cart/controller/controller_cart.php?&op=project_shop&idproject=" + idproject, function(data,status) {
            var json = JSON.parse(data);
            //var name = json.ProName;
            //var qty = $("#" + idproject + "qty").val();
            //console.log(name);
            //console.log(qty);

            //console.log(json.ProName);
            for (var i in cart) {
                //console.log(cart);
                if(cart[i].idproject == json.idproject){
                    //cart[i].qty = qty;
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
            //$("#numcarr").empty();
            //$("#numcarr").append("(" + cart.length + ")");
                
        });
    //}
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
                    console.log(total);


            var row = "<tr><td>" + DataPre.ProName + "</td><td>"
            + DataPre.ProDonate  + DataPre.Curr + " / " + DataPre.ProPrice + DataPre.Curr + "</td><td>"
            + "<select id='"+ DataPre.idproject + "' class='cant'> <option value='5'>5€</option> <option value='10'>10€</option> <option value='20'>20€</option> <option value='50'>50€</option> <option value='100'>100€</option> <option value='500'>500€</option> </slect> </td><td>"
            + "<button onclick='deleteItem(" + i + ")'>Delete</button></td></tr>";
            $("#cartBody").append(row);

            $( '#' + DataPre.idproject).append("<option value='" + item.Cant +"' selected>" + item.Cant +"</option>");
            $("#cartFoot").empty();
            $("#cartFoot").append("Total a pagar: " + total + "€");
        });
    }

}

