<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
@session_start();
class recovery{
	
	
	public $id = "add_recovery.php"; 
	public $tbl_name = "reservants";
	public $s_num;				public $email;		public $passw4d;			public $action;
	
	public function __construct($idnum, $email, $action){
		
		if($idnum != '' && $email != ''){
			
			$this->s_num 	= $idnum;
			$this->email 	= $email;
			$this->action 	= $action;
			
			switch ($this->action){
			
			case 'reckey':
				$this->do_recovery();
			break;
			
			case 'passwd':
				$this->get_password(); 
			break; 
			
			case 'passwd_c':
				$this->get_password_c(); 
			break;
			
			default:
				die('<script>alert("Failed to establish a recovery protocol!"); history.back();</script>');
			break; 
			 
			 
			}
			
			
		}else{
			die('<script>alert("Enter the required details!"); history.back();</script>');
		}
		
	}
	
	public function do_recovery(){
		
	 $subject = "UEAB RoomRes| Account Activation Link ";
			
			$connect = true;
			$id = $this->id;
			if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
			
			include "main.php";
			
			$connection->query("SELECT passwd FROM $this->tbl_name WHERE s_idnum='$this->s_num' AND actif='0' LIMIT 1", false);
			$res = $_SESSION['query'];
 
			$passw4ds = array();
			 
			while($results = mysqli_fetch_array($res) ){
				$passw4ds[] = $results['passwd'];
			}
			
			if($passw4ds[0] == ''){ die('<script>alert("one of the following errors occured: \n\n 1. ID NUMBER NOT FOUND! \n\n 2. THAT ACCOUNT IS ALREADY ACTIVATED."); history.back();</script>');}
			
			$obsfu = new obsfucate($passw4ds[0],"recover_password");
			$this->passw4d =  $_SESSION['recovered_password'];
			
			//generate a recovery key
			$clean_reckey = new obsfucate($this->s_num, 'make_recovery_key');
			$this->reckey =	$_SESSION['reckey'];
			
			$this->reclink = "{$this_site}proc_adds.php?act=room_verification&i=$this->s_num&v=$this->reckey";
			
			$connection->query("UPDATE $this->tbl_name SET email='$this->email' WHERE s_idnum='$this->s_num' AND actif='0'",false);
			if(@$_SESSION['query']){}
			
					
			$this->message_content  = "\n\r";
			$this->message_content .= 'Username:  '.$this->s_num."\n\r";
			$this->message_content .= 'Password:  '.$this->passw4d."\n\r";
			$this->message_content .= "\n\r";
			$this->message_content .=  $this->reclink;
			$this->message_content .= '"\n\r"';
			$this->message_content .= 'If you cannot click on the above link, copy and paste the following into your browser and continue<br /> ';
			$this->message_content .= '"\n\r"';
			$this->message_content .= $this->reclink;
			$this->message_content .= "\n\r";		
			$custom_image_url = "{$this_site}new_reservant.png";
			
							
				//Write an email to the  reservant... then give them a congratulatory message!
				if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
				$mailit = new mailer($this->s_num ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
				//...
				
				if($_SESSION['mailed']):
				
					echo '<script>alert("\n\n Please go to your email address --- ("+'.json_encode($this->email).' + ") --- to verify your subscription.\n\nPlease check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!"); window.location="login.php";</script>';
					
				else:
				
					die("<center>
						<link rel='stylesheet' href='".$mailit->csslink."' > <h3 style='color:#F00;'> Unable to send Verification email.</h3><br /><br />
						<h4 style='color:green;'>Your Details have however verified and you will be able to recover your password. </h4>				
						<a href='".$this->reclink."'><button id='signup_button' style='border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; '>Activate My Account</button>
					   </center>
					");
					
				endif;
			
	}
	
	
	public function get_password(){
		
		$subject = "UEAB RoomRes| Password Recovery ";
			
			$connect = true;
			$id = $this->id;
			if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
			
			include "main.php";
			
			$connection->query("SELECT * FROM $this->tbl_name WHERE s_idnum='$this->s_num' LIMIT 1", false);
			$res = $_SESSION['query'];
 
			$passw4ds = array();
			$mail = array();
			 
			while($results = mysqli_fetch_array($res) ){
				$passw4ds[] = $results['passwd'];
				$mail[] = $results['email'];
			}
			
			if(@$passw4ds[0] == ''){ die('<script>alert("THE ID NUMBER  " + "  " + "  " + '.json_encode(strtoupper($this->s_num)).' + "  " + "  " + " WAS NOT FOUND!"); history.back();</script>');}
			@$this->email = @$mail[0];
			
			$obsfu = new obsfucate($passw4ds[0],"recover_password");
			$this->passw4d =  $_SESSION['recovered_password'];
			
								
			$this->message_content  = "\n\r";
			$this->message_content .= 'Username:  '.$this->s_num."\n\r";
			$this->message_content .= 'Password:  '.$this->passw4d."\n\r";
			$this->message_content .= "\n\r";
								
			$custom_image_url = "{$this_site}new_reservant.png";
			
							
				//Write an email to the  reservant... then give them a congratulatory message!
				if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
				$mailit = new mailer($this->s_num ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
				//...
				
				if($_SESSION['mailed']):
				
					echo '<script>alert("\n\n Your Password has been sent to your email --- ("+'.json_encode($this->email).' + ") --- .\n\nPlease check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!"); window.location="login.php";</script>';
					
				else:
				
					die("<center>
						<link rel='stylesheet' href='".$mailit->csslink."' > <h3 style='color:#F00;'> Unable to send password via email.</h3><br /><br />
						<h4 style='color:green;'> Unable to send password via email.\n\n\nPlease consult a residence administrator for assistance</h4>				
						<a href='javascript:history.back();'><button id='signup_button' style='border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; '>Go Back</button>
					   </center>
					");
					
				endif;
		
	
	}
	
	
	public function get_password_c(){
		
		$subject = "UEAB RoomRes|Admin Password Recovery ";
			
			$connect = true;
			$id = $this->id;
			if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
			
			include "main.php";
			
			$connection->query("SELECT * FROM admin WHERE a_idnum='$this->s_num' LIMIT 1", false);
			$res = $_SESSION['query'];
 
			$passw4ds = array();
			$mail = array();
			 
			while($results = mysqli_fetch_array($res) ){
				$passw4ds[] = $results['paski'];
				$mail[] = $results['email'];
			}
			
			if(@$passw4ds[0] == ''){ die('<script>alert("THE USERNAME  " + "  " + "  { " + '.json_encode(strtoupper($this->s_num)).' + " }  " + "  " + " WAS NOT FOUND!"); history.back();</script>');}
			@$this->email = @$mail[0];
			
			$obsfu = new obsfucate($passw4ds[0],"recover_password");
			$this->passw4d =  $_SESSION['recovered_password'];
			
								
			$this->message_content  = "\n\r";
			$this->message_content .= 'Username:  '.$this->s_num."\n\r";
			$this->message_content .= 'Password:  '.$this->passw4d."\n\r";
			$this->message_content .= "\n\r";
								
			$custom_image_url = "{$this_site}new_reservant.png";
			
							
				//Write an email to the  reservant... then give them a congratulatory message!
				if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
				$mailit = new mailer($this->s_num ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
				//...
				
				if($_SESSION['mailed']):
				
					echo '<script>alert("\n\n Your Password has been sent to your email --- ("+'.json_encode($this->email).' + ") --- .\n\nPlease check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!"); window.location="c_login.php";</script>';
					
				else:
				
					die("<center>
						<link rel='stylesheet' href='".$mailit->csslink."' > <h3 style='color:#F00;'> Unable to send password via email.</h3><br /><br />
						<h4 style='color:green;'>Please consult <a href='mailto:ianmin2@ueab.ac.ke'>system admin</a> for assistance</h4>				
						<a href='javascript:history.back();'><button id='signup_button' style='border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; '>Go Back</button>
					   </center>
					");
					
				endif;
		
	}
			
			
//End of Class			
} 



?>