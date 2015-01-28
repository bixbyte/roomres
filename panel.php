<?php
       
        $id = "panel.php";
       @session_start();
	
	if(@$_SESSION['l031n45'] == ''){
		
		include "redirect.php";
		$go = new redirect("proc_adds.php?act=logout");
		die();
		
	}
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
        
		<title>UEAB | Room Reservation - Dashboard</title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- PLUGINS CSS -->
		<link href="assets/plugins/weather-icon/css/weather-icons.min.css" rel="stylesheet">
		<link href="assets/plugins/prettify/prettify.min.css" rel="stylesheet">
		<link href="assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.theme.min.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.transitions.min.css" rel="stylesheet">
		<link href="assets/plugins/chosen/chosen.min.css" rel="stylesheet">
		<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet">
		<link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/validator/bootstrapValidator.min.css" rel="stylesheet">
		<link href="assets/plugins/summernote/summernote.min.css" rel="stylesheet">
		<link href="assets/plugins/markdown/bootstrap-markdown.min.css" rel="stylesheet">
		<link href="assets/plugins/datatable/css/bootstrap.datatable.min.css" rel="stylesheet">
		<link href="assets/plugins/morris-chart/morris.min.css" rel="stylesheet">
		<link href="assets/plugins/c3-chart/c3.min.css" rel="stylesheet">
		<link href="assets/plugins/slider/slider.min.css" rel="stylesheet">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
                <link href="assets/css/custom.css" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
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
									<input type="text" id="search" class="form-control" placeholder="search for person">
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
				<ul class="sidebar-menu ">
					<li><a href="#"><i class="fa fa-dashboard icon-sidebar active selected "></i>Dashboard</a></li>
                                        <li><a href="new_reservation.php"><i class="fa fa-home icon-sidebar"></i>RESERVE</a></li>
                                        <li><a href="history.php"><i class="fa fa-clock-o icon-sidebar"></i>HISTORY</a></li>
                                        <li><a href="#"><i class="fa fa-comment icon-sidebar"></i>REQUEST</a></li>
					<li class="active selected">
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							SETTINGS
							
							</a>
						<ul class="submenu visible">
							<li><a href="#link1">Picture</a></li>
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
                                <h1 class="page-heading ">DASHBOARD <small>| <?php echo @htmlentities(strtoupper($_SESSION['l031n45'])); ?> </small></h1>
				<!-- End page heading -->
<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
	//Get the User's vital information and store them in session variables
        
	$connect = true;
	include("main.php");
	
	$connection->query("SELECT * FROM reservants WHERE s_idnum='$_SESSION[l031n45]' ",true);
	
	$arraydets = $_SESSION['query'];
	
	while($res = mysqli_fetch_array($arraydets)){
		$_SESSION['u56_id'] 		= $res['id'];
		$_SESSION['u56_name'] 		= $res['name'];
		$_SESSION['u56_s_idnum'] 	= $res['s_idnum'];
		$_SESSION['u56_email'] 		= $res['email'];
		$_SESSION['u56_rnum'] 		= $res['rnum'];
		$_SESSION['u56_res']		= $res['res'];
		$_SESSION['u56_tel'] 		= $res['tel'];
		$_SESSION['u56_passwd'] 	= $res['passwd'];
		$_SESSION['u56_gender'] 	= $res['gender'];
	} 
	
	
	//Display  all residences.
	
	$connection->query("SELECT * FROM residence WHERE gender='$_SESSION[u56_gender]' OR gender='a' ORDER BY id DESC ",true);
	$residencesss = $_SESSION['query'];
?>				
					<!-- BEGIN ALERT -->
					<div class="alert alert-success alert-bold-border fade in alert-dismissable" >
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          <p><strong>Personal Details</strong></p>
                                          <table width="100%" class="table table-striped ">
                                              <thead>
                                                  <tr>
                                                    <td width="30%" class="text-muted">Name</td>
                                                    <td width="30%" class="text-muted">Identification Number</td>
                                                    <td width="30%" class="text-muted">Email address </td>
                                                  </tr>
                                              </thead>
                                              <tr>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_name']); ?></a></td>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_s_idnum']); ?></a> </td>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_email']); ?></a></td>
                                              </tr>
                                          </table>
					</div>
					<!-- END  ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information fly-out-l">
								<i class="fa fa-home icon-bg "></i>
								<div class="tiles-inner text-center ">
									<p>RESIDENCE</p>
									<h3 class="bolded">
                                                                            <?php 
		 
                                                                                if(@$_SESSION['u56_res'] != '' && @$_SESSION['u56_res'] != 0 ){ 
                                                                                        $connection->query("SELECT name FROM residence WHERE id='$_SESSION[u56_res]' LIMIT 1",true);
                                                                                        $conres = $_SESSION['query'];
                                                                                        while($resnom = mysqli_fetch_array($conres)){
                                                                                                echo @htmlentities($resnom['name']);
                                                                                        }
                                                                                }else{
                                                                                         echo "n/a";
                                                                                }
                                                                            ?>
                                                                        </h3> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-primary tiles-information fly-out-l">
								<i class="fa fa-home icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>ROOM NUMBER</p>
									<h2 class="bolded">
                                                                            <?php 
                                                                                if(@$_SESSION['u56_rnum'] != '' && @$_SESSION['u56_rnum'] != 0 ){ 
                                                                                    print htmlentities(@$_SESSION['u56_rnum']); 
                                                                                }else{ 
                                                                                    echo "n/a";
                                                                                } 
                                                                            ?></h2> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-danger tiles-information fly-out-l">
								<i class="fa fa-home icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TRIMESTER</p>
									<h3 class="bolded"><?php echo @htmlentities($_SESSION['trim_name']); ?></h3> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-warning tiles-information fly-out-l">
								<i class="fa fa-users icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>CAPACITY</p>
									<h2 class="bolded">
                                                                            <?php
                                                                                if(@$_SESSION['u56_res'] != '' && @$_SESSION['u56_res'] != 0 && @$_SESSION['u56_rnum'] != '' ){ 
                                                                                    
                                                                                    $connection->query("SELECT curr_capacity,max_capacity FROM rooms WHERE residence='".@$_SESSION['u56_res']."' AND r_number='".@$_SESSION['u56_rnum']."' LIMIT 1 ",true);
                                                                                    $roomData = $_SESSION['query'];
                                                                                         while($roomDet = mysqli_fetch_array($roomData)){

                                                                                            echo $roomDet['curr_capacity']."/".$roomDet['max_capacity'];
                                                                                        }
                                                                                    
                                                                                    
                                                                                }else{
                                                                                    echo "n/a";
                                                                                }
                                                                             ?>
                                                                        </h2> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
				
								

					<!-- BEGIN CAROUSEL ITEM -->
            <h4 class="small-heading more-margin-bottom text-center">ROOM MATES</h4>
					<div class="the-box darker no-border">
					
						<div id="store-item-carousel-3" class="owl-carousel shop-carousel">
							
                             <?php
                                $connection->query("SELECT name,tel,s_idnum FROM reservants WHERE rnum='$_SESSION[u56_rnum]' AND res='$_SESSION[u56_res]' AND actif='1' AND (rnum <> 0 AND res <> 0) ORDER BY name ", true);
                                $rmate = $_SESSION['query'];

                                while($mate = mysqli_fetch_array($rmate)){

                                                    if(@strtoupper($mate['s_idnum']) != @strtoupper($_SESSION['l031n45'])){	
                                                        
                                                           
                                                            
                                                            echo ' <div class="item ">
								                                        <!-- BEGIN USER CARD LONG -->
							                                            <div class="the-box bg-white fly-out-l round text-center no-border">
								                                            <div class="media user-card-sm">
								  
								                                              <div class="media-body">
									                                            <h4 class="media-heading">'.@htmlentities(strtoupper($mate['name'])).'</h4>
									                                            <p class=" text-danger">'.@htmlentities($mate['tel']).'</p>
								                                              </div>
								  
								                                            </div>
							                                            </div><!-- /.the-box .no-border -->
							                                            <!-- BEGIN USER CARD LONG -->
							                                        </div><!-- /.item -->';
                                                            
                                                    }

                                }
                            ?>



                             
						</div><!-- /#store-item-carousel-1 -->
					</div><!-- /.the-box .no-border -->
					<!-- END CAROUSEL ITEM -->
					
										
					
				
				</div><!-- /.container-fluid -->
				
				
				
				<!-- BEGIN FOOTER -->
				<footer id="footer">
					
				</footer>
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
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		<script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
               
		<!-- PLUGINS -->
		<script src="assets/plugins/skycons/skycons.js"></script>
		<script src="assets/plugins/prettify/prettify.js"></script>
		<script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
		<script src="assets/plugins/icheck/icheck.min.js"></script>
		<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="assets/plugins/mask/jquery.mask.min.js"></script>
		<script src="assets/plugins/validator/bootstrapValidator.min.js"></script>
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/bootstrap.datatable.js"></script>
		<script src="assets/plugins/summernote/summernote.min.js"></script>
		<script src="assets/plugins/markdown/markdown.js"></script>
		<script src="assets/plugins/markdown/to-markdown.js"></script>
		<script src="assets/plugins/markdown/bootstrap-markdown.js"></script>
		<script src="assets/plugins/slider/bootstrap-slider.js"></script>
		
		<!-- EASY PIE CHART JS -->
		<script src="assets/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>
		
		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="assets/plugins/jquery-knob/knob.js"></script>

		<!-- FLOT CHART JS -->
		<script src="assets/plugins/flot-chart/jquery.flot.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.tooltip.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>

		<!-- MORRIS JS -->
		<script src="assets/plugins/morris-chart/raphael.min.js"></script>
		<script src="assets/plugins/morris-chart/morris.min.js"></script>
		
		<!-- C3 JS -->
		<script src="assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8"></script>
		<script src="assets/plugins/c3-chart/c3.min.js"></script>
		
		<!-- MAIN APPS JS -->
		<script src="assets/js/apps.js"></script>
		
	</body>
</html>