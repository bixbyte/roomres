<?php
/*
	* Author: 	Ian Innocent 
	* For: 	 	The Connection
*/
class bkup {
	
	public $id = "backup.php";
	public $bkpath;
	public $allbkup;
	
	
	public function __construct($auth){
		if($auth){
			$this->bkpath = getcwd()."/backup/";
			$this->allbkup = getcwd()."/backup/all/";
			@$this->bkup_db();
		}
	}
	
	
	private function bkup_db($tables='*'){
		
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		$connection->query("SHOW TABLES",true);
		$tables = $_SESSION['query'];
		//print_r($tables);
		$i = 0;
		
		@mkdir($this->bkpath);
		@mkdir($this->allbkup);
			
		while($table = mysqli_fetch_array($tables)){
			
			$bkupfile = $this->bkpath.$table[$i].".iarec";
			$pbkup = $this->allbkup.$table[$i].date("Y-M-D H.i.s").".iarec";
			
			//echo $bkupfile;
			
			
			@unlink(str_replace("\\","/",$bkupfile));
			//echo $table."<br/>";
			$connection->query("SELECT * INTO OUTFILE '".str_replace("\\","/",$bkupfile)."' FROM $table[$i]",true);
			if($_SESSION['query']);
			$connection->query("SELECT * INTO OUTFILE '".str_replace("\\","/",$pbkup)."' FROM $table[$i]",true);
			if($_SESSION['query']);		
		}
		
	}
	

}

$c = new bkup(true);
unset($c);
//@session_destroy();
//echo '<script>window.close();<//script>';
?>