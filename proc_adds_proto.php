<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/

@session_start();

/*
function sanitize($value)
	{
		
	// Stripslashes
	if (get_magic_quotes_gpc())
	  {
	  	$value = stripslashes($value);
	  }
	// Quote if not a number
	if (!is_numeric($value))
	  {
	  	$value =   mysql_real_escape_string($value) ;
	  }
	  
	return $value;
}
*/

function sanitize($value){

	return str_replace("'","\'",$value);	

}



switch (@$_REQUEST['act']){


	
	
	
	
	
	
	
	
	
	case "new_reservant":
	
		$name 		= @sanitize($_REQUEST['name']);
		$s_idnum 	= @sanitize($_REQUEST['s_idnum']);
		$email 		= @sanitize($_REQUEST['email']);
		$tel 		= @sanitize($_REQUEST['tel']);
		$passw4d 	= @sanitize($_REQUEST['passwd']);
		$passw4d2 	= @sanitize($_REQUEST['passwd2']);
		$gender 	= @sanitize($_REQUEST['gender']);
		
		$error_str = "";
		
		if($passw4d != $passw4d2){$error_str .= "Your Passwords Do not match! \n\n";}else if(strlen($passw4d) < 5){$error_str .= "Your password is too short! (use more than 4 characters)\n\n";}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){$error_str .= "Your email address is invalid! \n\n";}
		if(strlen($name) < 7){$error_str .= "Your name is too short! (use more than 6 characters)\n\n";}
		if(strlen($s_idnum) < 10){$error_str .= "Your ID Number is too short! \n\n";}
		if(strlen($tel) < 10){$error_str .= "Your Telephone Number is too short! \n\n";}
		if(strlen($gender) == 0){$error_str .= "You have to pick a gender! \n\n";}
		
		if(($error_str) != ''){
			echo '<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal" style="background:black; min-width:30%;" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class=" modal-title navbar-inverse " style="color:white; background: black;">Application Response</div>
                                  <div class="modal-content" style="color:white; background: black;">
                                   <code>'.$error_str.'</code>
                                  </div>
                                </div>
                              </div>
                              ';
                        exit;
		}else{
			
			//proceed with program code here!
			include 'add_reservant.php';
			$new_reservant = new reservant($name, $s_idnum, $tel, $email, $passw4d, $gender);
			$new_reservant->signup();
			unset($new_reservant);
                        exit;
		}
		
	break;
	
	
	
	
	case "room_verification":
	
		$idnum 	= @sanitize($_REQUEST['i']);
		$reckey = @sanitize($_REQUEST['v']);
		
		$id = 'proc_adds.php';
		$connect = true;
		include "main.php";
		
		if(@($_SESSION['num_rows']) != ''){unset($_SESSION['num_rows']);}
		
		if(@($_SESSION['query']) != ''){ unset($_SESSION['query']);}
		
		if(@($_SESSION['query_error']) != ''){unset($_SESSION['query_error']);}
		
		
		//echo $idnum,"<br />",$reckey,"<br />";
		
		$connection->num_rows("SELECT * FROM reservants WHERE s_idnum='$idnum' ", false);
		
		//echo $_SESSION['num_rows'];
		//exit;
		
		if($_SESSION['num_rows'] == 0){
			
			if(@($_SESSION['mailed']) != ''){unset($_SESSION['mailed']);}
			
			$mailit = new mailer('Connection Helpdesk','ianmin2@live.com','UEAB|RoomRes ERROR!!',"The User <code>$idnum</code> with the recovery key <code>$reckey</code> Failed to confirm His/Her registration! <br /><br />Error : <code style='color:green;'>".$_SESSION['query_error'][0]."</code>",'','sendmail');
			
			if($_SESSION['mailed']):
				
				die('<script>alert("There was an error while trying to process your verification!\n\n Please write an SMS Begining with the word ROOMSUEAB! followed by your ID NUMBER to The number +254725678447\n\n Sorry for any inconvenience.\n\n\nA support error message has been posted to the application maintainers!");</script>');
				
				//echo '<script>alert("Account activated!"); window.location="login.php";<//script>';
				unset($mailit);
				exit;
			else:
				die('<script>alert("There was an error while trying to process your verification!\n\n Please write an SMS Begining with the word ROOMSUEAB! followed by your ID NUMBER to The number +254725678447\n\n Sorry for any inconvenience.");</script>');
			
			endif;
			
		}else{
			
			$connection->query("UPDATE reservants SET actif='1' WHERE s_idnum='$idnum'");
			
			if($_SESSION['query']):
				
				echo '<script>alert("Thank you!\n\n The user account " + '.json_encode(strtoupper($idnum)).' + " has been ACTIVATED!");</script>';
				
				$_SESSION['l031n45'] = $idnum;
				unset($mailit); 
				$redir = new redirect('login.php');
				die();
				
			endif; 
			
		}
		
		
	break; 
	
	
	
	
	
	case "new_admin":

		$name 		= @sanitize($_REQUEST['name']);
		$a_idnum 	= @sanitize($_REQUEST['a_idnum']);
		$email 		= @sanitize($_REQUEST['email']);
		$passw4d 	= @sanitize($_REQUEST['passwd']);
		$passw4d2 	= @sanitize($_REQUEST['passwd2']);
			
		$error_str = "";
		
		if($passw4d != $passw4d2){$error_str .= "The  Passwords Do not match! \n";}else if(strlen($passw4d) < 5){$error_str .= "That password is too short! use more than 4 characters\n";}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){"That email address is invalid! \n";}
		if(strlen($name) < 7){$error_str .= "That name is too short! (use more than 6 characters)\n";}
		if(strlen($a_idnum) < 10){$error_str .= "Your ID Number is too short! \n";}
			
		if(($error_str) != ''){
			echo '<script>alert("YOU HAVE THE FOLLOWING ERRORS:\n\n"+'.json_encode($error_str).'); history.back();</script>';
                        exit;
		}else{
			
			//proceed with program code here!
			include 'add_admin.php';
			$new_admin = new admin($name, $a_idnum, $email, $passw4d);
			$new_admin->signup();
			unset($new_admin); 
                        exit;
		}

	break;
	
	
	
	
	case "new_trimester":
	
		$name = @sanitize($_REQUEST['name']);
		$year = @sanitize($_REQUEST['year']);
		
		if(strlen($name) < 5 ){
			die('<script> alert("PLEASE ENTER LONG ENOUGH A TRIMESTER TITLE!"); history.back();</script>');
		}
		
		include "add_trimester.php";
		$new_trimester = new trimester(@$name, @$year);
		$new_trimester->add_trim();
		unset($new_trimester);
                exit;
	
	break;
	
	
	
	case "request_password_c":
	
		include "add_recovery.php";
		$paski = new recovery(@sanitize($_REQUEST['username']),"passwd","passwd_c");
		unset($paski);
                exit;
		
	break;
	 
	
	
	case "clear_room":
	
		$id = "room_clearing";
		include "de_allocate.php";
		$det = new de_allocator(@sanitize($_REQUEST['id_number'])); 
		unset($det);
                exit;
	break;
		
	
	case "5346)7454dm1_basic_pro":
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->basic_pro_search(@sanitize($_REQUEST['stringy']));
		unset($search);	
                exit;
	break; 
	
	case "detonate":
		include "add_reservant.php";
		$resv = new reservant("",@sanitize($_REQUEST['username']),"","","","");
		$resv->deactivate();
		unset($resv);
                exit;
	break;
		
	case "power_switch":
	
		$stat = @sanitize($_REQUEST['stat']);
		//die (' <script>alert(" " + '.json_encode($stat).' + " " ); <script>'); 
		//if(@$stat != ''){
			include 'system_on_off.php';
			$switcher = new sys_switch($stat);
			unset($switcher);
                        exit;
		//}else{
		//	echo '<h2>:-{<br /><br /> Failed to interprete command!</h2>';
		//	die;
		//}
		
	break;
	
	case "visual_stat":
	
		include "system_status.php";
		$draw = new sys_stat();
		unset($draw);
                exit;
		
	break;
		
	case "adminUpdate":
	
		include "alter_admin.php";
		$changes = new alter_admin(@sanitize($_REQUEST['name']), @sanitize($_REQUEST['username']), @sanitize($_REQUEST['email']), @sanitize($_REQUEST['passwd']), @sanitize($_REQUEST['apos'])); 
		$changes->alter_admin();
		unset($changes);
                exit;
	
	break;
		
	default: 
		die ("<script>alert(':-{ ! }-: \\n\\n AUTHENTICATION TEST FAILED!.\\n\\nPlease consult administrator.'); history.back(1);</script>");
	break;

}



