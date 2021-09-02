<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="shortcut icon" href="favicon-32x32.png">

        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Abdelilah : add for date, please don't delete it -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {
                    $( "#invoice_date" ).datepicker({
                        defaultDate: "",
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd"
                    });
                } );
    
                function prependF(elem) {
                    let val = elem.value;
                    if(!val.match(/^F/)) {
                        elem.value = "F" + val;
                    }
                }
            </script>
        <!-- Abdelilah : add for date -->
        
        <title>COGIP Web App</title>
    </head>
    
    <body>
    <!-- HEADER -->
    <nav class="nav-header">
      <?php if(isset($_SESSION['username']))  { ?>
        <span class="logo-isLogged"><a href="dashboard"><img src="assets/img/logo-cogip-2.png" width="40" height="40" alt="logo"></a></span>
        <a href="user"><i class="material-icons" style="color:#F4FF3A;">home</i></a>
        <span class="material-icons" style="color:#01D758;">paid</span>
        <span class="material-icons" style="color:#318CE7;">apartment</span>
        <span class="material-icons" style="color:#8663C7;">contact_page</span>
        <span class="material-icons" style="color:#F9A41E;">admin_panel_settings</span>
        <div class="">
			<?php echo ("Hi ".$_SESSION['username']); ?>
            <button><a href="logout">Logout</a></button>
        </div>
	  <?php } else { ?>
        <span class="logo-login">
            <a href="dashboard"><img src="assets/img/logo-cogip-2.png" width="250" height="250" alt="logo"></a>
        </span>
	  <?php }?>
    </nav>