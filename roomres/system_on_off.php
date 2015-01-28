<?php
	@session_start();
	include "admin_tools.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="jquery.min.js" ></script>
<title>SESSION AVAILABILITY MANAGER</title>
<link rel="icon"  href="favicon.ico"  /></head>
<body style="background-image:url(printable.fw.png) !important;">
<?php
class sys_switch{
	
	public $id = "system_on_off.php";
	public $status;
	
	public function __construct($status){
		include "admin_tools.php";
		$this->status = @$status;
		$this->system_switch();  
	}
	 function system_switch(){ 
	 
	 
		if($this->status == 1){$img='on.png';}else{$img='off.png';}
	
		$id = $this->id;
		$connect = true;
		include "main.php";
		
		$connection->query("UPDATE 4v41l SET stat='$this->status' AND img='$img' WHERE id='0' ",true);
		if(@$_SESSION['query']){
			echo '<img src="'.$this_site.$img.'" />';
		}
		
		
	}
	
	
//end of class system_switch	
}


?>

</body>
</html>