<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
  <title>Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
  

	<link href="view/assets/css/main.css" rel="stylesheet" type="text/css" />
    <!-- MDBootstrap Datatables  -->
  <link href="view/assets/css/datatables.min.css" rel="stylesheet">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="view/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="view/assets/css/mdb.min.css" rel="stylesheet">



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script>
            $( function() {
              $( "#date1" ).datepicker({
                dateFormat: 'yy/mm/dd', 
                changeMonth: true,
                changeYear: true
              });

            $('#date2').datepicker({
                dateFormat: 'yy/mm/dd', 
                changeMonth: true, 
                changeYear: true, 
                yearRange: '0:+2',
                minDate: 0,
            });
            } );
            </script>
    <script type="text/javascript" src="module/project/model/validate_pro.js" ></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="view/assets/js/datatables.min.js"></script>
</head>
<body>
