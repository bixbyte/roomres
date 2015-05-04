<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/
@session_start();
class reservant{
	
	public $id = "add_reservant.php"; 
	public $tbl_name = "reservants";
	public $name;		public $s_num;			public $tel;
	public $email;		public $passw4d;			public $gender;
	
	public function __construct($reservant_name, $reservant_idnumber, $reservant_telephone, $reservant_email, $reservant_password, $reservant_gender){
		
		$this->email 	= @strtolower($reservant_email);
		$this->gender 	= @strtolower($reservant_gender);
		$this->name 	= @$reservant_name;
		$this->s_num 	= @strtoupper($reservant_idnumber);
		$this->passw4d 	= @$reservant_password;
		$this->tel 		= @$reservant_telephone;
					
	}
	
	public function signup(){
		
		$subject = "UEAB RoomRes| Confirm Signup ";
		
		$connect = true;
		$id = $this->id;
		if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
		
		include "main.php";
		
		//Encrypt password and generate a recovery key
		$clean_pass   = new obsfucate($this->passw4d, 'make_password');
		$clean_reckey = new obsfucate($this->s_num, 'make_recovery_key');
		
		$this->passw4d2 = $_SESSION['passwd'];
		$this->reckey =	$_SESSION['reckey'];
		
		$this->reclink = "{$this_site}proc_adds.php?act=room_verification&i=$this->s_num&v=$this->reckey";
		
				
		$this->message_content  = 'Username: '.$this->s_num."<br />";
		$this->message_content .= 'Password: '.$this->passw4d."<br />";
		$this->message_content .= $this->reclink."<br />";
		$this->message_content .= "<br />";
		$this->message_content .= 'If the above link does not work, copy the link below and paste it into your browsers URL bar';
		$this->message_content .= "<br />";
		$this->message_content .= $this->reclink;
		$this->message_content .= "<br />";
							
		$custom_image_url = "{$this_site}$this->reclink";
		
		$connection->query("INSERT INTO $this->tbl_name (name, s_idnum, gender, email, tel, passwd, rnum, reckey, actif) VALUES ('$this->name','$this->s_num','$this->gender','$this->email','$this->tel', '$this->passw4d2',0, '$this->reckey', 1) ", true);
		
		
			
			//Write an email to the new reservant... then give them a congratulatory message!
			if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
			$mailit = new mailer($this->name ,$this->email, $subject, $this->message_content, $this->reclink, 'sendmail');
			//...
			
			if($_SESSION['mailed']):
			
				echo '<script>alert("You have been Successfully Registered!\n\n Please go to your email address --- ("+'.json_encode($this->email).' + ") --- to verify your subscription.\n\nPlease check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!"); window.location="login.php";</script>';
				
			else:
			
				die("<center>
				    <link rel='stylesheet' href='".$mailit->csslink."' > <h3 style='color:#F00;'> Unable to send Verification email.</h3><br /><br />
				    <h4 style='color:green;'>Your Details have however been successfully Saved and you will be able to recover your password. </h4>				
					<a href='".$this->reclink."'><button id='signup_button' style='border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; '> Click Here To continue with the signup.</button>
				   </center>
				");
				
			endif;
			
		
		
	}
	
	 function deactivate(){
		 
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		$connection->query("UPDATE $this->tbl_name SET actif='0' WHERE s_idnum='$this->s_num'", true);
		if($_SESSION['query']){
			echo '<script>alert("User Deactivated!"); history.back();</script>';
			exit;
		}else{
			echo '<script>alert("ERROR!\n\n Something went wrong while deactivating that user account."); history.back();</script>';
			exit;
		}
		
	}

//End of class	
}

?>