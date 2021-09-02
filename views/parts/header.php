<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet"> 
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    
    <link rel="shortcut icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="/assets/css/reset.css">-->
    <title>COGIP Web App</title>
</head>
<body>
<!-- MENU -->
<nav class="navheader">
    <!-- Brand -->
<a href="dashboard" class="logo"><img src="assets/img/logocogip1.png" alt="logo"></a>

<a href="dashboard" class="icons"><i class="material-icons" style="color:#F4FF3A;">home</i>Home</a>
<a href="invoice" class="icons"><i class="material-icons" style="color:#01D758;">paid</i>Invoices</a>
<a href="company" class="icons"><i class="material-icons" style="color:#318CE7;">apartment</i>Companies</a>
<a href="person" class="icons"><i class="material-icons" style="color:#8663C7;">contact_page</i>Contacts</a> 
<a href="users" class="icons"><i class="material-icons" style="color:#F9A41E;">admin_panel_settings</i>Users</a>
<a href="logout" class="icons"><i class="material-icons" style="color:#FF0921;">logout</i>Logout</a>

</nav>
<H1>
<?php echo ("Hi ".$_SESSION['username']. " !  Are you ready for the work ? "); ?>
</h1> 
<h2>Where do you want to start? </h2>
