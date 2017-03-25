<?php
	@session_start();
	
	if(@$_SESSION['l031n45'] == ''){
		
		include "redirect.php";
		$go = new redirect("c_login.php");
		die();
		
	}
	
	$id = "cpanel.php";
	include "admin_tools.php";
	$connect = true;
	include "main.php";
	
	$connection->num_rows("SELECT * FROM admin WHERE a_idnum='$_SESSION[u56_a_idnum]' AND paski='$_SESSION[u56_passwd]' ",true);
		
	if($_SESSION['num_rows'] <> 1){
		die("<center><h2><code style='color:#F00;'>Critical Error:</code><code style='color:green;'> ACCESS RIGHT VIOLATION!</code> </h2></center>");

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
        
		<title>UEAB | Room Reservation - Dashboard</title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- PLUGINS CSS -->
		<link href="assets/plugins/morris-chart/morris.min.css" rel="stylesheet">
		<link href="assets/plugins/c3-chart/c3.min.css" rel="stylesheet">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/custom.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
        <script src="assets/js/jquery.min.js"></script>
	</head>
 
	<body class="tooltips">
		
				
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
			<div class="top-navbar">
				<div class="top-navbar-inner">
					
					<!-- Begin Logo brand -->
					<div class="logo-brand">
						<a href="index.html"><img src="assets/img/sentir-logo-primary.png" alt="UEAB|Room Reservation"></a>
					</div><!-- /.logo-brand -->
					<!-- End Logo brand -->
					
					<div class="top-nav-content no-right-sidebar">
						
						<!-- Begin button sidebar left toggle -->
						<div class="btn-collapse-sidebar-left">
							<i class="fa fa-align-justify "></i>
						</div><!-- /.btn-collapse-sidebar-left -->
						<!-- End button sidebar left toggle -->
											
						
						<!-- Begin user session nav -->
						<ul class="nav-user navbar-right full">
							<li class="dropdown">
							  <a href="#notYet" class="dropdown-toggle" data-toggle="dropdown">
								<img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle" alt="Avatar">
                                                              
                                                                Hi, <strong style="text-transform: uppercase;"><?php  echo @htmlentities($_SESSION['l031n45']); ?></strong>
							  </a>
							  <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
                                                              <li ><a href="#notYet" style="text-decoration: line-through" >Change picture</a></li>
                                                              <li ><a href="#notYet" style="text-decoration: line-through">Change email</a></li>
                                                              <li ><a href="#notYet" style="text-decoration: line-through">Change password</a></li>
								<li class="divider"></li>
                                                                
                                                                <li><a href="proc_adds.php?act=logout">Log out</a></li>
							  </ul>
							</li>
						</ul>
						<!-- End user session nav -->
						
						<!-- Begin Collapse menu nav -->
						<div class=" collapse navbar-collapse" id="main-fixed-nav">
							<!-- Begin nav search form -->
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" id="asearch" class="form-control" placeholder="Search">
								</div>
							</form>
							<!-- End nav search form -->
                                                        
							
								
                                                                        
                                                </div><!-- /.navbar-collapse -->
						<!-- End Collapse menu nav -->
					</div><!-- /.top-nav-content -->
				</div><!-- /.top-navbar-inner -->
			</div><!-- /.top-navbar -->
			<!-- END TOP NAV -->
			
			
			
			<!-- BEGIN SIDEBAR LEFT -->
			<div class="sidebar-left sidebar-nicescroller">
				<ul class="sidebar-menu">
					<li><a href="cpanel.php"><i class="fa fa-dashboard icon-sidebar active selected "></i>Dashboard</a></li>
                    <li>

                    <a href="new_reservation.php"><i class="fa fa-home icon-sidebar"></i>
	                    <i class="fa fa-angle-right chevron-icon-sidebar"></i>
	                    RESIDENCE OCCUPANTS</a>
	                    <ul class="submenu">
							<?php
								$connection->query("SELECT * FROM residence", true);
								$query = $_SESSION['query'];
								while( $data = mysqli_fetch_array($query)){
									echo  "<li><a style='cursor:pointer;' onclick='doRes(".@$data['id'].");'> ".@$data['name']."</a></li>";
								}
							?>
						</ul>

                    </li>
                                        
					<li class="active selected">
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							SETTINGS
							
							</a>
						<ul class="submenu visible">
							<li><a onclick='doRes(3);'   >Picture</a></li>
							<li><a href="#link2">Email</a></li>
							<li><a href="#link3">Password</a></li>
						</ul>
					</li>
					
				</ul>
			</div><!-- /.sidebar-left -->
			<!-- END SIDEBAR LEFT -->
			
			
			
			
			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
			
				<div class="container-fluid">
				
				<!-- Begin page heading -->
                    <h1 class="page-heading "><small style="color: color:#666;"><strong style="color: #555;">ADMINISTRATOR</strong> >> DASHBOARD </small></h1>
				<!-- End page heading -->
				
				
					<!-- BEGIN ALERT -->
					<!-- 
					<div class="alert alert-info alert-bold-border fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <p><strong>Welcome residence administrator!</strong></p>
					  <p class="text-muted"> Please pick an action to take. </p>
					</div>
					 -->
					<!-- END  ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information fly-out-l"  onclick="residenceManagement();" style="cursor: pointer;">
								<i class="fa fa-room icon-bg"></i>
								<div class="tiles-inner text-center">
									<p></p>
									<h3 class="bolded">RESIDENCE MANAGEMENT</h3> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
									<p><small></small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->

						<div class="col-sm-3" >
							<div class="the-box no-border bg-primary tiles-information fly-out-l" onclick="roomManagement()" style="cursor: pointer;">
								<i class="fa fa-room icon-bg"></i>
								<div class="tiles-inner text-center">
                                    <p></p>
                                    <h3 class="bolded">ROOM MANAGEMENT</h3> 
                                    <div class="progress no-rounded progress-xs">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
									<p></p>
								</div><!-- /.tiles-inner -->
                            </div><!-- /.the-box no-border --><p></p>
						</div><!-- /.col-sm-3 -->
						
						<div class="col-sm-3 " >
							<div class="the-box no-border bg-danger tiles-information fly-out-l" onclick="reservantManagement()" style="cursor: pointer;">
								<i class="fa fa-user icon-bg"></i>
								<div class="tiles-inner text-center">
                                    <p></p>
                                    <h3 class="bolded">RESERVANT MANAGEMENT</h3> 
                                    <div class="progress no-rounded progress-xs">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
									<p></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3" >
							<div class="the-box no-border bg-warning tiles-information fly-out-l" onclick="systemConfiguration()" style="cursor: pointer;">
								<i class="fa fa-cog icon-bg"></i>
								<div class="tiles-inner text-center">
                                    <p></p>
                                    <h3 class="bolded">SYSTEM CONFIGURATION</h3> 
                                    <div class="progress no-rounded progress-xs">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
									<p></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
				
					
					<!-- SYSTEM OPTIONS GO HERE  -->
					<div id="pholder" class="alert center-block alert-bold-border fade in alert-dismissable col-lg-12 " style="height: auto;">
					<style>
						
					</style>
						<div id="system_options" style="padding-top: 0.5em;">
						<script>

							
                             
							</script>
						</div>
					</div>
					<!-- EO SYSTEM OPTIONS PANEL -->
					
				
				</div><!-- /.container-fluid -->
				
				
				
				<!-- BEGIN FOOTER -->
				<footer id="footer"></footer>
				<!-- END FOOTER -->
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
		

			
		
	
		
		
		
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
		
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
			
		<!-- EASY PIE CHART JS -->
		<script src="assets/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>
		
		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="assets/plugins/jquery-knob/knob.js"></script>


		<!-- MORRIS JS -->
		<script src="assets/plugins/morris-chart/raphael.min.js"></script>
		<script src="assets/plugins/morris-chart/morris.min.js"></script>
		
		<!-- MAIN APPS JS -->
		<script src="assets/js/apps.js"></script>
		<script src="assets/js/cpanel.min.js"></script>
		

	</body>
</html>