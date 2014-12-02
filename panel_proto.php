<?php
	@session_start();
	
	if(@$_SESSION['l031n45'] == ''){
		
		include "redirect.php";
		$go = new redirect("login.php");
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
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="tooltips">
		
		<!-- BEGIN PANEL COLOR SWITCH -->
		<div class="box-demo">
			<div class="inner-panel">
				<div class="cog-panel" id="demo-panel"><i class="fa fa-cog fa-spin"></i></div>
				<p class="text-muted small text-center">COLOR SCHEMES</p>
				<div class="row text-center">
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Default" id="color-reset">
							<div class="half-tiles bg-dark"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Light" id="change-color-light">
							<div class="half-tiles bg-white"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Primary dark" id="change-primary-dark">
							<div class="half-tiles bg-primary"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Info dark" id="change-info-dark">
							<div class="half-tiles bg-info"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Success dark" id="change-success-dark">
							<div class="half-tiles bg-success"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Danger dark" id="change-danger-dark">
							<div class="half-tiles bg-danger"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Warning dark" id="change-warning-dark">
							<div class="half-tiles bg-warning"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Primary light" id="change-primary-light">
							<div class="half-tiles bg-primary"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Info light" id="change-info-light">
							<div class="half-tiles bg-info"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Success light" id="change-success-light">
							<div class="half-tiles bg-success"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Danger light" id="change-danger-light">
							<div class="half-tiles bg-danger"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Warning light" id="change-warning-light">
							<div class="half-tiles bg-warning"></div>
							<div class="half-tiles bg-white"></div>
						</div>
					</div>
				</div>
				<button class="btn btn-block btn-primary btn-sm" id="btn-reset">Reset to default</button>
			</div>
		</div>
		<!-- END PANEL COLOR SWITCH -->
	
		
		
		
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
									<input type="text" id="search" class="form-control" placeholder="Search">
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
				<h1 class="page-heading ">DASHBOARD <small></small></h1>
				<!-- End page heading -->
				
					<!-- BEGIN ALERT -->
					<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <p><strong>Welcome!</strong></p>
					  <p class="text-muted">You probably here cause wanna know how is <a class="alert-link" href="#fakelink">Sentir UI kits template</a>, or you have purchased it. But whatever! I just wanna 
					  say thank you for viewing or purchasing my work. And let me know your feedback! <i class="fa fa-smile-o"></i></p>
					</div>
					<!-- END  ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information">
								<i class="fa fa-users icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY VISITORS</p>
									<h1 class="bolded">12,254K</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 7,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-primary tiles-information">
								<i class="fa fa-shopping-cart icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY SALES</p>
									<h1 class="bolded">521</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 10,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-danger tiles-information">
								<i class="fa fa-comments icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY FEEDBACK</p>
									<h1 class="bolded">124</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Less than yesterday ( <span class="text-danger">-7,5%</span> )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-warning tiles-information">
								<i class="fa fa-money icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY EARNINGS</p>
									<h1 class="bolded">10,241</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 2,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
				
					
					<div class="row">
						<div class="col-lg-8">
							
							<!-- BEGIN CHART WIDGET 1 -->
							<div class="panel panel-info panel-no-border panel-square">
							  <div class="panel-heading">
								<div class="right-content">
									<div class="btn-group">
										<button class="btn btn-info btn-sm active">
										Lifetime
										</button>
										<button class="btn btn-info btn-sm">
										This year
										</button>
									</div>
								</div>
								<h3 class="panel-title">EARNINGS AND SALES CHART</h3>
							  </div><!-- /.panel-heading -->
								<div class="the-box no-border full no-margin">
									<div class="the-box no-border bg-info no-margin full">
										<div id="morris-widget-1" style="height: 250px;"></div>
									</div><!-- the-box no-border bg-info no-margin full -->
									<div class="the-box no-border bg-dark no-margin chart-des">
										<div class="row">
											<div class="col-xs-7">
												<h3 class="bolded">LAST YEAR</h3>
												<p>Today May 20 2014</p>
											</div><!-- /.col-xs-7 -->
											<div class="col-xs-5 text-right">
												<h3 class="bolded text-success">+805.00</h3>
												<p>-10,1(11%)</p>
											</div><!-- /.col-xs-5 -->
										</div><!-- /.row -->
									</div><!-- the-box no-border bg-dark no-margin -->
									<div class="the-box no-border no-margin">
										<div class="row">
											<div class="col-xs-7">
												<h1 class="bolded">50,024K</h1>
												<p class="text-muted">Lifetime earnings</p>
											</div><!-- /.col-xs-5 -->
											<div class="col-xs-5">
												<div id="morris-widget-2" style="height: 120px;"></div>
											</div><!-- /.col-xs-5 -->
										</div><!-- /.row -->
									</div><!-- the-box no-border no-margin -->
								</div><!-- /.the-box no-border .full -->
							</div><!-- /.the-box no-border .full -->
							<!-- END CHART WIDGET 1 -->
							
							<hr />
							<div class="row">
								<div class="col-sm-6">
									<!-- BEGIN PROPERTY CARD -->
									<div class="panel panel-danger panel-square panel-no-border task-list-wrap">
									  <div class="panel-heading lg text-center">
										<h3 class="panel-title">SPECIAL OFFERS</h3>
									  </div>
										<div class="the-box full no-border property-card">
											<div id="property-slide-8" class="owl-carousel">
											  <div class="item full"><img src="assets/img/photo/small/img-15.jpg" alt="Image"></div>
											  <div class="item full"><img src="assets/img/photo/small/img-16.jpg" alt="Image"></div>
											  <div class="item full"><img src="assets/img/photo/small/img-17.jpg" alt="Image"></div>
											</div>
											<div class="the-box no-margin no-border bg-warning">
												<div class="row">
													<div class="col-xs-3">
														<p class="property-type-circle bg-danger">RENT</p>
													</div><!-- /.col-xs-3 -->
													<div class="col-xs-9">
														<h1>&#36;750/Wk</h1>
														<p>Bond : &#36;3,000</p>
													</div><!-- /.col-xs-9 -->
												</div><!-- /.row -->
											</div><!-- /.the-box .no-margin .no-border .bg-warning -->
											<div class="the-box no-margin no-border">
												<p class="property-detail-wrap">
													<span class="item-detail"><i class="fa fa-inbox"></i> 2 bedroom</span>
													<span class="item-detail"><i class="fa fa-male"></i> 2 bathroom</span>
												</p>
												<p class="has-margin text-center">
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
												</p>
												<div class="row">
													<div class="col-xs-6">
														<button class="btn btn-danger btn-block">Favorite</button>
													</div><!-- /.col-xs-6 -->
													<div class="col-xs-6">
														<button class="btn btn-success btn-block">Apply rent</button>
													</div><!-- /.col-xs-6 -->
												</div><!-- /.row -->
											</div><!-- /.the-box .no-margin .no-border .bg-warning -->
										</div><!-- /.the-box no-margin -->
									</div><!-- /.panel panel-danger panel-no-border panel-square task-list-wrap -->
									<!-- END PROPERTY CARD -->
								</div><!-- /.col-sm-6 -->
								<div class="col-sm-6">
									<!-- BEGIN TASK LIST -->
									<div class="panel panel-success panel-square panel-no-border task-list-wrap">
									  <div class="panel-heading lg">
										<h3 class="panel-title"><i class="fa fa-check-square-o"></i> Your current tasks</h3>
									  </div>
										<ul class="list-group">
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-1">
													<label for="task-1">Eating woods</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-2" checked />
													<label for="task-2">Washing my pets</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-3" checked />
													<label for="task-3">Uploading selfie photos</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-4" checked />
													<label for="task-4">Downloading movie</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-5">
													<label for="task-5">Updating my <i>alay</i> status</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-6" checked />
													<label for="task-6">Hunting cabe-cabean</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-7">
													<label for="task-7">Creating web template</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-8" checked />
													<label for="task-8">Walking to Malioboro</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-9" checked />
													<label for="task-9">Listening Alay songs</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-10" />
													<label for="task-10">Being an elite author</label>
											</div><!-- /.checkbox -->
										  </li>
										</ul>
									  <div class="panel-footer">
										<p><button class="btn btn-danger btn-perspective btn-block">See all tasks</button></p>
									  </div>
									</div><!-- /.panel panel-success -->
									<!-- END TASK LIST -->
								</div><!-- /.col-sm-6 -->
							</div><!-- /.row -->
							
						</div><!-- /.col-sm-8 -->
						<div class="col-lg-4">
						
							<!-- BEGIN WEATHER WIDGET 3 -->
							<div class="the-box no-border" id="weather-widget-1">
								<h4 class="text-center bolded white-text">YOGYAKARTA, ID</h4>
								<p class="text-center white-text">TONIGHT</p>
								<div class="weather-widget">
									<div class="row">
										<div class="col-xs-6 text-center">
											<canvas id="sleet" width="140" height="140"></canvas>
										</div><!-- /.col-xs-6 -->
										<div class="col-xs-6">
											<h1 class="bolded degrees white-text">28<i class="wi-degrees"></i></h1>
											<p class="white-text">Will rain at night</p>
										</div><!-- /.col-xs-6 -->
									</div><!-- /.row -->
								</div><!-- /.weather-widget -->
								<div class="row">
									<div class="col-xs-4 text-center">
									<h4 class="white-text">SAT</h4>
									<canvas id="clear-night" width="50" height="50"></canvas>
									<h4 class="bolded white-text">27<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
									<div class="col-xs-4 text-center">
									<h4 class="white-text">SUN</h4>
									<canvas id="fog" width="50" height="50"></canvas>
									<h4 class="bolded white-text">26<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
									<div class="col-xs-4 text-center">
									<h4 class="white-text">MON</h4>
									<canvas id="snow" width="50" height="50"></canvas>
									<h4 class="bolded white-text">15<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
								</div><!-- /.row -->
							</div><!-- /.the-box bg-info no-border -->
							<!-- END WEATHER WIDGET 2 -->
							
							<!-- BEGIN SOCIAL TILES -->
							<div class="row">
								<div class="col-xs-6">
									<div class="tiles facebook-tile text-center">
										<i class="fa fa-facebook icon-lg-size"></i>
										<h4><a href="#fakelink">10K likes</a></h4>
									</div><!-- /.tiles .facebook-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles twitter-tile text-center">
										<i class="fa fa-twitter icon-lg-size"></i>
										<h4><a href="#fakelink">2K followers</a></h4>
									</div><!-- /.tiles .twitter-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles dribbble-tile text-center">
										<i class="fa fa-dribbble icon-lg-size"></i>
										<h4><a href="#fakelink">1K followers</a></h4>
									</div><!-- /.tiles .dribbble-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles linkedin-tile text-center">
										<i class="fa fa-linkedin icon-lg-size"></i>
										<h4><a href="#fakelink">1K followers</a></h4>
									</div><!-- /.tiles .dribbble-tile -->
								</div><!-- /.col-xs-6 -->
							</div><!-- /.row -->
							<!-- END SOCIAL TILES -->
							
							
							<h4 class="small-title"><strong><i class="fa fa-users"></i> FRIEND REQUESTS</strong></h4>
							
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box bg-success no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-9.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Mya Weastell</h4>
									<p class="text-success">@myaweastell</p>
								  </div>
								  <div class="right-button">
									<button data-toggle="tooltip" title="Accepted" class="btn btn-success active"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
							
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Elizabeth Owens</h4>
									<p class="text-info">@elizabethowens</p>
								  </div>
								  <div class="right-button">
									<button data-toggle="tooltip" title="Accept" class="btn btn-info"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
									
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-6.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Harold Chavez</h4>
									<p class="text-info">@haroldchaves</p>
								  </div>
								  <div class="right-button">
									<button data-toggle="tooltip" title="Accept" class="btn btn-info"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
							
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					
					
					<div class="row">
						<div class="col-lg-4 col-md-12">
							
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-12">
									
									<!-- BEGIN HEADLINE NEWS TILES -->
									<div class="the-box bg-warning no-border full">
										<div id="tiles-slide-2" class="owl-carousel tiles-carousel">
										  <div class="item full">
											<img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">02 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-14.jpg" alt="Image">
										  </div><!-- /.item full -->
										  <div class="item full">
											<img src="assets/img/avatar/avatar-2.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">01 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-12.jpg" alt="Image">
										  </div><!-- /.item full -->
										  <div class="item full">
											<img src="assets/img/avatar/avatar-3.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">29 APRIL, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-13.jpg" alt="Image">
										  </div><!-- /.item full -->
										</div><!-- /#tiles-slide-2 -->
									</div><!-- /.the-box no-border full -->
									<!-- END HEADLINE NEWS TILES -->
									
								</div><!-- /.col-sm-6 col-md-12 -->
								<div class="col-sm-6 col-md-6 col-lg-12">
									
									<!-- BEGIN HEADLINE NEWS TILES -->
									<div class="the-box no-border bg-info full">
										<div id="tiles-slide-3" class="owl-carousel tiles-carousel-color">
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@parishawker</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">02 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-2.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@thomaswhite</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">01 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-3.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@doinaslaivici</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">29 APRIL, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										</div><!-- /#tiles-slide-2 -->
									</div><!-- /.the-box no-border full -->
									<!-- END HEADLINE NEWS TILES -->
									
								</div><!-- /.col-sm-6 col-md-12 -->
							</div><!-- /.row -->
						</div><!-- /.col-lg-4 col-md-12 -->
						
						<div class="col-lg-8 col-md-12">
						
							<!-- BEGIN SERVER STATUS WIDGET -->
							<div class="panel panel-success panel-square panel-no-border">
							  <div class="panel-heading lg">
								<div class="right-content">
									<button class="btn btn-success to-collapse" data-toggle="collapse" data-target="#panel-chart-widget-1"><i class="fa fa-chevron-up"></i></button>
								</div>
								<h3 class="panel-title"><strong>YOUR SERVER STATUS</strong></h3>
							  </div>
								<div id="panel-chart-widget-1" class="collapse in">
									<div class="the-box no-border full bg-success no-margin">
										<div id="realtime-chart-widget">
											<div id="realtime-chart-container-widget"></div>
										</div><!-- /.realtime-chart -->
									</div><!-- /.the-box .no-border -->
									<div class="the-box no-border">
										<div class="row">
											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-6 text-center">
														<h4 class="small-heading">Kernel memory</h4>
														<span class="chart chart-widget-pie widget-easy-pie-1" data-percent="45">
															<span class="percent"></span>
														</span>
													</div><!-- /.col-xs-6 -->
													<div class="col-xs-6 text-center">
														<h4 class="small-heading">Physical memory</h4>
														<span class="chart chart-widget-pie widget-easy-pie-2" data-percent="85">
															<span class="percent"></span>
														</span>
													</div><!-- /.col-xs-6 -->
												</div><!-- /.row -->
												<hr />
												<button class="btn btn-block btn-danger"><i class="fa fa-cogs"></i> Resource monitor</button>
											</div><!-- /.col-sm-6 -->
											<div class="col-sm-6">
												<h4 class="small-heading">System status</h4>
												<p class="small">Handles - <span class="text-danger">80%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												  </div><!-- /.progress-bar .progress-bar-danger -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Threads - <span class="text-warning">65%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
												  </div><!-- /.progress-bar .progress-bar-warning -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Proccess - <span class="text-success">40%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												  </div><!-- /.progress-bar .progress-bar-success -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Cached - <span class="text-info">70%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												  </div><!-- /.progress-bar .progress-bar-info -->
												</div><!-- /.progress .no-rounded -->
											</div><!-- /.col-sm-6 -->
										</div><!-- /.row -->
									</div><!-- /.the-box .no-border -->
								</div><!-- /#panel-chart-widget-1 -->
							</div><!-- /.the-box .no-border -->
							<!-- END SERVER STATUS WIDGET -->
						</div>
					</div><!-- /.row -->
					
					
					
					<h4 class="text-center small-heading more-margin-bottom">YOUR FAVORITE PLACES WEATHER</h4>
					
					<div class="row">
						<div class="col-sm-3">
							<!-- BEGIN WEATHER WIDGET 4 -->
							<div class="the-box no-border full text-center">
								<div class="the-box no-border bg-warning no-margin">
									<canvas id="clear-day" width="140" height="140"></canvas>
									<h1 class="bolded less-distance">27<i class="wi-degrees"></i></h1>
									<h4>It's sunny</h4>
								</div><!-- /.the-box no-border bg-warning no-margin -->
								<div class="the-box no-border no-margin">
									<h4 class="bolded less-distance">BOYOLALI, ID</h4>
									<p class="small text-muted">My hometown</p>
								</div><!-- /.the-box no-border no-margin -->
							</div><!-- /.the-box .no-border .full -->
							<!-- END WEATHER WIDGET 4 -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<!-- BEGIN WEATHER WIDGET 4 -->
							<div class="the-box no-border full text-center">
								<div class="the-box no-border bg-danger no-margin">
									<canvas id="rain" width="140" height="140"></canvas>
									<h1 class="bolded less-distance">27<i class="wi-degrees"></i></h1>
									<h4>It's raining</h4>
								</div><!-- /.the-box no-border bg-danger no-margin -->
								<div class="the-box no-border no-margin">
									<h4 class="bolded less-distance">PARIS, FRANCE</h4>
									<p class="small text-muted">My dream city</p>
								</div><!-- /.the-box no-border no-margin -->
							</div><!-- /.the-box .no-border .full -->
							<!-- END WEATHER WIDGET 4 -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<!-- BEGIN WEATHER WIDGET 4 -->
							<div class="the-box no-border full text-center">
								<div class="the-box no-border bg-success no-margin">
									<canvas id="wind" width="140" height="140"></canvas>
									<h1 class="bolded less-distance">27<i class="wi-degrees"></i></h1>
									<h4>It's wind</h4>
								</div><!-- /.the-box no-border bg-success no-margin -->
								<div class="the-box no-border no-margin">
									<h4 class="bolded less-distance">MECCA, KSA</h4>
									<p class="small text-muted">Someday I'll be there</p>
								</div><!-- /.the-box no-border no-margin -->
							</div><!-- /.the-box .no-border .full -->
							<!-- END WEATHER WIDGET 4 -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<!-- BEGIN WEATHER WIDGET 4 -->
							<div class="the-box no-border full text-center">
								<div class="the-box no-border bg-primary no-margin">
									<canvas id="partly-cloudy-night" width="140" height="140"></canvas>
									<h1 class="bolded less-distance">27<i class="wi-degrees"></i></h1>
									<h4>Cloudy night</h4>
								</div><!-- /.the-box no-border bg-primary no-margin -->
								<div class="the-box no-border no-margin">
									<h4 class="bolded less-distance">TOKYO, JAPAN</h4>
									<p class="small text-muted">I just wanna visit</p>
								</div><!-- /.the-box no-border no-margin -->
							</div><!-- /.the-box .no-border .full -->
							<!-- END WEATHER WIDGET 4 -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					
					
					<!-- BEGIN CAROUSEL ITEM -->
					<div class="the-box no-border">
					<h4 class="small-heading more-margin-bottom text-center">LAST WEEK POPULAR ITEM</h4>
						<div id="store-item-carousel-3" class="owl-carousel shop-carousel">
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-1.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-2.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-3.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-4.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-5.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-6.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-1.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-2.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-3.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
							<div class="item">
								<div class="media">
									<a class="pull-left" href="#fakelink">
									  <img class="media-object sm" src="assets/img/shop/img-shop-4.jpg" alt="Image">
									</a>
									<div class="media-body">
									  <h4 class="media-heading"><a href="#fakelink">Product name here</a></h4>
									  <p class="brand">BRAND NAME</p>
									  <p class="price text-danger"><strong>&#36;50.00</strong></p>
									</div>
								</div>
							</div><!-- /.item -->
						</div><!-- /#store-item-carousel-1 -->
					</div><!-- /.the-box .no-border -->
					<!-- END CAROUSEL ITEM -->
					
					
					
					<div class="row">
						<div class="col-sm-8">
							
							<!-- BEGIN ITEM SHOWCASE -->
							<div class="the-box full no-border item-lg">
								<div id="store-item-carousel-2" class="owl-carousel">
								  <div class="item full"><img src="assets/img/photo/large/img-7.jpg" class="item-image" alt="Image"></div>
								  <div class="item full"><img src="assets/img/photo/large/img-8.jpg" class="item-image" alt="Image"></div>
								</div>
								<div class="item-des">
									<div class="the-box transparent no-margin">
									<h4 class="small-heading more-margin-bottom">FEATURED PRODUCT</h4>
										<h1><a href="#fakelink">You product name here</a></h1>
										<h4 class="bolded">&#36;220.00</h4>
										<p class="text-muted item-des-text">
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<p>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</p>
										<button class="btn btn-success btn-block btn-add">Add to cart</button>
									</div><!-- /.the-box .transparent .no-margin -->
								</div><!-- /.item-des -->
							</div><!-- /.the-box .full -->
							<!-- END ITEM SHOWCASE -->
							
						</div><!-- /.col-sm-8 -->
						<div class="col-sm-4">
							
							<!-- BEGIN REMINDER WIDGET -->
							<div class="the-box no-border full">
								<div class="the-box bg-dark no-border no-margin">
									<p class="text-center"><i class="fa fa-clock-o icon-lg"></i></p>
									<h4 class="bolded less-distance text-danger text-center">My personal reminder</h4>
								</div><!-- /.the-box no-border no-margin -->
								<div class="the-box no-border bg-danger no-margin">
								<h4>Next week agenda</h4>
								<hr />
									<div id="tiles-slide-1" class="owl-carousel my-reminder">
									  <div class="item full text-left">
										<p>
										Eating some sand and listening alay songs in the small hole under bridge
										</p>
										<p class="small">Wrote about a month ago</p>
									  </div>
									  <div class="item full">
										<p>
										Go to school again, do homework again, meet some best friends again
										</p>
										<p class="small">Wrote about a week ago</p>
									  </div>
									  <div class="item full">
										<p>
										Finishing all my works, time to vacation, spending time with family and friends
										</p>
										<p class="small">Wrote 2 days ago</p>
									  </div>
									</div><!-- /#tiles-slide-1 -->
								</div><!-- /.the-box no-border bg-danger no-margin -->
							</div><!-- /.the-box .no-border .full -->
							<!-- END REMINDER WIDGET -->
							
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->

<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>Engine version</th>
									<th>CSS grade</th>
								</tr>
							</thead>
							<tbody>
								<tr class="odd gradeX">
									<td>Trident</td>
									<td>Internet
										 Explorer 4.0</td>
									<td>Win 95+</td>
									<td class="center"> 4</td>
									<td class="center">X</td>
								</tr>
								<tr class="even gradeC">
									<td>Trident</td>
									<td>Internet
										 Explorer 5.0</td>
									<td>Win 95+</td>
									<td class="center">5</td>
									<td class="center">C</td>
								</tr>
								<tr class="odd gradeA">
									<td>Trident</td>
									<td>Internet
										 Explorer 5.5</td>
									<td>Win 95+</td>
									<td class="center">5.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="even gradeA">
									<td>Trident</td>
									<td>Internet
										 Explorer 6</td>
									<td>Win 98+</td>
									<td class="center">6</td>
									<td class="center">A</td>
								</tr>
								<tr class="odd gradeA">
									<td>Trident</td>
									<td>Internet Explorer 7</td>
									<td>Win XP SP2+</td>
									<td class="center">7</td>
									<td class="center">A</td>
								</tr>
								<tr class="even gradeA">
									<td>Trident</td>
									<td>AOL browser (AOL desktop)</td>
									<td>Win XP</td>
									<td class="center">6</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.5</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 2.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 3.0</td>
									<td>Win 2k+ / OSX.3+</td>
									<td class="center">1.9</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.0</td>
									<td>OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.5</td>
									<td>OSX.3+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape 7.2</td>
									<td>Win 95+ / Mac OS 8.6-9.2</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Browser 8</td>
									<td>Win 98SE+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Navigator 9</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.1</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.2</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.2</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.3</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.4</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.4</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.5</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.6</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.6</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.7</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.8</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Seamonkey 1.1</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Epiphany 2.20</td>
									<td>Gnome</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.2</td>
									<td>OSX.3</td>
									<td class="center">125.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.3</td>
									<td>OSX.3</td>
									<td class="center">312.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 2.0</td>
									<td>OSX.4+</td>
									<td class="center">419.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 3.0</td>
									<td>OSX.4+</td>
									<td class="center">522.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>OmniWeb 5.5</td>
									<td>OSX.4+</td>
									<td class="center">420</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>iPod Touch / iPhone</td>
									<td>iPod</td>
									<td class="center">420.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>S60</td>
									<td>S60</td>
									<td class="center">413</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.0</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.0</td>
									<td>Win 95+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.2</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.5</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera for Wii</td>
									<td>Wii</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nokia N800</td>
									<td>N800</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nintendo DS browser</td>
									<td>Nintendo DS</td>
									<td class="center">8.5</td>
									<td class="center">C/A<sup>1</sup></td>
								</tr>
								<tr class="gradeC">
									<td>KHTML</td>
									<td>Konqureror 3.1</td>
									<td>KDE 3.1</td>
									<td class="center">3.1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.3</td>
									<td>KDE 3.3</td>
									<td class="center">3.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.5</td>
									<td>KDE 3.5</td>
									<td class="center">3.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Tasman</td>
									<td>Internet Explorer 4.5</td>
									<td>Mac OS 8-9</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.1</td>
									<td>Mac OS 7.6-9</td>
									<td class="center">1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.2</td>
									<td>Mac OS 8-X</td>
									<td class="center">1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.1</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.4</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Dillo 0.8</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Links</td>
									<td>Text only</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Lynx</td>
									<td>Text only</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>IE Mobile</td>
									<td>Windows Mobile 6</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>PSP browser</td>
									<td>PSP</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeU">
									<td>Other browsers</td>
									<td>All others</td>
									<td>-</td>
									<td class="center">-</td>
									<td class="center">U</td>
								</tr>
							</tbody>
						</table>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
					
					
					
					
					
					
					
				
				</div><!-- /.container-fluid -->
				
				
				
				<!-- BEGIN FOOTER -->
				<footer>
					&copy; 2014 <a href="#fakelink">Your company</a><br />
					Design by <a href="http://isohdesign.com/" target="_blank">ids</a>. Purchase this item at <a href="http://goo.gl/wSCjxD" target="_blank">Themeforest</a>
				</footer>
				<!-- END FOOTER -->
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
		

<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>Engine version</th>
									<th>CSS grade</th>
								</tr>
							</thead>
							<tbody>
								<tr class="odd gradeX">
									<td>Trident</td>
									<td>Internet
										 Explorer 4.0</td>
									<td>Win 95+</td>
									<td class="center"> 4</td>
									<td class="center">X</td>
								</tr>
								<tr class="even gradeC">
									<td>Trident</td>
									<td>Internet
										 Explorer 5.0</td>
									<td>Win 95+</td>
									<td class="center">5</td>
									<td class="center">C</td>
								</tr>
								<tr class="odd gradeA">
									<td>Trident</td>
									<td>Internet
										 Explorer 5.5</td>
									<td>Win 95+</td>
									<td class="center">5.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="even gradeA">
									<td>Trident</td>
									<td>Internet
										 Explorer 6</td>
									<td>Win 98+</td>
									<td class="center">6</td>
									<td class="center">A</td>
								</tr>
								<tr class="odd gradeA">
									<td>Trident</td>
									<td>Internet Explorer 7</td>
									<td>Win XP SP2+</td>
									<td class="center">7</td>
									<td class="center">A</td>
								</tr>
								<tr class="even gradeA">
									<td>Trident</td>
									<td>AOL browser (AOL desktop)</td>
									<td>Win XP</td>
									<td class="center">6</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.5</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 2.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 3.0</td>
									<td>Win 2k+ / OSX.3+</td>
									<td class="center">1.9</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.0</td>
									<td>OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.5</td>
									<td>OSX.3+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape 7.2</td>
									<td>Win 95+ / Mac OS 8.6-9.2</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Browser 8</td>
									<td>Win 98SE+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Navigator 9</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.1</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.2</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.2</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.3</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.4</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.4</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.5</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.6</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.6</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.7</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.7</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.8</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Seamonkey 1.1</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Gecko</td>
									<td>Epiphany 2.20</td>
									<td>Gnome</td>
									<td class="center">1.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.2</td>
									<td>OSX.3</td>
									<td class="center">125.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.3</td>
									<td>OSX.3</td>
									<td class="center">312.8</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 2.0</td>
									<td>OSX.4+</td>
									<td class="center">419.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 3.0</td>
									<td>OSX.4+</td>
									<td class="center">522.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>OmniWeb 5.5</td>
									<td>OSX.4+</td>
									<td class="center">420</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>iPod Touch / iPhone</td>
									<td>iPod</td>
									<td class="center">420.1</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Webkit</td>
									<td>S60</td>
									<td>S60</td>
									<td class="center">413</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.0</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.0</td>
									<td>Win 95+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.2</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.5</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Opera for Wii</td>
									<td>Wii</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nokia N800</td>
									<td>N800</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>Presto</td>
									<td>Nintendo DS browser</td>
									<td>Nintendo DS</td>
									<td class="center">8.5</td>
									<td class="center">C/A<sup>1</sup></td>
								</tr>
								<tr class="gradeC">
									<td>KHTML</td>
									<td>Konqureror 3.1</td>
									<td>KDE 3.1</td>
									<td class="center">3.1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.3</td>
									<td>KDE 3.3</td>
									<td class="center">3.3</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.5</td>
									<td>KDE 3.5</td>
									<td class="center">3.5</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Tasman</td>
									<td>Internet Explorer 4.5</td>
									<td>Mac OS 8-9</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.1</td>
									<td>Mac OS 7.6-9</td>
									<td class="center">1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.2</td>
									<td>Mac OS 8-X</td>
									<td class="center">1</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.1</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.4</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">A</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Dillo 0.8</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Links</td>
									<td>Text only</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeX">
									<td>Misc</td>
									<td>Lynx</td>
									<td>Text only</td>
									<td class="center">-</td>
									<td class="center">X</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>IE Mobile</td>
									<td>Windows Mobile 6</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeC">
									<td>Misc</td>
									<td>PSP browser</td>
									<td>PSP</td>
									<td class="center">-</td>
									<td class="center">C</td>
								</tr>
								<tr class="gradeU">
									<td>Other browsers</td>
									<td>All others</td>
									<td>-</td>
									<td class="center">-</td>
									<td class="center">U</td>
								</tr>
							</tbody>
						</table>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
					
				
					
					
					
					
					
				
				</div><!-- /.container-fluid -->
				
				
				
				
				
				<!-- BEGIN FOOTER -->
				<footer>
					&copy; 2014 <a href="#fakelink">Your company</a><br />
					Design by <a href="http://isohdesign.com/" target="_blank">ids</a>. Purchase this item at <a href="http://goo.gl/wSCjxD" target="_blank">Themeforest</a>
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