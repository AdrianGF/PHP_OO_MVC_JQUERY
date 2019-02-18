$(document).ready( function(){
    $("#api1").on("click", function() {

        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {
           
            var api_pro = [data, "Open ended"];
            localStorage.setItem("api_pro", JSON.stringify(api_pro))
            window.location.href = 'index.php?page=controller_shop&op=list_shop'
          
            }, "json" );
            
            
      });

      $("#api2").on("click", function() {
        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {

            var api_pro = [data, "Take what you raise"];
            localStorage.setItem("api_pro", JSON.stringify(api_pro))
            window.location.href = 'index.php?page=controller_shop&op=list_shop'
            

        }, "json" );
      });

      $("#api3").on("click", function() {
        $.get( "https://www.fundsurfer.com/api/projects/json", function( data ) {

            var api_pro = [data, "All or nothing"];
            localStorage.setItem("api_pro", JSON.stringify(api_pro))
            window.location.href = 'index.php?page=controller_shop&op=list_shop'

          }, "json" );
      });
});