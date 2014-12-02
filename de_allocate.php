<?php
@session_start();
class de_allocator{
	
	public $id = "de_allocate.php";
	public $idnum; 
	
	public function __construct($identity){
		
		include "admin_tools.php";
		
		if($identity != ''){
			
			$this->idnum = strtolower(@$identity);
			
			if($this->idnum == 'all'){
				
				$this->drop_all();
				
			}else{
				
				$this->drop_one();
				
			}
		}else{
			die(":-{  <br /><br /> You made an ungranteable request!");
		}
		
	}
	
	
	protected function drop_all(){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		//Set the current capacity of all rooms to zero
		//Clear the current reservation status of all students
		$connection->query("UPDATE rooms SET curr_capacity='0'",true);
		if($_SESSION['query']){}
		$connection->query("UPDATE reservants SET rnum='0', res='0' ",true);
		if($_SESSION['query']){
			echo '<script>alert("Rooms have been made available for booking. \n\n The Room reservation session is now open");</script>'; 
		}else{
			die("FATAL ERROR!");
		}
		
		$redir = new redirect("cpanel.php");
		
		//Automatically send an email to all active users informing them of the opening of the new  room reservation window.
		//Format:
		//$mailit = new mailer($this->name ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
	}
	
	
	protected function drop_one(){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		//Pick the selected reservant's current room and residence.
		$connection->query("SELECT * FROM reservants WHERE s_idnum='$this->idnum'",true);
		$resres = $_SESSION['query'];
		while($resdet = mysqli_fetch_array($resres)){
			$drop_res 	= $resdet['res'];
			$drop_room 	= $resdet['rnum'];			
		}
		
		//Pick the room's current capacity 
		$connection->query("SELECT curr_capacity FROM rooms WHERE r_number='$drop_room' AND residence='$drop_res' ", true);
		$cap = $_SESSION['query'];
		while($capres = mysqli_fetch_array($cap)){
			$curcap = $capres['curr_capacity'];
		}
		$newcap = $curcap - 1;
		
		//Update the reservant's current room capacity to what it has  decremented by one
		$connection->query("UPDATE rooms SET curr_capacity='$newcap' WHERE r_number='$drop_room' AND residence='$drop_res'", true);
		if($_SESSION['query']){ echo "<br /> Room partially de-populated! <br />";}
		
		
		//Clear the reservants current booking state
		$connection->query("UPDATE reservants SET rnum='0', res='0' WHERE s_idnum='$this->idnum'",true);
		if($_SESSION['query']){ echo '<br /><br /><script> alert("Room de-allocation Successful!");</script>'; $go = new redirect("panel.php"); die();}else{	die(":-{  Wow, this is embarrasing!<br /><br /> <code>The reservants' room de-allocation details for ".$this->idnum." were not updated!</code>");}		
				
		
	}
	
	
	
}

?>