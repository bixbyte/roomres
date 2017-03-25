<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/
@session_start();
class room{
	
	private $id = "add_room.php";
	private $tbl_name = "rooms";
	public $start; 			public $residence; 			public $capacity;
	public $stop;
	
	public function __construct($start, $stop, $residence, $capacity){
		
		include "admin_tools.php";
		
		if(@$start != '' &&  @$residence != '' && @$capacity != ''){
			if( (@$stop - @$start) > 30000){echo '<script>alert("Please add records exceeding 30,000 in sequences to avoid memory errors!");</script>'; die;}
			$this->start 		= $start;
			$this->residence 	= $residence;
			$this->capacity 	= $capacity;
			$this->stop 		= @$stop;
							
		}else{
			$id = $this->id;
			include 'main.php';
			echo "<script>alert('Please re-enter the required details!');</script>";
			$redirect = new redirect('new_room.php');
			die(); 
		}
	}
	
	public function add_room(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("INSERT INTO $this->tbl_name (r_number, max_capacity, curr_capacity, residence, available) VALUES ('$this->start','$this->capacity', 0, '$this->residence', 1)", true);		
			
		if($_SESSION['query']){
			echo "<script>alert('Successfully inserted');</script> Room Added! <br/> Would you like to ... <br />
				  <a href='javascript:history.back(1);'>Go back.</a> <br/><a href='new_room.php'>Add more rooms.</a> ";
		}
		
		
	}
	
	
	public function add_rooms(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$mYdata = array();
		for($this->start; $this->start <= $this->stop; ($this->start+=1)){
			/*Test Area*/
			
			$mYdata[] = "('".$this->start."','".$this->capacity."', '0','".$this->residence."', '1')";
			
			print("Processing room <code style='color:#F00'>".$this->start)."</code> ... ";
			
			/*End of test Area*/
		}
		$valDataz = implode(", ", $mYdata);
		$_SESSION['query_error'] = "";
		$connection->query("INSERT INTO $this->tbl_name(r_number, max_capacity, curr_capacity, residence, available) VALUES $valDataz ",false);
		if($_SESSION['query']){echo " .... <code style='color:green;'> Done! </code> <br />";}else{echo " .... <code style='color:red;'> Error! </code> <br />";}
		/*		
		 print("Processing room <code style='color:#F00'>".$this->start)."</code>";
			$connection->query("INSERT INTO $this->tbl_name(r_number, max_capacity, curr_capacity, residence, available) VALUES ('$this->start','$this->capacity', 0, '$this->residence', 1)", false);
			
			if($_SESSION['query']){echo " .... <code style='color:green;'> Done! </code> <br />";}else{echo " .... <code style='color:red;'> Error! </code> <br />";}
		 */
		 $numz = count($_SESSION['query_error']);
			 if( $numz <> 0){
				 	echo '<h3>The following errors were encountered</h3>';
				 
				 for($i = 0; $i < $numz; $i++){
				 	echo $_SESSION['query_error'][$i]."<br />";
				 }
				unset($_SESSION['query_error']);
			}
			//Comment the statements below enable the viewing of errors that occur during room addition processing
			//Remember to add a 'Go back' link / Button
			echo '<script>alert("Rooms Added!\n\n ERRORS" + '.@json_encode(implode("\n\n", $_SESSION['query_error'])) .' + "");</script>';
			$go = new redirect('new_room.php');
			exit;
						
	}
	
	
//End of class	
}






?>