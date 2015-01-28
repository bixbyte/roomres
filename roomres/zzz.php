<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/


include "admin_tools.php";

	
	
?>
<html>
<head>
	<style>
    /* The connection search results card design */ 
		#card_holder{
			width:380px;
			background:url(printable.fw.png);
			border:groove;
			border-radius:10px;
			height:180px;
			display:table;
		}
		#card_mini_frame{
			width:98%;
			display:table;
		}
		#card_pic {
			width:100px;
			height:100px;
			border-radius:5px;
			margin-top:3px;
			background-color:#ECECFB;
			float:left;
			text-align:left;
			background-image:url(card_pic.fw.png); 
		}
		#card_under_pic{
			width:100px;
			height:65px;
			top:110px;
			float:left;
			text-align:center;
			font-family:"Courier New", Courier;
			font-size:12px;
			font-weight:bold;
			text-transform:uppercase;
			
		}
		#card_dets {
			width:260px;
			height:175px;
			float:right;
			text-align:left;
			
		}
		
		#card_name {
			margin-top:19px;
			text-transform:capitalize;
			color:navy;
			font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
			font-size:14px;
			font-weight:bold;
			text-align:center;
			
		}
		
		#card_contact , #card_specs, #card_sp {
			width:98%;
			display:table;
		}
		#card_email {
			width:80%;
			margin-top:32px;
			color:green;
			margin-left:10px;
			float:left;
			font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
			font-size:14px;
			font-weight:bold;
			text-align:left;
		}
		#card_tel {
			width:80%;
			margin-top:2px;
			margin-right:10px;
			color:red;
			float:right;
			font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
			font-size:14px;
			font-weight:bold;
			text-align:right;
		}
		
		#card_specs{
			margin-top:30px;
			font:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			color:#600;
			font-weight:bold;
		}
		
		
		#card_res{
			width:75%;
			padding:0;
			text-align:left;
			text-transform:capitalize;
			float:left;			
		}
				
		#card_room{
			width:19.5%;
			padding:0;
			text-align:left;
			float:right;
		} 
		
		
	/* End of search results card design */	
    </style>

<link rel="icon"  href="favicon.ico"  /></head>
<body>

echo '<center>
        <div id="card_holder" ">
        
        	<div id="card_mini_frame" >
                <div id="card_pic"> </div>
                <div id="card_dets">
                        
                        <div id="card_name">Ian Innocent Mbae Kamau</div>  
                                 
                    	<div id="card_contact">
                        	<div id="card_email">ianmin2@live.com </div>
                            <div id="card_tel">+254725678447</div>
                        </div>
                        <div id="card_specs" >
                            <div id="card_sp" >
                                <div id="card_res" style="opacity:0.3;"><code>residence</code></div>
                                <div id="card_room" style="opacity:0.3;"><code>room</code></div>
                                
                                <div id="card_res" >new men's dorm </div>
                                <div id="card_room"> 251</div>
                            </div>
                        </div>
                </div>
                
                <div id="card_under_pic">
                <br />
                skamia1321
                </div>
            </div>
            
        </div>
    </center>
    <br /><br />';
    
</body>
</html>





<?php

$id = "me.php";
$connect = true;
include "main.php";
include "admin_tools.php";

function updater($idnumber){
$connection->query("UPDATE reservants SET actif=1 WHERE s_idnum='$idnumber' " , true);
if($_SESSION['query']){$_SESSION['query']='';};
}

$connection->query("SELECT * FROM reservants WHERE actif='0'", true);
$my = $_SESSION['query'];

while($mine = mysqli_fetch_array($my)){
	echo "<h2> Student ".$mine['name']. " ".$mine['s_idnum']." ".$mine['email']."</h2><br/>";
	$me = new obsfucate($mine['passwd'], "recover_password");
	echo $_SESSION['recovered_password']."<br />";
	updater($mine['s_idnum']);
}


?>


