$(document).ready(function () {
    var ProType = "";
    var Ubica = "";
    var ProName = "";

    //Busqueda por todo:
    $.get("module/home/controller/controller_home.php?op=dropdown_type", function (data, status) {
        var json = JSON.parse(data);
        var $dd_type = $("#dd_type");
        $dd_type.empty();
        $dd_type.append("<option>Type</option>");
        $.each(json, function(index, shop) {
            $dd_type.append("<option>" + shop.ProType + "</option>");
        });
    });

    $("#dd_type").change(function() {
        var ProType = $(this).val(); 
        //console.log(ProType);
        $.get("module/home/controller/controller_home.php?op=dropdown_city&ProType=" + ProType, function (data, status) {
            var json = JSON.parse(data);
            //console.log(data);
            var $dd_city = $("#dd_city");
            $dd_city.empty();
            $dd_city.append("<option>City</option>");
            $.each(json, function(index, shop) {
                $dd_city.append("<option>" + shop.Ubica + "</option>");
            });
        });

            $('#aa_name').keyup(function(){
                var Ubica = document.getElementById('dd_city').value;
                var aa_name = $(this).val();
                var checks = "WHERE ProType = " + "'" + ProType + "'"  + " AND Ubica = " + "'" + Ubica + "'";    
                //console.log(checks); 
                var dataString = {aa_name: aa_name};
                $.ajax({
                    type: "POST",
                    url: 'module/home/controller/controller_home.php?op=list_name&checks=' + checks ,
                    data: dataString,
                    success: function(data) {
                        $('#suggestions').fadeIn(1000).html(data);
        
                        $('.suggest-element').on('click', function(){
                            var id = $(this).attr('id');
                            $('#aa_name').val($('#'+id).attr('data'));
                            var testy = document.getElementById(id).text;
                            //console.log(id);
                            //console.log(testy);
                            document.getElementById("aa_name").value = testy;
                        });
        
                        $('.btn_dd').on('click', function(){
                            var id = $(this).attr('id');
                            $('#aa_name').val($('#'+id).attr('data'));
                            $('#suggestions').fadeOut(1000);
                            //console.log(id); 
                            var ProName = document.getElementById('aa_name').value;
                            window.location.href = 'index.php?page=controller_shop&op=list_shop&ProType=' + ProType + '&Ubica=' + Ubica + '&ProName=' + ProName;
                        });
                    }
                });
            });

    });//END 


    //Busqueda por type o type + name
    $('#dd_type').on('click', function(){ 

        var ProType = document.getElementById("dd_type").value

        if((ProType) && (!Ubica) && (!ProName) ){
            
                var checks = "WHERE ProType = " + "'" + ProType + "'";    
                var dataString = {ProType};
                $.ajax({
                    type: "POST",
                    url: 'module/home/controller/controller_home.php?op=list_type_only&checks=' + checks ,
                    data: dataString,
                    success: function(data) {
                        $('.btn_dd').on('click', function(){
                            window.location.href = 'index.php?page=controller_shop&op=list_shop&ProType=' + ProType;
                        });
                    }
                });

        }
        

    });//END
            

    //Busqueda por name
    $('#aa_name').keyup(function(){
        if((!ProType) && (!Ubica)){

                var aa_name = $(this).val();
                var checks = "WHERE ProName LIKE";     
                var dataString = {aa_name: aa_name};
                $.ajax({
                    type: "POST",
                    url: 'module/home/controller/controller_home.php?op=list_name_only&checks=' + checks ,
                    data: dataString,
                    success: function(data) {
                        $('#suggestions').fadeIn(1000).html(data);
                        $('.suggest-element').on('click', function(){
                            var id = $(this).attr('id');
                            $('#aa_name').val($('#'+id).attr('data'));
                            var testy = document.getElementById(id).text;
                            //console.log(id);
                            //console.log(testy);
                            document.getElementById("aa_name").value = testy;
                        });
        
                        $('.btn_dd').on('click', function(){
                            var id = $(this).attr('id');
                            $('#aa_name').val($('#'+id).attr('data'));
                            $('#suggestions').fadeOut(1000);
                            //console.log(id); 
                            var ProName = document.getElementById('aa_name').value;
                            window.location.href = 'index.php?page=controller_shop&op=list_shop&ProName=' + ProName + '&Ubica=' + Ubica + '&ProType=' + ProType;
                        });
                    }
                });
            
        }
    });//END

});