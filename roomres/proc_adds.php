

<?php
/* 
	Author: bixbyte
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


	case "new_residence":
	
		include "add_residence.php";
		$new_residence = new residence(@sanitize($_REQUEST['name']), @sanitize($_REQUEST['gender'])); 
		$new_residence->add_res();
		
		unset($new_residence); 
		
	break;
	
	
	
	case "new_room":
	
		$start 		= @sanitize($_REQUEST['room_start']);
		$stop  		= @sanitize($_REQUEST['room_end']);
		$residence 	= @sanitize($_REQUEST['residence']);
		$capacity  	= @sanitize($_REQUEST['room_capacity']);
		
		include "add_room.php";
		$new_room = new room($start, $stop, $residence, $capacity);
		
		if(@sanitize($start) != '' && @sanitize($stop) != ''){
			$new_room->add_rooms();
		}else{
			$new_room->add_room();
		}
		
		unset($new_room);	
	break;
	
	case "new_room_reserve":
		
					
		if(@sanitize($_REQUEST['room_start']) != ''):
			
				$start 		= @sanitize($_REQUEST['room_start']);
				$stop  		= @sanitize($_REQUEST['room_end']);
				$residence 	= @sanitize($_REQUEST['residence']);
				
				include "admin_rooms.php";
				$new_room = new admin_room($start, $stop, $residence);
				
				if(@sanitize($start) != '' && @sanitize($stop) != ''){
					$new_room->add_rooms();
				}else{
					$new_room->add_room();
				}
				unset($new_room); 
				exit;
		
		elseif(@sanitize($_REQUEST['room_start_1']) != '') :
				
				$start 		= @sanitize($_REQUEST['room_start_1']);
				$stop  		= "";
				$residence 	= @sanitize($_REQUEST['residence_1']);
				
				include "admin_rooms.php";
				$new_room = new admin_room($start, $stop, $residence);
				$new_room->one_avail();
				unset($new_room); 
				exit; 
                
		elseif(@sanitize($_REQUEST['room_start_2']) != ''):
				echo "Good!";
				$start 		= @sanitize($_REQUEST['room_start_2']);
				$stop  		= @sanitize($_REQUEST['room_end_2']);
				$residence 	= @sanitize($_REQUEST['residence_2']);
				
				include "admin_rooms.php";
				$new_room = new admin_room($start, $stop, $residence);
				
				if(@$stop != ''){
					$new_room->many_avail();
				}else{
					$new_room->one_avail();
				}
				unset($new_room); 
				exit;            
           
		endif;
		
		
	break;
	
	
	
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
			echo '<script>alert("YOU HAVE THE FOLLOWING ERRORS:\n\n"+'.json_encode($error_str).'); history.back();</script>';
		}else{
			
			//proceed with program code here!
			include 'add_reservant.php';
			$new_reservant = new reservant($name, $s_idnum, $tel, $email, $passw4d, $gender);
			$new_reservant->signup();
			unset($new_reservant);
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
		}else{
			
			//proceed with program code here!
			include 'add_admin.php';
			$new_admin = new admin($name, $a_idnum, $email, $passw4d);
			$new_admin->signup();
			unset($new_admin); 
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
	
	break;
	
	
	case "logout":
		@session_unset();
		include "redirect.php";
		if(@sanitize($_REQUEST['to'])==''){
			$red = new redirect("login.php");
		}else{
			$red = new redirect(@sanitize($_REQUEST['to'])); 
		}
		unset($red);
		die;  
	break;
	
	
	
	case "login":

		$username 	= @sanitize($_REQUEST['username']);
		$passw4d		= @sanitize($_REQUEST['passwd']);
		
		if(@$username !='' &&	@$passw4d != ''){
			
			include "add_login.php";
			$login = new login($username, $passw4d, "do_login");
			unset($login); 
			//die("Username: " .$username. "<br /> Passwd: ". $passw4d." <br />" );
			
		}else{
			
			die('<script>alert("Please fill in all details to continue! \n\n "); history.back();</script>');
							
		}
	
	break;
	
	case "admin_login":
	
		$username 	= @sanitize($_REQUEST['username']);
		$passw4d		= @sanitize($_REQUEST['passwd']);
		
		if(@$username != '' &&	@$passw4d != ''){
			
			include "add_login.php";
			$login = new login(@sanitize($username), @sanitize($passw4d), "admin_login");
			unset($login);	 				
		}else{
			
			die('<script>alert("Please fill in all details to continue! \n\n "); history.back();</script>');
							
		}
	
	break;
	


	case "request_activation":
	
		include 'add_recovery.php';
		$activate = new recovery(@sanitize($_REQUEST['username']), @sanitize($_REQUEST['email']), "reckey"); 
		unset($activate);
	
	break;

	case "request_password":
	
		include "add_recovery.php";
		$paski = new recovery(@sanitize($_REQUEST['username']),"passwd","passwd");
		unset($paski);
		
	break;
	
	case "request_password_c":
	
		include "add_recovery.php";
		$paski = new recovery(@sanitize($_REQUEST['username']),"passwd","passwd_c");
		unset($paski);
		
	break;
	 
	case "book_room":
    
		$id = "room_booking";
		$connect = true;
		include "add_reservation.php";
		$room = new reservation(@sanitize($_REQUEST['r_num']), @sanitize($_REQUEST['residence'])); 
		unset($room);
    
	break;
	
	case "clear_room":
	
		$id = "room_clearing";
		include "de_allocate.php";
		$det = new de_allocator(@sanitize($_REQUEST['id_number'])); 
		unset($det);
	break;
		
	case "5346)7454dm1":
		
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->admin_find(@sanitize($_REQUEST['stringy']));
		unset($search);	
	break;
		
	case "5346)7454dm1_pro":
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->pro_search(@sanitize($_REQUEST['stringy']));
		unset($search);	
	break; 
	
	case "5346)7454dm1_basic_pro":
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->basic_pro_search(@sanitize($_REQUEST['stringy']));
		unset($search);	
	break; 
	
	case "detonate":
		include "add_reservant.php";
		$resv = new reservant("",@sanitize($_REQUEST['username']),"","","","");
		$resv->deactivate();
		unset($resv);
	break;
		
	case "power_switch":
	
		$stat = @sanitize($_REQUEST['stat']);
		//die (' <script>alert(" " + '.json_encode($stat).' + " " ); <script>'); 
		//if(@$stat != ''){
			include 'system_on_off.php';
			$switcher = new sys_switch($stat);
			unset($switcher);
		//}else{
		//	echo '<h2>:-{<br /><br /> Failed to interprete command!</h2>';
		//	die;
		//}
		
	break;
	
	case "visual_stat":
	
		include "system_status.php";
		$draw = new sys_stat();
		unset($draw);
		
	break;
		
	case "adminUpdate":
	
		include "alter_admin.php";
		$changes = new alter_admin(@sanitize($_REQUEST['name']), @sanitize($_REQUEST['username']), @sanitize($_REQUEST['email']), @sanitize($_REQUEST['passwd']), @sanitize($_REQUEST['apos'])); 
		$changes->alter_admin();
		unset($changes);
	
	break;
		
	default: 
		die ("<script>alert(':-{ ! }-: \\n\\n AUTHENTICATION TEST FAILED!.\\n\\nPlease consult administrator.'); history.back(1);</script>");
	break;

}

?>

<html>
<head>

<link rel="icon"  href="favicon.ico"  /></head>
<body style="background:url(printable.fw.png) !important;" >


</body>
</html>
