<?php

$id = "__tests.php";
$connect = true;
include "main.php";
$connection->query("SELECT * FROM reservants WHERE s_idnum='$_SESSION[l031n45]' ",true);

$data = '
<html manifest="cache.appcache">
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
        
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		<script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
                <script>
                         $(function(){"use strict";
                            $(".logo-brand").removeClass("white-color");
                            $(".logo-brand").removeClass("primary-color");
                            $(".logo-brand").removeClass("info-color");
                            $(".logo-brand").removeClass("success-color");
                            $(".logo-brand").removeClass("danger-color");
                            $(".logo-brand").removeClass("warning-color");
                            $(".logo-brand").addClass("white-color");
                            $(".sidebar-left").addClass("light-color");
                         });

                        
                </script>
 
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
		<div class="page-content">
				
				
				<div class="container-fluid">';

?>

<?php
echo $data;

/*
	Application code starts after the line below.
*/

?>
<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover " id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>ID Number</th>
									<th>Name</th>
									<th>Room</th>
									<th>Telephone</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
<?php

	
	$connection->query("SELECT * FROM reservants" , true);
	$query = $_SESSION['query'];
	$data = '';
	while($results = mysqli_fetch_array($query)){

			$data .= '
						<tr class="'.$pos.'">
									<td>'.$results['s_idnum'].'</td>
									<td><!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle" alt="avatar"> -->'.$results['name'].'</td>
									<td>'.$results['rnum'].'</td>
									<td class="center">'.$results['tel'].'</td>
									<td class="center">'.$results['email'].'</td>
								</tr>
			';
		($pos == "odd") ? $pos = "even" : $pos = "odd";

	}
	echo $data;

?>							

							</tbody>
						</table>
						</div><!-- /.table-responsive -->
</div><!-- /.the-box .default -->



		TABLE ENDS HERE!!
				
				
<!-- BEGIN TIMELINE -->
					<ul class="timeline">
						<li class="centering-line"></li>
						
						<!-- BEGIN TIME CAT-->
						<li class="center-timeline-cat">
							<div class="inner">
							RESIDENCE NAME
							</div><!-- /.inner -->
						</li>
						<!-- END TIME CAT-->
					</ul>	
						
					<ul class="timeline">
						<!-- BEGIN CENTERING LINE -->
						<li class="centering-line"></li>
						<!-- END CENTERING LINE -->
						
						<!-- BEGIN ITEM TIMELINE -->
						<li class="item-timeline">
							<div class="buletan"></div>
							<div class="inner-content">
								
								<!-- BEGIN HEADING TIMELINE -->
								<div class="heading-timeline">
									<img src="assets/img/avatar/avatar-1.jpg" class="avatar" alt="Avatar">
									<div class="user-timeline-info">
										<p>
										Paris Hawker
										<small>11 hours ago</small></p>
									</div><!-- /.user-timeline-info -->
								</div><!-- /.heading-timeline -->
								<!-- BEGIN HEADING TIMELINE -->
								
								<blockquote>
								RESIDENCE SUMMARY
								<small>by <cite title="Someone">Sara Cannon</cite></small>
								</blockquote>
								
								<!-- BEGIN FOOTER TIMELINE -->
								<div class="footer-timeline">
									<ul class="timeline-option">
										<li class="option-row">
											<div class="row">
												<div class="col-xs-6">
													<ol>
														
													</ol>
												</div><!-- /.col-xs-6 -->
												
											</div><!-- /.row -->
										</li>
										
										</li>
									</ul>
								
								<!-- END FOOTER TIMELINE -->
								
							</div><!-- /.inner-content -->
						</li>
						<!-- END ITEM TIMELINE -->
						
						
					</ul>	
					<!-- END TIMELINE -->
					
				
