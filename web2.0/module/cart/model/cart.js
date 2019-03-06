var cart = [];
$(document).ready(function(){
    
    $(function () {
        if (localStorage.cart){
            cart = JSON.parse(localStorage.cart);
            showCart();
        }
    });

    $(document).on('click','.donate_cart', function() { 
    //function addToCart() {
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
                if(cart[i].ProName == json.ProName){
                    //cart[i].qty = qty;
                    showCart();
                    saveCart();
                    return;
                }
            }
        
            var item = { Product: json.ProName};
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



function CalcPrice(data,cont) {
    const promise = new Promise(function (resolve, reject) {
      $.get("module/cart/controller/controller_cart.php?&op=project_price&ProName=" + data , function(data1,status) {
          console.log(data1);
          json = JSON.parse(data1);
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
    for (var i in cart) {
        var item = cart[i];
        //console.log(item.Product);
        CalcPrice(item.Product, i).then(function (response) {
            var DataPre = JSON.parse(JSON.stringify(response));

            var row = "<tr><td>" + DataPre.ProName + "</td><td>"
            + DataPre.ProPrice + "</td><td>"
            + "<button onclick='deleteItem(" + i + ")'>Delete</button></td></tr>";
            $("#cartBody").append(row);
        });
    }
}