<?php
/**
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/

												//This is the official upcomings and shortcomings testing page!



/*
//Session Manipulation using session_unset() and unset()

@session_start();

$_SESSION['name'] = 'Ian Innocent Mbae';
$_SESSION['age'] = 21;
$_SESSION['email'] = 'ianmin2@live.com';

unset($_SESSION['email']);

echo '<script >alert("The following are your details.\n\n Name: " + '.json_encode(@$_SESSION['name']).' + "\n Age: "+ '.json_encode(@$_SESSION['age']).' + "\n Email: " + '.json_encode(@$_SESSION['email']).');</script>';

session_unset(@$_SESSION['email']);

echo '<script >alert("The following are your details.\n\n Name: " + '.json_encode(@$_SESSION['name']).' + "\n Age: "+ '.json_encode(@$_SESSION['age']).' + "\n Email: " + '.json_encode(@$_SESSION['email']).');</script>';
 
*/

/*
//Testing the obsfucation

include "obsfucate.php";
//unset($_SESSION['passwd']);		unset($_SESSION['reckey']);		unset($_SESSION['recovered_password']);

$recovery_key = new obsfucate("SKAMIA1321",'make_recovery_key');
echo "Recovery Key: <code style='color:green;'>".$_SESSION['reckey']."</code><br />";

$encrypted_password = new obsfucate("iarasoft","make_password");
echo "Encrypted Password: <code style='color:green;'>".$_SESSION['passwd']."</code><br />";

$decrypted_password = new obsfucate('sZTRpKO9tKc=','recover_password');
echo "Recovered Password: <code style='color:green;'>".$_SESSION['recovered_password']."</code><br />";

*/


/*
//TESTING THE _FILE_ and other constants

echo "__FILE__ : <code>", __FILE__ , "</code><br /><br />";
echo '$_SERVER[DOCUMENT_ROOT] : <code>', $_SERVER['DOCUMENT_ROOT'], "</code><br /><br />";
//$_SERVER['PATH_TRANSLATED'];
*/

/*
//PHP SESSIONS
session_start();
if(!isset($_SESSION['not'])){
	
	$_SESSION['not'] = 1;
}else{
	$_SESSION['not']++;
}
echo "Number of Visits: <code>".$_SESSION['not']."</code>";
*/

?>
<!--
//Email details layout trial

<html>

    <head>
    	<title>The Connection | Kitchen Sink</title>
    <link rel="icon"  href="favicon.ico"  /></head>
	
    <body>
    
    <link rel="stylesheet" href="kitchen.css" >
    <div align="left">
							Username: <code style="color:green"> '.$this->s_num.' </code> <code style="color:#F00"> or </code> <code style="color:green"> '.$this->email.'</code><br />
							Password: <code style="color:green"> '.$this->passw4d.' </code><br /><br />
							<a href="$this->reclink" style="text-align:center; font:'Courier New', Courier; font-size:18px; color:#F00;" ><button id="signup_button" style="border:inset; border-color:#F00; border-radius:5px; background-color:#000; color:#FFF; ">Click Here to confirm your subscription</button></a>
							</div>
                            
    </body>
</html>
--> 
<?php
$id = "me";
$connect = true;
include "main.php";
$connection->num_rows("SELECT * FROM rooms",false);
echo $_SESSION['num_rows'];



?>