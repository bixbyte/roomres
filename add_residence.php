<?php
/* 
	Author: The Connection 
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
            die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong><br> Please Fill in all the required details <br> <a href="#" class="alert-link">TRY AGAIN</a>.
                                    </div>');
        }
		
	}
		

	
	public function add_res(){
		
		$id = $this->id;
		$connect = true;
		
		include 'main.php';
		
	$connection->query("INSERT INTO $this->tbl_name (name, gender) VALUES('$this->res_name','$this->res_gender')", false);		
			
			if(@$_SESSION['query']){
				if(@$this->mess != ''){}else{echo @$this->mess;}
                die ('<div class="alert alert-sucess alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Residence Added!</strong><br> Would you like to ... <br />
				 <br/><a href="#" onclick="roomAdd()" > Add rooms. </a> </div>');				
		
		}else{
                
                die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong><br> Failed to add that residence!  <br /> Check to see that it hasn\'t been added
				 </div>');
                
        }
		
	}


//End of Class	
}
?>