<?php

/* START THE USER SESSION IF NEED BE */
@session_start();

//IF THE USER IS ALREADY LOGED IN AS A STUDENT, KEEP IT SO
if(@$_SESSION['l031n45'] != ''){

    include 'redirect.php'; 
    $logedin = new redirect('panel.php');
    die();

    //OTHERWISE KEEP A LOG OF THE CURRENT PAGE
}else if(!isset($_SESSION['currpage'])){

    $_SESSION['currpage'] = 'c_login.php';

}

//IF THE USER IS AN ADMINISTRATOR LOG THEM IN AS ONE
if(@$_SESSION['154dm1n']){
    include "redirect.php";
    $go = new redirect("cpanel.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en" manifest="cache.appcache">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="University OF Eastern Africa Baraton Room Reservation, UEAB, RoomRes, The Cnnection, Iarasoft">
        <meta name="keywords" content="UEAB Room Reservation, Room Reservation, Students Rooms, UEAB, Baraton">
        <meta name="author" content="The Connection, Iarasoft">
        <link rel="icon" href="favicon.ico">

        <title>UEAB | Room Reservation | Admin Login</title>

        <!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MAIN CSS (REQUIRED ALL PAGE)-->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body class="lock tooltips" style="min-height: 113px; background: rgb(55,53,191); /* Old browsers */
                                       background: -moz-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%, rgba(35,34,122,1) 100%); /* FF3.6+ */
                                       background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(55,53,191,1)), color-stop(100%,rgba(35,34,122,1))); /* Chrome,Safari4+ */
                                       background: -webkit-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Chrome10+,Safari5.1+ */
                                       background: -o-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* Opera 12+ */
                                       background: -ms-radial-gradient(center, ellipse cover,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* IE10+ */
                                       background: radial-gradient(ellipse at center,  rgba(55,53,191,1) 0%,rgba(35,34,122,1) 100%); /* W3C */
                                       filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3735bf', endColorstr='#23227a',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */" >




        <!--
===========================================================
BEGIN PAGE
===========================================================
--><div class="login-header text-center">
        <img src="assets/img/logo-login.png" class="logo" alt="UEAB|Room Reservation | Administrator login">
        </div>
        <div class="login-wrapper" >
            <div id="repondre"></div>
            <div id="form">
                <div class="form-group has-feedback lg left-feedback no-label">
                    <input type="text" class="form-control no-border input-lg rounded"  id="username" required="required" placeholder="ADMIN Username" autofocus>
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback lg left-feedback no-label">
                    <input type="password" class="form-control no-border input-lg rounded" id="passwd" required="required"  placeholder="Your Password">
                    <span class="fa fa-unlock-alt form-control-feedback"></span>
                </div>
                <input type="hidden" name="act" value="login" readonly /> 
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="i-yellow-flat" checked> Remember me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="login" class="btn btn-success btn-lg btn-perspective btn-block">LOGIN</button>
                </div>
            </div>
            <p class="text-center"><strong><a href="new_password_c.php" >Forgot your password?</a></strong></p>
        </div><!-- /.login-wrapper --><!-- /.login-wrapper -->
        <!--
===========================================================
END PAGE
===========================================================
-->

        <!--
===========================================================
Placed at the end of the document so the pages load faster
===========================================================
-->
        <!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/plugins/retina/retina.min.js"></script>
        <script>
            $(function(){

                $("#login").click(function(){

                    usr = $("#username").val();
                    pas = $("#passwd").val();

                    if(usr.length < 5){
                        $("#username").focus();

                    }else if( pas.length == 0 ){

                        $("#passwd").focus()

                    }else{

                        $.post("proc_adds.php", {act: "admin_login", username: usr , passwd: pas}, 

                               function(data, status){

                            $("#repondre").html(data);

                        }); 
                    }  

                });

            });



        </script>

        <!-- JQUERY BACKSTRETCH JS -->
        <script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
        <script>
            /* $.backstretch("", {speed: 500});*/
        </script>


    </body>
</html>