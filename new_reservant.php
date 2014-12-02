<?php


/* START THE USER SESSION IF NEED BE */
@session_start();	
	
	//IF THE USER IS AN ADMINISTRATOR LOG THEM IN AS ONE
	if(@$_SESSION['154dm1n']){
		include "redirect.php";
		$go = new redirect("cpanel.php");
		die();
	}
	
	//IF THE USER IS ALREADY LOGED IN, KEEP IT SO
	if(@$_SESSION['l031n45'] != ''){
		
		include 'redirect.php'; 
		$logedin = new redirect('panel.php');
		die();
	
	//OTHERWISE KEEP A LOG OF THE CURRENT PAGE
	}else if(!isset($_SESSION['currpage'])){
		
		$_SESSION['currpage'] = 'login.php';
		
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
        
		<title>UEAB | Room Reservation - New User</title>
 
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
			<img src="assets/img/logo-login.png" class="logo" alt="UEAB|Room Reservation">
		</div>
		<div class="login-wrapper" >
                    <div id="repondre"></div>
                    <div id="form">
				
                        <div class="form-group has-feedback lg left-feedback no-label">
				  <input type="text" class="form-control no-border input-lg rounded" id="name" placeholder="Full name" autofocus>
				  <span class="fa fa-male form-control-feedback" id="namef"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
                                    <input type="text" class="form-control no-border input-lg rounded" id="s_idnum" placeholder="School ID">
                                    <span class="fa fa-user form-control-feedback" id="s_idnumf"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
                                    <input type="email" class="form-control no-border input-lg rounded" id="email" placeholder="E-mail">
                                    <span class="fa fa-envelope form-control-feedback" id="emailf"></span>
                                </div>
                                 <div class="form-group has-feedback lg left-feedback no-label">
                                     <input type="text" class="form-control no-border input-lg rounded" id="tel" placeholder="Telephone Number +254....">
                                     <span class="fa fa-user form-control-feedback" id="telf"></span>
				</div>
                                <div class="form-group has-feedback lg left-feedback no-label">
                                    <select class="form-control no-border input-lg rounded" id="gender" >
                                      <option value=""> Gender 
                                      <option value="m"> Male   
                                      <option value="f"> Female
                                  </select>
                                    <span class="fa fa-user form-control-feedback" id="genderf"></span>
				</div>
				
				<div class="form-group has-feedback lg left-feedback no-label">
                                    <input type="password" class="form-control no-border input-lg" id="passwd" placeholder="Password">
                                    <span class="fa fa-lock form-control-feedback" id="passwdf"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
                                    <input type="password" class="form-control no-border input-lg rounded" id="passwd2" placeholder="re-enter password">
                                    <span class="fa fa-unlock form-control-feedback" id="passwd2f"></span>
				</div>
				<div class="form-group">
				  <div class="checkbox">
					<label class="inline-popups">
                                            <input type="checkbox" class="i-yellow-flat" checked disabled> I accept <a href="#" data-effect="mfp-zoom-in">Terms and conditions</a>
					</label>
				  </div>
				</div>
				<div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-lg btn-perspective btn-block" id="register">REGISTER</button>
				</div>

                        
                        
                        
                    </div>
                    
                  
                    
                    
				

                    
			<p class="text-center"><strong><a href="new_password.php">Forgot your password?</a></strong></p>
			<p class="text-center">or</p>
			<p class="text-center"><strong><a href="login.php">Login</a></strong></p>
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
                <script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>

               
                
                <script>
                  $(function(){                   
                      
                      $("#register").click(function(){
                                               
                          nom = $("#name").val();
                          pas = $("#passwd").val();
                          pas2 = $("#passwd2").val();
                          tele = $("#tel").val();
                          gend = $("#gender").val();
                          sid = $("#s_idnum").val();
                          emol = $("#email").val();
                          ax = "new_reservant";        
                          
                          if(nom.length < 7){
                              
                              $("#name").focus();
                              $("#name").addClass("bg-warning");
                          
                          }else if( pas.length < 5 ){
                              
                              $("#passwd").focus()
                              $("#passwd").addClass("bg-warning")
                              
                          }else if(pas2 != pas){ 
                              
                              $("#passwd2").val(" ")
                              $("#passwd2").focus()
                              $("#passwd2").addClass("bg-warning")
                              
                          }else if( tele.length  < 10 ){
                              
                              $("#tel").focus();
                              $("#tel").addClass("bg-warning")
                              
                            }else if(gend.length == 0){
                              
                               $("#gend").focus()
                               $("#gend").addClass("bg-warning")
                               
                         }else if( sid.length < 10 ){
                               
                               $("#s_idnum").focus()
                               $("#s_idnum").addClass("bg-warning")
                               
                          }else if( emol.length == 0 ){
                          
                                $("#emol").focus();
                                $("#emol").addClass("bg-warning")
                          
                          }else{
                                                      
                            $.post("proc_adds.php", {act: ax, name: nom, s_idnum: sid, email: emol, tel: tele, passwd: pas, passwd2: pas2, gender: gend }, 
			
                            function(data, status){
                                    
                                    $("#repondre").html(data);
                                    $("#modal").modal("show");

                            }); 
                        }  
                            
                    });
                    
                });
                      
              
                    
                </script>
		  
		<!-- JQUERY BACKSTRETCH JS -->
		
		<script>
			/* $.backstretch("", {speed: 500});*/
		</script>
		
		
	</body>
</html>

