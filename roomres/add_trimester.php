<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/

@session_start();
class trimester {

	private $id= "add_trimester.php";
	private $tbl_name = "trimester";
	
	public $trim_name;			public $trim_year;

	public function __construct($trimester_name, $trimester_year){
		
		include "admin_tools.php";
		
		if(@$trimester_name != '' && @$trimester_year != ''){
			
			$this->trim_year 	= @$trimester_year;
			$this->trim_name  	= @$trimester_name;	
			//$this->add_trim();
		
		}else{
			$id = $this->id;
			include 'main.php';
			echo "<script>alert('Please re-enter the required details!');</script>";
			$redirect = new redirect('new_trimester.php');
			die();
						
		}
		
	}
		

	
	public function add_trim(){
		
		$id = $this->id;
		$connect = true;
		
		include 'main.php';
			
			$connection->query("INSERT INTO $this->tbl_name (name, year) VALUES('$this->trim_name','$this->trim_year')", true);		
			
			if($_SESSION['query']){
				
				$_SESSION['trimester'] = '$this->trim_name';
				echo "<script>alert('Successfully inserted');</script>Trimester Added! <br/> <br />
				";
				$tma = new redirect("login.php");
				die();
		
		}
		
	}


//End of Class	
}
?>