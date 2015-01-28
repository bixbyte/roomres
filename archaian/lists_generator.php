<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/

@session_start();

class listgen{
	
	public $id = "list_generator.php";
	
	public function __construct(){
		include "admin_tools.php";
		
	}
	

	public function single( $resid = '' ){
		
		
		($resid == '') ?  $mul = '' : $mul = "WHERE id=$resid";
		
	$id = $this->id;
	$connect = true;
	include "main.php";

	//Start the residence view

	echo '<!-- BEGIN TIMELINE -->
					<ul class="timeline">
						<li class="centering-line"></li>';

			
		//Get the residence names and store them in an associative array in the order "residence_id" => "residence_name"
		// Add "WHERE gender='$_SESSION[u56_gender]'" to limit the gender of residences shown
		$connection->query("SELECT * FROM residence $mul" ,true);
		$rezy = $_SESSION['query'];
		
		$rezes = array();
		while($rezys = mysqli_fetch_array($rezy)){
			$rezes[$rezys['id']] = $rezys['name'];
		}

	
		//Conjoiner 
			
			foreach($rezes as $rezid => $rezname){
				//Get rooms in the residence in an array .. not important ~[in the order "room_number" => "residence"]~
				$connection->query("SELECT * FROM rooms WHERE residence='$rezid' ORDER BY r_number ",true);
				$roomarr = $_SESSION['query'];
				
				$roomz = array();
				while($rms = mysqli_fetch_array($roomarr)){
					$roomz[] = $rms['r_number'];
				}
				
				
				//Fetch all resident details from the specified residence
				//and store them in an associative array in the order "room_number" => "Personal Details"
				$connection->query("SELECT * FROM reservants WHERE res='$rezid' ORDER BY rnum ",true);
				$arr_list = $_SESSION['query'];
				
				$residents = array(); 
				while($list = mysqli_fetch_array($arr_list)){
					if(!isset($residents[$list['rnum']])){$residents[$list['rnum']] = "";}
					//in the order  idnumber, name, telephone 
					
						//$residents[$list['rnum']] .= '<div class="panel panel-square panel-default">';
						$residents[$list['rnum']] .= '<ol class="breadcrumb info rsaquo sm">
								  <li><a href="#fakelink">'.htmlentities(strtoupper($list['s_idnum'])).'</a></li>
								  <li><a href="#fakelink">'.htmlentities(strtoupper($list['name'])).'</a></li>
								  <li class="active ">'.htmlentities(strtoupper($list['tel'])).'</li>
								</ol>';
						
					//$residents[$list['rnum']] .= '</div>';
									
				}	
				//print_r($residents); 
				
				//Do Residence members display here

				/* PRINT STYLE PAGINATOR */
				if(@$rep){echo '<div style="page-break-before:always"></div>';}

				echo '
						<ul class="timeline">
							<li class="centering-line"></li>
							
							<!-- BEGIN TIME CAT-->
							<li class="center-timeline-cat">
								<div class="inner">
								'.htmlentities(strtoupper($rezname)).'<br>
								<code> '.date('d/m  H:i').' </code>
								</div><!-- /.inner -->
							</li>
							<!-- END TIME CAT-->
						</ul>
						<ul class="timeline">
						<!-- BEGIN CENTERING LINE -->
						<li class="centering-line"></li>
						<!-- END CENTERING LINE -->	
					';
					
				
			foreach($roomz as $room){
					
					
				echo '<!-- BEGIN ITEM TIMELINE -->
						<li class="item-timeline">
							<div class="buletan"></div>
							<div class="inner-content">
								
								<!-- BEGIN HEADING TIMELINE -->
								<div class="heading-timeline">
									<!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar" alt="Avatar"> -->
									<div class="user-timeline-info">
										<p>
										Room '.htmlentities($room).'
										<small></small></p>
									</div><!-- /.user-timeline-info -->

								</div><!-- /.heading-timeline -->

								<!-- BEGIN HEADING TIMELINE -->
															
								<!-- BEGIN FOOTER TIMELINE -->
								<div class="footer-timeline">
									'.@$residents[$room].'
									<ul class="timeline-option">
									
									</ul>
								
								<!-- END FOOTER TIMELINE -->
								
							</div><!-- /.inner-content -->
						</li>
						<!-- END ITEM TIMELINE -->';


					/*
					echo '
						  						
						  		<table class="table table-striped table-hover ">
						  			<tr> 
											<hr />		<th align="left" colspan="3" ><h4>Room '.htmlentities($room).':</h4></th>
						  			</tr>
									'.@$residents[$room].'
								</table>
								
							</div>
						
						';
					*/
					
					
				}
				
				echo '
				</div>
				</center>
				<br /><br /><br />';
				$rep = true;
				 
			}
			
		
	}

	
	//End of Class
}

	
			
?>
