<?php
/*
	* Author: 	Ian Innocent 
	* For: 	 	The Connection
*/

class minify{
	
	public $id = "minify.php";
	public $filename;
	public $minify_path;
	public $curr_path; 
	
	
	public function __construct($filename,$auth){
		if(@$auth && @$filename != ''){
			
			$this->minify_path = getcwd()."/minified/";
			$this->curr_path = getcwd();
			$this->filename = $filename; 
			$this->do_minify($this->filename);
			
		}elseif($auth){
			
			$this->minify_path = getcwd()."/minified/";
			$this->curr_path = getcwd();
			@$this->do_minify_all();
			
		}
	}
	
	private function do_minify(){
		
		@mkdir($this->minify_path);
		
		$filepath = $this->curr_path."/".$this->filename;
		
		$minifile = $this->minify_path.$this->filename;
		
		@unlink(str_replace("\\","/",$minifile));
		
		$string = file_get_contents(str_replace("\\","/",$filepath));
		//$string = preg_replace('/\s+/','',$string);
		$string = str_replace(' ','',$string);
		//$string = str_replace('<?php','<?php ',$string);
		file_put_contents(str_replace("\\","/",$minifile),$string);
	
	}
	
	
}


		$file_types = array("php","js","html");
		
		$path = getcwd();
		
		if($handle = opendir(str_replace("\\","/",$path))){
			
			while(false !== ($file = readdir($handle))){
							
					
						$minid = new minify($file,true);

						echo $file." minified <br/>";

						unset($minid);
						
					
								
				
			}
			//echo '<script>alert("All Set! Way to Go."); </script>';
			
		}

	
/*
$ids = array(
				 'add_admin.php',
				 'add_login.php',
				 'add_recovery.php',
				 'add_reservant.php',
				 'add_reservation.php',
				 'add_residence.php',
				 'add_room.php',
				 'add_trimester.php',
				 'admin_rooms.php',		
				 'alter_admin.php',	
				 'de_allocate.php',
				 'mailer.php',			//Primary
				 'obsfucate.php',		//primary
				 'search.php',			//Primary
				 'the_connection.php', 	//Primary
				 'redirect.php'			//Primary
				 );
//echo count($ids);

	for($i = 0; $i < count($ids); $i++){

		$minid = new minify($ids[$i],true);

		echo $ids[$i]." minified <br/>";

		unset($minid);

	}
*/
?>