<?php
/* 
	Author: bixbyte
	For: The University Of Eastern Africa Baraton
*/
@session_start();
class room{
	
	private $id = "add_room.php";
	private $tbl_name = "rooms";
	public $start; 			public $residence; 			public $capacity;
	public $stop;
	
	public function __construct($start, $stop, $residence, $capacity){
		
		include "admin_tools.php";
		
		if(@$start != '' &&  @$residence != '' && @$capacity != ''){
            if( (@$stop - @$start) > 30000){
                die ('<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Warning!</strong><br>  Please add rooms in portions of 30,000 or less. <br> <a href="#" class="alert-link">  </a>.
                        </div>');
            }
			$this->start 		= $start;
			$this->residence 	= $residence;
			$this->capacity 	= $capacity;
			$this->stop 		= @$stop;
							
		}else{
			$id = $this->id;
			include 'main.php';
            die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error:</strong><br>  Please re-enter the required details! <br> <a href="#" class="alert-link">  </a>.
                        </div>');
			}
	}
	
	public function add_room(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
		$connection->query("INSERT INTO $this->tbl_name (r_number, max_capacity, curr_capacity, residence, available) VALUES ('$this->start','$this->capacity', 0, '$this->residence', 1)", true);		
			
		if($_SESSION['query']){
            die ('<div class="alert alert-success alert-bold-border fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success:</strong><br> Successfully added room. <br> <a href="#" class="alert-link">  </a>.
                        </div>');			
		}else{
            
            die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error:</strong><br> Failed to add room! <br> <a href="#" class="alert-link">  </a>.
                        </div>');
            
        }
		
		
	}
	

    
	public function add_rooms(){
		
		$id = $this->id;
		$connect = true;
		
		include "main.php";
		
		$_SESSION['query_error'] = "";
		
        $progress = "<code style='color: teal; overflow: none; '>";
    
		$mYdata = array();
		for($this->start; $this->start <= $this->stop; ($this->start+=1)){
			/*Test Area*/
			
			$progress .= "{$this->start},";
			$mYdata[] = "('".$this->start."','".$this->capacity."', '0','".$this->residence."', '1')";
			
            
			
			/*End of test Area*/
		}
		$valDataz = implode(", ", $mYdata);
		$_SESSION['query_error'] = "";
		$connection->query("INSERT INTO $this->tbl_name(r_number, max_capacity, curr_capacity, residence, available) VALUES $valDataz ",false);
		if($_SESSION['query']){
            $success = true;            
        }else{
           $success = false;
        }
    
        $progress .= " <br><br>Room Initialization complete</code>";
    
			//Comment the statements below enable the viewing of errors that occur during room addition processing
			//Remember to add a 'Go back' link / Button
    
            $class = ( $success ) ? "alert-success" : "alert-danger";
            $title = ( $success ) ? " Success:  " : "Error: ";
            $message = ( $success ) ? " Rooms Successfully Added! " : " Failed to process the room addition request. ";
            
        die ('<div class="alert '. $class .' alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>'.$title.'</strong><br> '.$message.'<br> <strong> PROCESS LOG: </strong> <br> '.$progress.' <br> <a href="#" class="alert-link"><br> <strong> Technical Issues Encountered: </strong> </a><br><code style="color: red;"> '. implode("<br>", @$_SESSION['query_error']) .' </code> </div>');
									
	}
	
	
//End of class	
}






?>