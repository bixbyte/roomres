<?php
@session_start();
class de_allocator{
	
	public $id = "de_allocate.php";
	public $idnum; 
	
	public function __construct($identity){
		
		include "admin_tools.php";
		
		if($identity != ''){
			
			$this->idnum = strtolower(@$identity);
			
			if($this->idnum == 'all'){
				
				$this->drop_all();
				
			}else{
				
				$this->drop_one();
				
			}
		}else{
            die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong> <i class="fa fa-times-circle fa-2x" style="color:red;"></i></strong><br> <br />You made an ungranteable request!<br> <a href="#" class="alert-link">TRY AGAIN</a>.
			</div>');
        }
		
	}
	
	
	protected function drop_all(){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		//Set the current capacity of all rooms to zero
		//Clear the current reservation status of all students
		$connection->query("UPDATE rooms SET curr_capacity='0'",true);
		if($_SESSION['query']){}
		$connection->query("UPDATE reservants SET rnum='0', res='0', reg='1' ",true);
		if($_SESSION['query']){
			echo('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><i class="fa fa-check-circle" style="color: green"></i></strong><br> All Rooms that are not specially reserved have been made available for booking.<br><br> Sending email ...
			');
		}else{
			die('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong><i class="fa fa-times-circle" style="color:red;"></i></strong><br> Failed to de-allocate rooms<br>Please try again.
			</div>');
		}
				
		//Automatically send an email to all active users informing them of the opening of the new  room reservation window.
		//Format:
		//$mailit = new mailer($this->name ,$this->email, $subject, $this->message_content, $custom_image_url, 'sendmail');
        
        $users = $connection->printQueryResults("SELECT email,name FROM reservants WHERE actif=1");
        $numUsers = $connection->num_rows("SELECT id FROM reservants WHERE actif=1");
        foreach( $users as $user ){
            $mailit = new mailer( $user["name"], $user["email"], "RE: Room reservation is now open", "This is to inform you that the period for room reservation is now open. <br><br> If you had reserved your room prior to this message, your reservation data has been reset and you are requested to do it again right away. <br><br>Thank you for your cooperation. ", "","sendmail" );
        }
        echo('<br><br>
			  <strong><i class="fa fa-envelope" style="color: green;"></i></strong><br> An email notification has been sent to all '.$numUsers.' active residents from all residences.
			');
       if( $connection->query("UPDATE 4v41l SET stat=1, img='on.png'", false) ){       
           echo "<br><br><code style='color:blue;'> Room Reservation Activated!</code> </div>";           
       }else{
           echo "<br><br><code>Failed to activate room reservation. <br>Please activate it manually</code></br>";
       }           
        exit;
        
	}
	
	
	protected function drop_one(){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
        
        $users = explode(",", $this->idnum);
        foreach( $users as $user ){
            
            $this->idnum = $user;
        
            $numUsers = $connection->num_rows("SELECT * FROM reservants WHERE s_idnum='$this->idnum'", true);

            if( $numUsers > 0 ){

                //Pick the selected reservant's current room and residence.
                $connection->query("SELECT * FROM reservants WHERE s_idnum='$this->idnum'",true);
                $resres = $_SESSION['query'];
                while($resdet = mysqli_fetch_array($resres)){
                    $drop_res 	= $resdet['res'];
                    $drop_room 	= $resdet['rnum'];			
                }

                //Pick the room's current capacity 
                $connection->query("SELECT curr_capacity FROM rooms WHERE r_number='$drop_room' AND residence='$drop_res' ", true);
                $cap = $_SESSION['query'];
                while($capres = mysqli_fetch_array($cap)){
                    $curcap = $capres['curr_capacity'];
                }
                $newcap = $curcap - 1;

                //Update the reservant's current room capacity to what it has  decremented by one
                $connection->query("UPDATE rooms SET curr_capacity='$newcap' WHERE r_number='$drop_room' AND residence='$drop_res'", true);
                if($_SESSION['query']){ 
                    echo('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong><i class="fa fa-check-circle" style="color:green;"></i></strong><br> Room de-populated. <br><br> de-allocating ...
                    ');
                }else{
                   echo('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong><i class="fa fa-times-circle" style="color:red;"></i></strong><br> Failed to de-populate room<br>Please try again.
                    </div>'); 
                }


                //Clear the reservants current booking state
                $connection->query("UPDATE reservants SET rnum='0', res='0', reg='1' WHERE s_idnum='$this->idnum'",true);
                if($_SESSION['query']){ 
                    echo '<br><br> Room de-allocation Successful!<br><br> Reservation activated for user <code style="color:green">'.$this->idnum.'</code> </div>';
                    //exit;
                }else{	

                    echo('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong><i class="fa fa-times-circle" style="color:red;"></i></strong><code>The reservants\' room de-allocation details for <code style="color:blue;">'.$this->idnum.'</code> were not updated!</code><br>Please try again.
                    </div>');

                }		

            }else{
                echo('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong><i class="fa fa-times-circle" style="color:red;"></i></strong><code> The ID <code style="color:blue;">'.$this->idnum.'</code> is not registered in the system.</code><br>Please try again.
                    </div>');
            }
			
        }
        exit;
		
	}
	
	
	
}

?>