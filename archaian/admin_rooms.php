<?php
/* 
	Author: bixbyte
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
		
		/* die('<script>alert(" " + '.@json_encode($start).' + " " + '.@json_encode($residence).' + " "); history.back();</script>'); */ 
		
		if(@$start != '' &&  @$residence != '' ){
			
			$this->start 		= $start;
			$this->residence 	= $residence;
			$this->stop 		= @$stop;
							
		}else{
			$id = $this->id;
			include 'main.php';
			echo "<script>alert('Please re-enter the required details!');</script>";
			$redirect = new redirect('room_availability.php');
			die(); 
		}
	}
	
	public function add_room(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("UPDATE $this->tbl_name  SET available=0 WHERE r_number='$this->start' AND residence='$this->residence' ", true);		
			
		if($_SESSION['query']){
			echo "<script>alert('Room Specially Reserved!'); history.back();</script>";
			exit; 
		}
		
		
	}
	
	
	public function add_rooms(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		echo "<center><h2><code style='color:#F00;'>Processing Complete!</code> &nbsp; &nbsp;<code style='color:green;'><a href='javascript:history.back();'>GO Back </a></code> </h2></center>";	
		
		for($this->start; $this->start <= $this->stop; ($this->start+=1)){
			
			print("Processing room <code style='color:#F00'>".$this->start)."</code>";
			
			$connection->query("UPDATE $this->tbl_name SET available=0 WHERE r_number='$this->start' AND residence='$this->residence'", false);
			
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
	
	
	//Make one room available
	public function one_avail(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("UPDATE $this->tbl_name  SET available=1 WHERE r_number='$this->start' AND residence='$this->residence' ", true);		
			
		if($_SESSION['query']){
			echo "<script>alert('ROOM MADE AVAILABLE FOR BOOKING!'); history.back();</script>";
			exit; 
		}
		
	}
	
	//Make many rooms available
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






?>