<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
@session_start();
class admin{
	
	public $id = "add_admin.php"; 
	public $tbl_name = "admin";
	public $name;		public $a_num;			
	public $email;		public $passw4d;			
	
	public function __construct($admin_name, $admin_idnumber, $admin_email, $admin_password){
		
		include "admin_tools.php";
		
		$this->email 	= @$admin_email;
		$this->name 	= @$admin_name;
		$this->a_num 	= @$admin_idnumber;
		$this->passw4d 	= @$admin_password;
		
					
	}
	
	public function signup(){
		
		$subject = "UEAB RoomRes| You have been made an administrator ";
		
		$connect = true;
		
		if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
		$id = $this->id;
		include "main.php";
				
		//Encrypt password and generate a recovery key
		$clean_pass   = new obsfucate($this->passw4d, 'make_password');
		$clean_reckey = new obsfucate($this->a_num, 'make_recovery_key');
		
		$this->passw4d2 = $_SESSION['passwd'];
		$this->reckey =	$_SESSION['reckey'];
		
		$this->reclink = "{$this_site}proc_adds.php?act=admin_verification&i=$this->a_num&v=$this->reckey";
		
				
		$this->message_content  = "Username: ".$this->a_num."\n\r";
		$this->message_content .= "Password: ".$this->passw4d."\n\r";
		$this->message_content .= "<a href='".$this->reclink."'> Click Here to confirm your apointment</a>\n\r";
							
		$custom_image_url = "{$this_site}new_admin.png";
		
		$connection->query("INSERT INTO $this->tbl_name (name, a_idnum, email, paski, gender) VALUES ('$this->name','$this->a_num','$this->email', '$this->passw4d2','$_SESSION[u56_gender]') ", true);
		
		
			
			//Write an email to the new reservant... then give them a congratulatory message!
			if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
			$mailit = new mailer($this->name ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
			//...
			
			if($_SESSION['mailed']):
			
				echo '<script>alert("Congratulations!\n\n You have added an administrator! \n\n Please ask them to go to their email address --- ("+'.json_encode($this->email).' + ") --- to verify the apointment.\n\nPlease check the [JUNK] or [SPAM] folder incase you do not see the message in the inbox!"); window.location="login.php";</script>';
				
			else:
			
				die("<center>
				    <link rel='stylesheet' href='".$mailit->csslink."' > <h3 style='color:#F00;'> Unable to send Verification email.</h3><br /><br />
				    <h4 style='color:green;'>Your Details have however been successfully Saved and you will be able to recover your password. </h4>				
					<a href='".$this->reclink."'><button id='signup_button' style='border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; '> Click Here To continue with the Administrator addition.</button>
				   </center>
				");
				
			endif;
			
		
		
	}

//End of class	
}

?>