<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/

	@session_start();
	
class alter_admin{
	
	public $id = "alter_admin.php";
	public $tbl_name = 'admin';
	
	public 	$nom;			public $idnum;			
	public	$email;			public	$passw4d;			public $posn;
	
	public function __construct($name, $a_idnum, $email, $paski, $apos){
		
		if($apos == ""){
			echo '<script> alert("Error while establishing file index"); </script>';
			exit;
		}
		
		if($name!="" && $a_idnum!="" && $email!="" && $paski != "" ){
				
		include "admin_tools.php";
		
		$this->nom 	= $name;
		$this->idnum	= $a_idnum;
		$this->email	= $email;
		$this->passw4d	= $paski;
		$this->posn		= $apos; 
					
		}else{
			echo '<script>alert("ERROR:\n\n None of the details can be left blank!");</script>';
			exit;
		}
		
	}
	
	public function alter_admin(){
		
		//Include the iarasoft framework
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		//obsfucate the password if it is not the same as the one already in the database.
		$connection->num_rows("SELECT * FROM $this->tbl_name WHERE (id='$this->posn') AND (paski='$this->passw4d') AND (a_idnum='$this->idnum')",true);
		$ispass = $_SESSION['num_rows'];
		
		//If the password passed is the same as that in the db
		if($ispass == 1):
		
			//$sql = "UPDATE `connect_db`.`admin` SET `name` = \'Ladies Dorm\', `a_idnum` = \'awooms0010\', `email` = \'ianmin2@live.com\' WHERE `admin`.`id` = 2;";
			$connection->query("UPDATE $this->tbl_name SET name='$this->nom' , email='$this->email' , a_idnum='$this->idnum' WHERE id='$this->posn';",true);
			
			if($_SESSION['query']){
				
				echo '<script>alert("Your details/credentials have been altered"); history.back();</script>';	
				
			}else{
				//Tell the user that their request was not so successful and don't forgegt NOT to leave them hanging!!
				
				echo '<script>alert("SORRY!\n\n There was an error while changing your details. \n\n Please try again!"); history.back();</script>';
				
			}
			
		else:
		
		$connection->num_rows("SELECT * FROM $this->tbl_name WHERE (paski='$this->passw4d') AND (id='$this->posn')",true);
		$keepass = $_SESSION['num_rows'];
		
		//Update the database password (where necessary) along with other details
		if($keepass == 1){
			$make_pass = $this->passw4d;
		}else{
			$make_pass = new obsfucate($this->passw4d, "make_password");
		}
			$connection->query("UPDATE $this->tbl_name SET name='$this->nom', paski='$_SESSION[passwd]', email='$this->email', a_idnum='$this->idnum' WHERE id='$this->posn'",true);
			
			if($_SESSION['query']){
				
				//update user credentials
				if($this->posn == $_SESSION['u56_id']){				
					echo '<script>
							alert("Your details/credentials have been altered"); window.location="proc_adds.php?act=logout&to=c_login.php";			                      	  </script>';	
				}else{
					echo '<script>
							alert("Your details/credentials have been altered"); history.back();
						  </script>';
				}
				
			}else{
				//Tell the user that their request was not so successful and don't forgegt NOT to leave them hanging!!
				
				echo '<script>alert("SORRY!\n\n There was an error while changing your details. \n\n Please try again!"); history.back();</script>';
				
			}
			
		endif;
		
		
		
		
	}
	
//End of class	
}

?>