<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
@session_start();

class admin_room{
	
	private $id = "admin_rooms.php";
	private $tbl_name = "rooms";
	public $start; 			public $residence; 			
	public $stop;
	
	public function __construct($start, $stop, $residence){
		
		include "admin_tools.php";
		
				
		if(@$start != '' &&  @$residence != '' ){
			
			$this->start 		= $start;
			$this->residence 	= $residence;
			$this->stop 		= @$stop;
							
		}else{
			$id = $this->id;
			include 'main.php';
			die ('<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Warning: </strong><br> Please re-enter the required details! <br> <a href="#" class="alert-link">TRY AGAIN</a>.
			</div>');
		}
	}
	
    /**
    *   Specially reserve a single room
    */
	public function add_room(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("UPDATE $this->tbl_name  SET available=0 WHERE r_number='$this->start' AND residence='$this->residence' ", true);		
			
		if($_SESSION['query']){
			die ('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>SUCCESS: </strong><br> Room specially reserved! .
			</div>');
		}
		
		
	}
	
	/**
    *   Specially reserve multiple rooms
    */
	public function add_rooms(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$room_response =  " <h4><code style='color:blue;'>Specially reserving room(s) ".$this->start." ==> ".$this->stop." </code> </h4> ";	
		
		for($this->start; $this->start <= $this->stop; ($this->start+=1)){
			
						
			$connection->query("UPDATE $this->tbl_name SET available=0 WHERE r_number='$this->start' AND residence='$this->residence'", false);
			
			if(!$_SESSION['query']){
				
				$room_response .= " Room {$this->start} ... <code style='color:red;'> Error! </code> <br /> ";
				
				
			}
			 
			
		}
		 $numz = count($_SESSION['query_error']);
		 
			 if( $numz <> 0){
			 	
				 $room_response .=  " <h5> </h5> ";
				 
				 for($i = 0; $i < $numz; $i++){
				 	
				 	$room_response .= $_SESSION['query_error'][$i]."<br />";
				 	
				 }
				unset($_SESSION['query_error']);
			}
			
			die ('<div class="alert alert-info alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  '.$room_response.'<code style="color: green;"><strong>Done!</strong></code>
			</div>');
			
						
	}
	
	
	/**
    *   Make a single room available for reservation
    */
	public function one_avail(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("UPDATE $this->tbl_name  SET available=1 WHERE r_number='$this->start' AND residence='$this->residence' ", true);		
			
		if($_SESSION['query']){
			die ('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>SUCCESS: </strong><br> Room <code>'.$this->start.'</code> made available for booking! .
			</div>');
		}
		
	}
	
	/**
    *   Make multiple rooms available for reservation
    */
	public function many_avail(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		echo "<center><h2><code style='color:#F00;'>Processing Complete!</code> &nbsp; &nbsp;<code style='color:green;'><a href='javascript:history.back();'>GO Back </a></code> </h2></center>";	
		
		for($this->start; $this->start <= $this->stop; ($this->start+=1)){
			
			print("Processing room <code style='color:#F00'>".$this->start)."</code>";
			
			$connection->query("UPDATE $this->tbl_name SET available=1 WHERE r_number='$this->start' AND residence='$this->residence'", false);
			
			if($_SESSION['query']){echo " .... <code style='color:green;'> Done! </code> <br />";}else{echo " .... <code style='color:red;'> Error! </code> <br />";}
			 
			
		}
		 
		 $numz = count($_SESSION['query_error']);
			 if( $numz <> 0){
				 	echo '<h3>The following errors were encountered</h3>';
				 
				 for($i = 0; $i < $numz; $i++){
				 	echo $_SESSION['query_error'][$i]."<br />";
				 }
				unset($_SESSION['query_error']);
			}
			
		
		
	}
	
	
//End of class	
}


//$rooms = new admin_room( $argv[1], $argv[2], $argv[3] );


?>