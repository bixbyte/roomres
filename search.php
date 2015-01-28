<?php
/*
	* Author: Ian Innocent 
	* For: The Connection
*/
@session_start();
	
class search { 

	//Find by idnumber room number and name
	 function admin_find($sstringy){
		 if(!empty($sstringy)):
		 
		 	
			//Get the connection framework core files
			$id = "search.php";
			$connect = true;
			include "main.php";
			if(@$_SESSION['l031n45'] == '' || @$_SESSION['u56_gender'] == ''){
				$go = new redirect("login.php");
				exit;
			}
			
			//Get the resident names and store them in an associative array
			//In the order "residence_id" => "residence_name"
			$connection->query("SELECT * FROM residence WHERE gender='$_SESSION[u56_gender]' OR  gender='a'",true);
			$rezy = $_SESSION['query'];
			
			$rezes = array();
			while($rezys = mysqli_fetch_array($rezy)){
				$rezes[$rezys['id']] = $rezys['name'];
			}
			
			
			
			//Get the search result ID Numbers and display them. 
			//Don't forget to use the associative array to replace the numeric residence for the actual alphanumeric alternative
			
			$actquery = "SELECT * FROM reservants WHERE actif='1' AND gender='$_SESSION[u56_gender]' AND res!='0' AND rnum!='0' AND (name LIKE '%$sstringy%' OR s_idnum LIKE '%$sstringy%' OR rnum LIKE '%$sstringy%')";
			//   
			$connection->query($actquery,true);
			//Get the number of results  found
			$connection->num_rows($actquery, true);
			
			$relz = $_SESSION['query']; 
			$nums = $_SESSION['num_rows'];
			
         $atz = '<!-- BEGIN TIMELINE -->
					<ul class="timeline">
						<li class="centering-line"></li>';
                     
			if($nums != 1){ $trm = " Results Found. <br /><hr width='80%' align='center' />"; }else{ $trm = " Result Found. <br /><hr width='80%' align='center' />"; }
			
			$atz .= "<center>  </center>";
         '
						<ul class="timeline">
							<li class="centering-line"></li>

							<!-- BEGIN TIME CAT-->
							<li class="center-timeline-cat">
								<div class="inner">
								<code style="color:red;">'.$nums.'</code><code> '.$trm.'</code>
								</div><!-- /.inner -->
							</li>
							<!-- END TIME CAT-->
						</ul>
						<ul class="timeline">
						<!-- BEGIN CENTERING LINE -->
						<li class="centering-line"></li>
						<!-- END CENTERING LINE -->	
					';
			$detz = array();
			while ($results = mysqli_fetch_array($relz)){
				/*		
				$atz .= '<center>
				<div id="card_holder" ">
				
					<div id="card_mini_frame" >
						<div id="card_pic"> </div>
						<div id="card_dets">
								
								<div id="card_name">'.htmlentities($results['name']).'</div>  
										 
								<div id="card_contact">
									<div id="card_email">'.htmlentities($results['email']).'</div>
									<div id="card_tel">'.htmlentities($results['tel']) .'</div>
								</div>
								
								<div id="card_specs" >
									<div id="card_res" style="opacity:0.3;"><code>Residence</code></div>
									<div id="card_room" style="opacity:0.3;"><code>Room</code></div>
										
									<div id="card_res" >'.@htmlentities($rezes[$results['res']]).'</div>
									<div id="card_room">'.@htmlentities($results['rnum']).'</div>
								</div>
						</div>
						
						<div id="card_under_pic">
						<br />
						'.htmlentities($results['s_idnum']).'
						</div>
					</div>
					
				</div>
				</center>
				<br /><br />';
                */
                $atz .= '<!-- BEGIN ITEM TIMELINE -->
						<li class="item-timeline">
							<div class="buletan"></div>
							<div class="inner-content">

								<!-- BEGIN HEADING TIMELINE -->
								<div class="heading-timeline">
									<!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar" alt="Avatar"> -->
									<div class="user-timeline-info">
										
										&nbsp; '.strtoupper( htmlentities($results['name']) ).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <b> '.htmlentities($results['s_idnum']).' </b> ]
										
                                       
									</div><!-- /.user-timeline-info -->
                                             
								</div><!-- /.heading-timeline -->
                                    &nbsp; <code>'.@htmlentities($rezes[$results['res']]).'</code> ROOM <code>'.@htmlentities($results['rnum']).'</code>
								<!-- BEGIN HEADING TIMELINE -->

								<!-- BEGIN FOOTER TIMELINE -->
								<div class="footer-timeline">
									&nbsp;&nbsp; <i class="fa fa-envelope"></i> &nbsp;'.htmlentities($results['email']).' &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-phone "></i> &nbsp;'.@htmlentities($results['tel']).'
									<ul class="timeline-option">

									</ul>

								<!-- END FOOTER TIMELINE -->

							</div><!-- /.inner-content -->
						</li>
						<!-- END ITEM TIMELINE -->'; 
			
			}
		
         $atz .= '</div></center><br /><br /><br />';
         
         echo $atz;
			
			
		else:
			echo '<br><center><code class="text-danger">  AWAITING SEARCH INPUT </code></center>
					<div class="spinner"> 
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>';
		endif;
		
		
	}
	
	
	
	
	public function basic_pro_search($sstringy){
		include "admin_tools.php";
		if(!empty($sstringy)):
		 
		 	
			//Get the connection framework core files
			$id = "search.php";
			$connect = true;
			include "main.php";
			
			
			//Get the resident names and store them in an associative array
			//In the order "residence_id" => "residence_name"
			//Add "WHERE gender='$_SESSION[u56_gender]' OR  gender='a'" to limit the gender
			$connection->query("SELECT * FROM residence ",true);
			$rezy = $_SESSION['query'];
			
			$rezes = array();
			while($rezys = mysqli_fetch_array($rezy)){
				$rezes[$rezys['id']] = $rezys['name'];
			}
			
			
			
			//Get the search result ID Numbers and display them. 
			//Don't forget to use the associative array to replace the numeric residence for the actual alphanumeric alternative
			//Add "AND gender='$_SESSION[u56_gender]'" to limit the gender
			$actquery = "SELECT * FROM reservants WHERE actif='1' AND res!='0' AND rnum!='0' AND (name LIKE '%$sstringy%' OR s_idnum LIKE '%$sstringy%' OR rnum LIKE '%$sstringy%')";
			//   
			$connection->query($actquery,true);
			//Get the number of results  found
			$connection->num_rows($actquery, true);
			
			$relz = $_SESSION['query']; 
			$nums = $_SESSION['num_rows'];
			
			if($nums != 1){ $trm = " Results Found. <br /><hr width='80%' align='center' />"; }else{ $trm = " Result Found. <br />
			<code>Showing Results for people with reserved rooms only<br/></code><hr width='80%' align='center' />"; }
			
			//echo "<center> <code style='color:red;'>".$nums."</code><code> ".$trm."</code> </center>";
        echo       '
						<ul class="timeline">
							<li class="centering-line"></li>

							<!-- BEGIN TIME CAT-->
							<li class="center-timeline-cat">
								<div class="inner">
								<code style="color:red;">'.$nums.'</code><code> '.$trm.'</code>
								</div><!-- /.inner -->
							</li>
							<!-- END TIME CAT-->
						</ul>
						<ul class="timeline">
						<!-- BEGIN CENTERING LINE -->
						<li class="centering-line"></li>
						<!-- END CENTERING LINE -->	
					';
			$detz = array();
			while ($results = mysqli_fetch_array($relz)){
			
                /*
				echo '<center>
				<div id="card_holder" ">
				
					<div id="card_mini_frame" >
						<div id="card_pic"> </div>
						<div id="card_dets">
								
								<div id="card_name">'.htmlentities($results['name']).'</div>  
										 
								<div id="card_contact">
									<div id="card_email">'.htmlentities($results['email']).'</div>
									<div id="card_tel">'.htmlentities($results['tel']) .'</div>
								</div>
								
								<div id="card_specs" >
									<div id="card_res" style="opacity:0.3;"><code>Residence</code></div>
									<div id="card_room" style="opacity:0.3;"><code>Room</code></div>
										
									<div id="card_res" >'.@htmlentities($rezes[$results['res']]).'</div>
									<div id="card_room">'.@htmlentities($results['rnum']).'</div>
								</div>
						</div>
						
						<div id="card_under_pic">
						<br />
						'.htmlentities($results['s_idnum']).'
						</div>
					</div>
					
				</div>
				</center>
				<br /><br />';
                */
                
                echo '<!-- BEGIN ITEM TIMELINE -->
						<li class="item-timeline">
							<div class="buletan"></div>
							<div class="inner-content">

								<!-- BEGIN HEADING TIMELINE -->
								<div class="heading-timeline">
									<!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar" alt="Avatar"> -->
									<div class="user-timeline-info">

										&nbsp; '.strtoupper( htmlentities($results['name']) ).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <b> '.htmlentities($results['s_idnum']).' </b> ]


									</div><!-- /.user-timeline-info -->

								</div><!-- /.heading-timeline -->
                                    &nbsp; <code>'.@htmlentities($rezes[$results['res']]).'</code> ROOM <code>'.@htmlentities($results['rnum']).'</code>
								<!-- BEGIN HEADING TIMELINE -->

								<!-- BEGIN FOOTER TIMELINE -->
								<div class="footer-timeline">
									&nbsp;&nbsp; <i class="fa fa-envelope"></i> &nbsp;'.htmlentities($results['email']).' &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-phone "></i> &nbsp;'.@htmlentities($results['tel']).'
									<ul class="timeline-option">

									</ul>

								<!-- END FOOTER TIMELINE -->

							</div><!-- /.inner-content -->
						</li>
						<!-- END ITEM TIMELINE -->'; 
			
			}
		
		
			
			
		else:
        echo '<br><center><code class="text-danger">  AWAITING SEARCH INPUT </code></center>
					<div class="spinner"> 
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>';
		endif;
	}
	
	
	
	
	
	function pro_search($sstringy){ 
		include "admin_tools.php";
		if(!empty($sstringy)):
		 
		 	
			//Get the connection framework core files
			$id = "search.php";
			$connect = true;
			include "main.php";
					
			//Get the resident names and store them in an associative array
			//In the order "residence_id" => "residence_name"
			//ADD "WHERE gender='$_SESSION[u56_gender]' OR  gender='a' " To restrict by residence
			$connection->query("SELECT * FROM residence ",true);
			$rezy = $_SESSION['query'];
			
			$rezes = array();
			while($rezys = mysqli_fetch_array($rezy)){
				$rezes[$rezys['id']] = $rezys['name'];
			}
			
			
			
			//Get the search result ID Numbers and display them. 
			//Don't forget to use the associative array to replace the numeric residence for the actual alphanumeric alternative
			//Add "gender='$_SESSION[u56_gender]' AND" after "WHERE" to implement gender limitations
			
			$actquery = "SELECT * FROM reservants WHERE  (name LIKE '%$sstringy%' OR s_idnum LIKE '%$sstringy%' OR rnum LIKE '%$sstringy%')";
			//   
			$connection->query($actquery,true);
			//Get the number of results  found
			$connection->num_rows($actquery, true);
			
			$relz = $_SESSION['query']; 
			$nums = $_SESSION['num_rows'];
			
			if($nums != 1){ $trm = " Results Found. <br /><hr width='80%' align='center' />"; }else{ $trm = " Result Found. <br /><hr width='80%' align='center' />"; }
			
       echo  '<ul class="timeline">
							<li class="centering-line"></li>

							<!-- BEGIN TIME CAT-->
							<li class="center-timeline-cat">
								<div class="inner">
								<code style="color:red;">'.$nums.'</code><br><code> '.$trm.'</code>
								</div><!-- /.inner -->
							</li>
							<!-- END TIME CAT-->
						</ul>
						<ul class="timeline">
						<!-- BEGIN CENTERING LINE -->
						<li class="centering-line"></li>
						<!-- END CENTERING LINE -->
                        
					';
			$detz = array();
			while ($results = mysqli_fetch_array($relz)){
				/*		
				echo '<center>
				<div id="card_holder" ">
				
					<div id="card_mini_frame" >
						<div id="card_pic"> </div>
						<div id="card_dets">
								
								<div id="card_name">'.htmlentities($results['name']).'</div>  
										 
								<div id="card_contact">
									<div id="card_email">'.htmlentities($results['email']).'</div>
									<div id="card_tel">'.htmlentities($results['tel']) .'</div>
								</div>
								
								<div id="card_specs" >
									<div id="card_res" style="opacity:0.3;"><code>Residence</code></div>
									<div id="card_room" style="opacity:0.3;"><code>Room</code></div>
										
									<div id="card_res" >'.@htmlentities($rezes[$results['res']]).'</div>
									<div id="card_room">'.@htmlentities($results['rnum']).'</div>
								</div>
						</div>
						
						<div id="card_under_pic">
						<br />
						'.htmlentities($results['s_idnum']).'
						</div>
					</div>
					
				</div>
				</center>
				<br /><br />';
                */
                
                echo '<!-- BEGIN ITEM TIMELINE -->
						<li class="item-timeline">
							<div class="buletan"></div>
							<div class="inner-content">

								<!-- BEGIN HEADING TIMELINE -->
								<div class="heading-timeline">
									<!-- <img src="assets/img/avatar/avatar-1.jpg" class="avatar" alt="Avatar"> -->
									<div class="user-timeline-info">

										&nbsp; '.strtoupper( htmlentities($results['name']) ).' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <b> '.htmlentities($results['s_idnum']).' </b> ]


									</div><!-- /.user-timeline-info -->

								</div><!-- /.heading-timeline -->
                                    &nbsp; <code>'.@htmlentities($rezes[$results['res']]).'</code> ROOM <code>'.@htmlentities($results['rnum']).'</code>
								<!-- BEGIN HEADING TIMELINE -->

								<!-- BEGIN FOOTER TIMELINE -->
								<div class="footer-timeline">
									&nbsp;&nbsp; <i class="fa fa-envelope"></i> &nbsp;'.htmlentities($results['email']).' &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-phone "></i> &nbsp;'.@htmlentities($results['tel']).'
									<ul class="timeline-option">

									</ul>

								<!-- END FOOTER TIMELINE -->

							</div><!-- /.inner-content -->
						</li>
						<!-- END ITEM TIMELINE -->'; 
			
			}
		
		
			
			
		else:
        echo '<br><center><code class="text-danger">  AWAITING SEARCH INPUT </code></center>
					<div class="spinner"> 
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>';
		endif;
		
		
	}
		
	
//End of class	
} 



?>

	

