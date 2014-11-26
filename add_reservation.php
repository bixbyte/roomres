<?php
	@session_start();
		
	
 

class reservation{
	
	public $id = "add_reservation.php";
	public $res;		public $room;
	
	public function __construct($room_number, $residence_id){
		
		if(@$_SESSION['l031n45'] == '' ){
			include "redirect.php";
			$go = new redirect('login.php');
			die();		
		}
		
		$this->room = @$room_number;
		$this->res  = @$residence_id;
		
		
		$this->update_room(); 
		
	}
	
	public function update_room(){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		$connection->query("SELECT * FROM rooms WHERE r_number='$this->room' AND residence='$this->res' LIMIT 1", true);
		$dets = $_SESSION['query'];
		
		while($rmdets = mysqli_fetch_array($dets)){
			$_SESSION['bk6m_maxcap'] = $rmdets['max_capacity'];
			$_SESSION['bk6m_curcap'] = $rmdets['curr_capacity'];
		}
		
		$newcap = $_SESSION['bk6m_curcap'] + 1;
		$resp = "";
		
		$connection->query("UPDATE rooms SET curr_capacity='$newcap' WHERE residence='$this->res' AND r_number='$this->room'",true);
			if($_SESSION['query']){$resp .=  "Room capacity Updated! <br /><br />";}
			
		$connection->query("UPDATE reservants SET rnum='$this->room', res='$this->res' WHERE s_idnum='$_SESSION[l031n45]' ",true);
			if($_SESSION['query']){$resp .= "Room Details loged to personal account. <br />";}
			
		$connection->query("INSERT INTO activity (rnum, trim, authby, residence, s_id) VALUES ('$this->room', '$_SESSION[trim_id]', '1','$this->res', '$_SESSION[l031n45]' )", true);
			if($_SESSION['query']){$resp .= "Booking Lodged! .... <br />"; }


		echo ('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Response!</strong><br> '.$resp.' <a href="#" class="alert-link">Done!</a>.
			</div>');
		$iara = new redirect('panel.php'); 
		exit; 

		/*
		if(@$_SESSION['query']){
			
			$connection->query("INSERT INTO activity (rnum,trim,authby,residence) VALUES ('$this->room','$_SESSION[trim_id]','1','$this->res')",true);
			if(@$_SESSION['query']){}
			
		}
		*/
		
		//$connection->query("UPDATE rooms SET curr_capacity='' ",true);
	}
	
}
	
?>
