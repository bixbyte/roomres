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
			die ("<center><h2><code style='color:#F00;'>Critical Error:</code><code style='color:green;'> Could recognize database connection criteria!</code> </h2></center>");
		}
	
	}
	
// The database connector!

	public final function db_connect(){
		
		$this->con = mysqli_connect($this->db_host,$this->db_username,$this->db_passwd,$this->db_name);
		
		if (mysqli_connect_errno($this->con)){
			echo "<center><h2><code style='color:#F00;'>Critical Error:</code><code style='color:green;'> ".mysqli_connect_error()."</code> </h2></center>";
		}
	}
	
	public function die_on_err($stops){
		if(@$stops){
			$_SESSION['query_error'] = array();
			$_SESSION['query_error'][] = mysqli_error($this->con);
			die("<center><h2><code style='color:#F00;'>Critical Error:</code><code style='color:green;'><script type='text/javascript'>alert( 'CRITICAL ERROR:\\n \\n' + ".json_encode(mysqli_error($this->con))."); history.back(1);</script></code></h2></center>");
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

	