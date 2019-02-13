$(document).ready( function(){
    $("#api1").on("click", function() {

        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {
                var on = true;
                var x = 0;
                for(var i = 0; i < 10000; ++i) {
                    var type = data[i].funding_type
                    if( (type == 'Open ended') && ( on == true ) ){
                        //console.log(data[i]);
                        //var api = [data[i].title, data[i].funding_type];
                        var api = [data[i].title];
                        ++x;
                        //$("#test").empty();
                        $( "#test" ).append( "<div class='api_info'>" + api + "<div/>" );  
                        
                        if(x >=5 ){
                            on = false;
                        }

                    }
                }
                
                
            }, "json" );
            
            
      });

      $("#api2").on("click", function() {
        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {
            //localStorage.clear();
            var api_pro = [data, "Take what you raise"];
            localStorage.setItem("api_pro", JSON.stringify(api_pro))
            window.location.href = 'index.php?page=controller_shop&op=list_shop'
            

        }, "json" );
      });

      $("#api3").on("click", function() {
        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {
                for(var i = 0; i < 10000; ++i) {
                    var type = data[i].funding_type
                    if( type == 'All or nothing'){
                        console.log(data[i]);
                    }
                }

          }, "json" );
      });
});