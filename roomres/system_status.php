<?php
	@session_start();
	include "admin_tools.php";
	
	class sys_stat{
		
		public $id = "system_status.php";
		public $tbl = "4v41l";
		
		public function __construct(){
			
				$this->cur_stat();	
					
		}
		
		private function cur_stat(){
			
			$id =  $this->id;
			$connect = true;
			include "main.php";
			
			$connection->query("SELECT * FROM $this->tbl WHERE id=0 LIMIT 1",true);
			$qry = @$_SESSION['query'];
			
			while($stat = mysqli_fetch_array($qry)){
				if($stat['stat'] == 1){ echo '<img src="'.$this_site.'on.png" title="The Reservation Session is on" /> '; }else{ echo '<img src="'.$this_site.'off.png" title="The Reservation Session is off"/>'; }
			}
			
		} 
		
	}


?>