<?php
/*
	* Author: Ian Innocent 
	* For: The Connection
*/
 @session_start();

class connection{
	
	public $db_name;		public $db_host; 		public $db_username;
	public $db_passwd;

//The class constructor	
	public function __construct($db_name, $db_host, $db_username, $db_passwd){
	
		if(@$db_host != '' && @$db_name != '' && @$db_username != ''){
			$this->db_host 		= 	@$db_host;
			$this->db_name 		= 	@$db_name;
			$this->db_passwd 	= 	@$db_passwd;
			$this->db_username 	= 	@$db_username;
			$this->db_connect();
			
		}else{
			die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> Could Not Recognize Database connection Criteria <a href="index.php" class="alert-link">Try Again</a>.
			</div>
                        ');
		}
	
	}
	
// The database connector!

	public final function db_connect(){
		
		$this->con = mysqli_connect($this->db_host,$this->db_username,$this->db_passwd,$this->db_name);
		
		if (mysqli_connect_errno($this->con)){
                        echo '<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> Mysqli Error Encountered! <a href="#" class="alert-link">'.mysqli_connect_error().'</a>.
			</div>';
                           exit;
			
		}
	}
	
	public function die_on_err($stops){
		if(@$stops){
			$_SESSION['query_error'] = array();
			$_SESSION['query_error'][] = mysqli_error($this->con);
                        echo '<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Error!</strong><br> Mysqli Error Encountered! <a href="#" class="alert-link">'.json_encode(mysqli_error($this->con)).'</a>.
			</div>';
                        exit;
		}else{
			if(!isset($_SESSION['query_error'])){$_SESSION['query_error'] = array();} 
			$_SESSION['query_error'][] = mysqli_error($this->con);
		}
	}
	
	public function query($statement, $stops){  
	
		$_SESSION['query'] = mysqli_query($this->con,"$statement")or $this->die_on_err($stops); 
		
	}
	
	
	public function num_rows($statement, $stops){
		
		$this->query($statement, $stops);
		$stmt = $_SESSION['query'];
		$_SESSION['num_rows'] = mysqli_num_rows( $stmt );
				
	}
	
//End of Class	
}

	