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
				die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong><br> Failed To Establish A recovery protocol!<br> <a href="#" class="alert-link">TRY AGAIN</a>.
                                    </div>');
			break; 
			 
			 
			}
			
			
		}else{
				die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong><br>Please provide all the required data <br><a href="#" class="alert-link">TRY AGAIN</a>.
                                    </div>');
		}
		
	}
	
        /* GET RECOVERY KEY  */
	public function do_recovery(){
		
	 $subject = "UEAB RoomRes| Account Activation Link ";
			
			$connect = true;
			$id = $this->id;
			if(@$_SESSION['query_error'] != ''){unset($_SESSION['query_error']);}
			
			include "main.php";
			
			$connection->query("SELECT passwd FROM $this->tbl_name WHERE s_idnum='".$this->s_num."' AND actif='0' LIMIT 1", false);
			$res = $_SESSION['query'];
 
			$passw4ds = array();
			 
			while($results = mysqli_fetch_array($res) ){
				$passw4ds[] = $results['passwd'];
			}
			
			if(@$passw4ds[0] == ''){ 
				die ('<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong><br> The account <code>'.@$this->s_num.'</code> might be activated! <br> <a href="login.php" class="alert-link">Proceed to Login</a>.
                                    </div>');                           
                        }
			
			$obsfu = new obsfucate($passw4ds[0],"recover_password");
			$this->passw4d =  $_SESSION['recovered_password'];
			
			//generate a recovery key
			$clean_reckey = new obsfucate($this->s_num, 'make_recovery_key');
			$this->reckey =	$_SESSION['reckey'];
			
			$this->reclink = "{@$this_site}proc_adds.php?act=room_verification&i=$this->s_num&v=$this->reckey";
			
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
			$custom_image_url = "{@$this_site}new_reservant.png";
			
							
				//Write an email to the  reservant... then give them a congratulatory message!
				if(@$_SESSION['mailed'] != ''){unset($_SESSION['mailed']);}
				$mailit = new mailer($this->s_num ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
				//...
				
				if($_SESSION['mailed']):
                                    die ('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong><br> Your verification code has been sent to <code>'.$this->email.'</code> <br><br>
                                        Please check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!<br><br><a href="login.php" class="alert-link">Login</a>.
                                        </div>');				
					
				else:
				
					die('<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Slight Note!</strong><br> You have been Successfully Registered!<br><br> We were however unable to send a verification email to you on <code> '.$this->email.'
                                            </code> Your Details have however been successfully Saved and you will be able to recover your password. <br><br>
                                            <a href="'.$this->reclink.'" class="alert-link"> continue with Signup </a>.
                                            </div>');
					
				endif;
			
	}
	
	/* GET PASSWORD */
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
			
			if(@$passw4ds[0] == ''){
                            
                           die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong><br> Permanently failed to find the user <code>'.@$this->s_num.'</code><br> <a href="new_reservant.php" class="alert-link"> Create Account </a>.
                                    </div>'); 
                        }
                        
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
				
                                    die('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong><br> Your password has been sent to you on <code> '.$this->email.' </code><br>
                                        Please check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!<br><br>
                                        <a href="login.php" class="alert-link"> Proceed to Login </a>.
                                      </div>');
					
				else:
				
                                    die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>CRITICAL ERROR!</strong><br>  Unable to send password via email to <code> '.@$this->email.' </code><br>
                                        Please consult a residence administrator for assistance <br><br>
                                        <a href="javascript:window.close" class="alert-link"> Exit Application </a>.
                                        </div>');
                                
										
				endif;
		
	
                        
        }
	
	/* GET ADMINISTRATOR PASSWORD */
	public function get_password_c(){
		
		$subject = "UEAB RoomRes| Admin Password Recovery ";
			
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
			
			if(@$passw4ds[0] == ''){ 
                            
                            die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>ERROR!</strong><br> The username <code> '.$this->s_num.' </code> could not be found in the system.<br><br>
                                        <a href="#" class="alert-link"> Try Again </a>.
                                      </div>');
                        }
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
				
					die('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Success!</strong><br> Your password has been sent to you on <code> '.$this->email.' </code><br>
                                        Please check your [JUNK] or [SPAM] folder incase you do not see the message in your inbox!<br><br>
                                        <a href="c_login.php" class="alert-link"> Proceed to Login </a>.
                                      </div>');
				else:
				
					die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>CRITICAL ERROR!</strong><br>  Unable to send password via email to <code> '.@$this->email.' </code><br>
                                        Please consult the system administrator for assistance <br><br>
                                        <a href="mailto:roomres@ueab.ac.ke" class="alert-link"> Write Quick email to sysAdmin </a>.
                                        </div>');
					
				endif;
		
            
        }		
			
//End of Class			
} 
