<?php
/*
	* Author: 	Ian Innocent 
	* For: 		The Connection
*/

class restore{
	
	public 	$id = "restore.php";
	private $pass;
	public 	$auth;
	public 	$bkpath;

	public function __construct($auth,$keyer){
		
		if($auth){
			$this->pass = $keyer;
			$this->bkpath = getcwd()."/backup/";
			$this->ressurect();
		}else{
			echo '<script>alert("AUTHENTICATION FAILED!"); window.close();</script>';
		} 
		
	}

	private function ressurect(){
		
		if($this->pass == "146450f7"):
			$id = $this->id;
			$connect = true;
			include "main.php";
			
			$connection->query("SHOW TABLES",true);
			$tables = $_SESSION['query'];
			
			
			$i = 0;
			$success = "";
			$error = "";
			while($table = mysqli_fetch_array($tables)){
				$bkupfile = $this->bkpath.$table[$i].".iarec";
				$connection->query("TRUNCATE $table[$i]",true);
				if($_SESSION['query']){echo '<script>console.log('.json_encode($table[$i]).' + " Truncated!");</script>';};
				
				$connection->query("LOAD DATA INFILE '".str_replace("\\","/",$bkupfile)."' INTO TABLE $table[$i] ",false);
				if($_SESSION['query']){$success .= $table[$i]."\n\n ";}
			
			}
			echo implode(" \n\n ", $_SESSION['query_error']); 
			echo '<script> $data = '.json_encode($success).';  alert("Data was Restored to the following tables:\n\n "+ $data);</script>';
			
		else:
			echo '<script>alert("Could Not Perform Backup:\n\n User Authentication Failed!");</script>';
		endif;
	}

}
/* $raise = new restore(true,"146450f7"); */ 
@session_destroy();
//echo '<script>window.close();<//script>';
?>