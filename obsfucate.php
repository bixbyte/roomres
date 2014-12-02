<?php
/*
	* Author: Ian Innocent 
	* For: The Connection
*/

@session_start();
class obsfucate{

	 public $id = "obsfucate.php";
	 public $stringy;		private $keyz; 		private $sel;		public $action;
	
	 public function __construct($string_to_encrypt, $action_to_take){
		 if($string_to_encrypt != '' && $action_to_take!= ''):
		 
			$this->stringy	= $string_to_encrypt;
			$this->action	= $action_to_take;
			
			//Setting of the key and the salt
			$this->keyz = '7H3_C0NN3C710N_R3L04D3D!';
			$this->sel = '7h15154lm0574564nd0m4517c4ng370615i7?';
		 	
			switch ($this->action){
				
				case "make_password":
					$this->make_user_pass();
				break;
				
				case  "make_recovery_key":
					$this->make_recovery_key();
				break;
				
				case "recover_password":
					$this->recover_password();
				break;
				
				default:
					die('<script>alert("ERROR!\n\n Could Not Access the specified Obsfucation Protocol."); history.back();</script>');
				break;
		 }
		 
		 else:
		 
		 	die('<script>alert("ERROR!\n\n Could Not Initialize Obsfucation."); history.back();</script>');
		 
		 endif;
	 }
 
	public function make_user_pass(){
		$res = '';
		for( $i = 0; $i < strlen($this->stringy); $i++){
                  $c = ord(substr($this->stringy, $i));
                  $c += ord(substr($this->keyz, (($i + 1) % strlen($this->keyz))));
                  $res .= chr($c & 0xFF);
        }
		$res = base64_encode($res);

		$_SESSION['passwd'] = $res; 
		
	}
	
	public function make_recovery_key(){

		$reckey = crypt($this->stringy,$this->sel);
		$reckey = md5($reckey);
		$_SESSION['reckey'] = $reckey;
		
	}
	
	public function recover_password(){
		$recovered_passwd = ''; 
		
		 $this->stringy = base64_decode($this->stringy);
		 
		 for( $i = 0; $i < strlen($this->stringy); $i++){
			 
                 $c 				 = ord(substr($this->stringy, $i));
                 $c 				-= ord(substr($this->keyz, (($i + 1) % strlen($this->keyz))));
                 $recovered_passwd  .= chr(abs($c) & 0xFF);
                    
         }
		 
		//str_replace($this->keyz, "", $recovered_passwd);
		$_SESSION['recovered_password'] = $recovered_passwd;
		
	}
	
		
//End Of Class	
}


?>