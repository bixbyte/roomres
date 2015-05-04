<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/

@session_start();
class residence {

	private $id= "add_residence.php";
	private $tbl_name = "residence";
	public $res_name;			public $res_gender;

	public function __construct($residence_name, $residence_gender){
		
		include "admin_tools.php";
		
		if(@$residence_name != '' && @$residence_gender != ''){
			
			$this->res_gender 	= @$residence_gender;
			/*
			* RESIDENCE GENDER RESTRICTION 
			if($this->res_gender != $_SESSION['u56_gender']){
				$this->res_gender = $_SESSION['u56_gender'];
				$this->mess =  '<script>alert("The Residence gender was automatically changed!"); </script>';
			}
			*/
			
			$this->res_name  = @$residence_name;	
			//$this->add_res();
		
		}else{
			$id = $this->id;
			include 'main.php';
			echo "<script>alert('Please re-enter the required details!');</script>";
			$redirect = new redirect('new_residence.php');
			die();
		}
		
	}
		

	
	public function add_res(){
		
		$id = $this->id;
		$connect = true;
		
		include 'main.php';
		
		
		/*
			//$connection->num_rows("SELECT * FROM $this->tbl_name WHERE name='$this->res_name' AND gender='$this->res_gender'");
			
			//if($_SESSION['num_rows'] <> 0){
				die("<script>alert('Sorry! \\nIt seems like this residence already exists.\\n\\tPlease try again.'); history.back(1);</script>");
			//}else{
			//unset($_SESSION['query']);
		*/
			$connection->query("INSERT INTO $this->tbl_name (name, gender) VALUES('$this->res_name','$this->res_gender')", true);		
			
			if(@$_SESSION['query']){
				if(@$this->mess != ''){}else{echo @$this->mess;}
				echo "<script>alert('Successfully inserted');</script> Residence Added! <br/> Would you like to ... <br />
				<a href='javascript:history.back(1);'>Go back.</a> <br/><a href='new_room.php'>Add rooms.</a> ";
		/*
			//}
		*/
		}
		
	}


//End of Class	
}
?>