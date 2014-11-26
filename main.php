<?php
/*
	* Author: 	The Connection 
	* For: 		The University Of Eastern Africa Baraton
*/

/* Database connection variables ... and more! */
@session_start();

$inactive = 18000000000000000;

if(isset($_SESSION['timeout'])){
	@$session_life = time() - @$_SESSION['timeout'];

if(@$session_life > $inactive){
	@session_destroy();
	header("Location: index.php");
}

}
@$_SESSION['timeout'] = time();


date_default_timezone_set("Africa/Nairobi");
$this_site = "http://41.89.162.150/room//room/hybrid";
$db = 'connect_db'; $host = 'localhost'; $user = 'root'; 
$pass = 'swlab_admin@41';

/*End of database connection variables*/

if(@$id != ''){
	
	/* if(!isset($_SESSION['currpage'])){
		@session_start();	
	} */
	// WARNING ONLY ADD PAGES THAT ARE FULLY CLASSES OR PURELY FUNCTIONS TO THIS ARRAY Else Face the wrath of a broken connection 
	$ids = array('',
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
	
	$pos = array_search($id, $ids);
	
	if($ids[$pos]==''){$ids[$pos] = 'unknown';}
	$_SESSION['currpage'] = "<code style='color:red'>".$ids[$pos]."</code>"; 
	
	//echo "current page: ".$_SESSION['currpage']."<br />";
	
				/*
				include 'add_residence.php';
				include 'the_connection.php';
				include 'redirect.php';
				...
				*/
				
	for($i = 0; $i <= (count($ids)-1); $i++){
		
		if($i <> $pos){			 
			if($ids[$i] != ''){
				include "$ids[$i]";	
			}
			
		} 
		
	}

//Establish a database connection where required

if(@$connect){
	
	$connection = new connection($db, $host, $user, $pass);
	
	if(@$_SESSION['trim_name'] == '' || @$_SESSION['trim_id'] == ''){
	
		$connection->query("SELECT * FROM trimester ORDER BY id DESC LIMIT 1", false);
		$tridtz = $_SESSION['query'];
		$_SESSION['query'] = "";
		while($trims = mysqli_fetch_array($tridtz)){
			$_SESSION['trim_name'] = $trims['name'];
			$_SESSION['trim_id']   = $trims['id'];
		}
	
	}
	
}

}else{
	die("<center><h2><code style='color:#F00;'>Critical Error:</code><code style='color:green;'> Failed to recognize this page!</code> </h2></center>");
}



?>