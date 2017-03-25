<?php
/* 
	Author: bixbyte
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
		exit;  
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
    
    
   /* Handle administrator login requests */ 
    case "admin_login":

    $username 	= @sanitize($_REQUEST['username']);
    $passw4d		= @sanitize($_REQUEST['passwd']);

    if(@$username != '' &&	@$passw4d != ''){

        include "add_login.php";
        $login = new login(@sanitize($username), @sanitize($passw4d), "admin_login");
        unset($login);
        exit;
    }else{

        die('<script>alert("Please fill in all details to continue! \n\n "); history.back();</script>');

    }

    break;
    
    
    /* Administrator password recovery */
    case "request_password_c":

        include "add_recovery.php";
        $paski = new recovery(@sanitize($_REQUEST['username']),"passwd","passwd_c");
        unset($paski);
        exit;

    break;
    
    /* Perform Residence Addition */
    case "new_residence":

        include "add_residence.php";
        $new_residence = new residence(@sanitize($_REQUEST['name']), @sanitize($_REQUEST['gender'])); 
        $new_residence->add_res();

        unset($new_residence);
        exit;

    break;
    
    /* Handle Room Addition Requests */
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
        exit;

    break;

    
    /* Specially Reserve Rooms */
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
    
    /* Handle reservation reset (single and multiple) */
    case "clear_room":	
    	
		$id = "room_clearing";
		include "de_allocate.php";
		$det = new de_allocator(@sanitize($_REQUEST['id_number'])); 
		unset($det);
        exit;
        
	break;
    
    /* Confirmed Resident search  { Non Gender Biased }*/
    case "5346)7454dm1_basic_pro":
    
        $id = "search.php";
        include "search.php";
        $search = new search();
        $search->basic_pro_search(@sanitize($_REQUEST['stringy']));
        unset($search);	
        exit;
    
	break; 
    
    /* Deactivate a user account */
    case "detonate":
    
		include "add_reservant.php";                	
        $resv = new reservant("",@sanitize($_REQUEST['username']),"","","","");
        $resv->deactivate();
        unset($resv);
        exit;
    
	break;
    
	default: 
		die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> UNKNOWN REQUEST!<br> <a href="#" class="alert-link">TRY AGAIN</a>.
			</div>');
	break;

}



