<?php
/*
	* Author: 	Ian Innocent 
	* For: 		The Connection
*/
class cleaner{
	
	public $id = "unlinker.php";
	public $path;
	public $file_types = array();
	public $days;
	
	public function __construct($days=366,$auth,$fi){ 
		if($auth){
			
			if(@$fi != ''){
				$i = 0;
				while($i <= count($fi)-1){
					$this->file_types[] = $fi[$i];
					$this->days = $days;
					$i++;	
				}
				$this->path = getcwd()."/backup/all/";
				$this->clean_it();
			}
			
		}
	}
	
	
	public function clean_it(){ 
		//$this->path = str_replace("\\","/",$this->path); //$this->path
		if($handle = opendir(str_replace("\\","/",$this->path))){
			
			while(false !== ($file = readdir($handle))){
				
				if(is_file(str_replace("\\","/",$this->path).$file)){
					
					$file_info = pathinfo(str_replace("\\","/",$this->path).$file);
					
					if(isset($file_info['extension']) && in_array(strtolower($file_info['extension']), $this->file_types)){
					
						if( filemtime(str_replace("\\","/",$this->path).$file) < (time() - ($this->days * 24 * 60 * 60)) ){
							unlink(str_replace("\\","/",$this->path).$file);
						}
						
					}
					
				}				
				
			}
			echo '<script>alert("All Set! Way to Go."); </script>';
			
		}

	}
	
}

$avi = new cleaner(21,true,array("iarec"));
@session_destroy();
//echo '<script>window.close();<//script>';
?>