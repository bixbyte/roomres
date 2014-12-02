<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
@session_start();

function sanitize($value){

        $str = str_replace("'","\'",$value);
	return 	$str;
}



switch (@$_REQUEST['act']){

    /* Process a login request */
        case "login":

		$username   = @sanitize($_REQUEST['username']);
		$passw4d    = @sanitize($_REQUEST['passwd']);
		
		if(@$username !='' &&	@$passw4d != ''){
			
			include "add_login.php";
			$login = new login($username, $passw4d, "do_login");
			unset($login); 
                        exit;
			//die("Username: " .$username. "<br /> Passwd: ". $passw4d." <br />" );
			
		}else{
			
			die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> That ID Number or Password is Incorrect, you can <a href="new_password.php" class="alert-link">recover your password</a>.
			</div>
');
							
		}
	
	break;
        
    /* Add a reservant */
        case "new_reservant":
	
		$name 		= @sanitize($_REQUEST['name']);
		$s_idnum 	= @sanitize($_REQUEST['s_idnum']);
		$email 		= @sanitize($_REQUEST['email']);
		$tel 		= @sanitize($_REQUEST['tel']);
		$passw4d 	= @sanitize($_REQUEST['passwd']);
		$passw4d2 	= @sanitize($_REQUEST['passwd2']);
		$gender 	= @sanitize($_REQUEST['gender']);
		
		$error_str = "";
		
		if($passw4d != $passw4d2){$error_str .= "Your Passwords Do not match! <br><br>";}else if(strlen($passw4d) < 5){$error_str .= "Your password is too short! (use more than 4 characters)<br><br>";}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){$error_str .= "Your email address is invalid! <br><br>";}
		if(strlen($name) < 7){$error_str .= "Your name is too short! (use more than 6 characters)<br><br>";}
		if(strlen($s_idnum) < 10){$error_str .= "Your ID Number is too short! <br><br>";}
		if(strlen($tel) < 10){$error_str .= "Your Telephone Number is too short! <br><br>";}
		if(strlen($gender) == 0){$error_str .= "You have to pick a gender! <br><br>";}
		
		if(($error_str) != ''){
			echo '<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal" style=" " aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
	
    /* Send password to user */    
        case "request_password":
	
		include "add_recovery.php";
		$paski = new recovery(@sanitize($_REQUEST['username']),"passwd","passwd");
		unset($paski);
                exit;
		
	break;
    
    /* Request for an activation key using a different email address */
        case "request_activation":
	
		include 'add_recovery.php';
		$activate = new recovery(@sanitize($_REQUEST['username']), @sanitize($_REQUEST['email']), "reckey"); 
		unset($activate);
                exit;
	
	break;
    
    /* Perform user logout */
    
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
    

    /* Reserve a room for the user */

    	case "book_room":
    	
		$id = "room_booking";
		$connect = true;
		include "add_reservation.php";
		$room = new reservation(@sanitize($_REQUEST['r_num']), @sanitize($_REQUEST['residence'])); 
		unset($room);
                exit;
	break;
		

	/* Find a student who has reserved a room */

	case "5346)7454dm1":
		
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->admin_find(@sanitize($_REQUEST['stringy']));
		unset($search);	
                exit;
	break;

	/* Admin find all Students */
	case "5346)7454dm1_pro":
		$id = "search.php";
		include "search.php";
		$search = new search();
		$search->pro_search(@sanitize($_REQUEST['stringy']));
		unset($search);	
                exit;
	break; 

	default: 
		die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> AUTHENTICATION FAILED!<br> <a href="#" class="alert-link">TRY AGAIN</a>.
			</div>');
	break;

}



