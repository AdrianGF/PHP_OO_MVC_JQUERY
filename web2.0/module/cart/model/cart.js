var cart = [];
var auxarr = [];
var obj = "";
var aux = "";
var prome = "";
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

        var idproject = $(this).attr("id");
        
        alert("Añadido al carrito");
        
  

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
                  if( data === '"error"'){
                        DelCart();
                        alert("La donacion no es valida");
                        setTimeout('window.location.replace("index.php?page=controller_home&op=home");',2000);
                  }else{
                        alert("Compra realizada correctamente");
                        DelCart();
                        $( "#butttram" ).hide();
                        $( "#cart" ).hide();
                        $("#confpurch").show();
                        $("#confpurch").append("Compra realizada correctamente");
                        setTimeout('window.location.replace("index.php?page=controller_home&op=home");',2000);
                  }

                });  
              }, 1000);

        }
    });
  }
}

/*
            for (var j in cart){
                if((cart[i].IdPro == cart[j].IdPro) && ( i != j)){
                    //console.log(cart[i].IdPro);
                    //console.log(cart[j].IdPro);
                    cart[j].IdPro = cart[j].IdPro + "R" + j;
                    console.log(cart[j].IdPro);
                    var atri = $(this).attr("id") + "R" + j;
                    console.log (atri);
                    if(cart[j].IdPro ===  atri){
                        var cant = $(this).val();
                        cart[i].Cant = cant;
                        //console.log(cant);
                        showCart();
                        saveCart();
                        return; 
                    }
                    
                }
            }
 */



function TestMio(data, i) {
    const promise = new Promise(function (resolve, reject) {
        //console.log(i);
        
        $.get("module/cart/controller/controller_cart.php?&op=calc_dupli&idproject=" + data[i].IdPro , function(data1,status) {
            var resu = [];
            //console.log(i);
            //console.log(data1)
            if(data1 === 'true'){
                //console.log(data[i]);
                resu = data[i];
                resu.i = i;
                resolve(resu);
            }else{
                reject(new Error('Error'));
            }
        });

    });
    return promise;
}

function TestMio2() {
    const promise = new Promise(function (resolve, reject) {
        //console.log(data[i].IdPro);
        $.get("module/cart/controller/controller_cart.php?&op=group_by", function(data1,status) {
            if (data1 === "'error'"){
                DelCart();
                alert("ERROR");
                reject(new Error('Error'));
            }else{
                //console.log(data1);
                var json = JSON.parse(data1);
                //json = data1;
                resolve(json);
            }
        });

    });
    return promise;
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
        //console.log(i);
        
        TestMio(cart, i).then(function (response1){
            var x = JSON.parse(JSON.stringify(response1));
        
            //console.log(x.i);
            //console.log(x.data.length-1);
            if(parseInt(x.i) === x.IdPro.length-1){
                //console.log("in");
                TestMio2().then(function (response2){
                    
                    var y = JSON.parse(JSON.stringify(response2));
                    //.log(x.i);
                    for(var j = 0; j <= x.i; j++){
                        //console.log(y[j].count);
                        if(y[j].count > 1){
                            //console.log(y[j]);
                            for( var z = 0; z < y[j].count; z++ ){
                                aux = y[j].idproject;
                                aux = y[j].idproject + 'R' +  parseInt(z);
                                
                                auxarr.push(aux);
                                //console.log(auxarr);
                                
                                //console.log(obj);
                                


                                
                            }
                        }else{
                            aux = y[j].idproject;
                            auxarr.push(aux);
                            //console.log(aux);
                        }
                        
                    }
                    
                    
                });
            }
        });


        
        CalcPrice(item.IdPro, item.Cant, i).then(function (response) {
            var DataPre = JSON.parse(JSON.stringify(response));
            total = parseInt(total) + parseInt(DataPre.cant) ;
            var x = DataPre.cont;     
            
           
            //console.log();




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

