<?php

    include "admin_tools.php";
	
	//Do a quick auth test to ensure that the currently loged in user is not a session tapper/injector
	$id = "cpanel.php";
	$connect = true;
	include "main.php";
	
	$connection->num_rows("SELECT * FROM admin WHERE a_idnum='$_SESSION[u56_a_idnum]' AND paski='$_SESSION[u56_passwd]' ",true);
		
	if($_SESSION['num_rows'] <> 1){
		echo '<div align="center" style="margin:auto;" ><h3 style="color:#F00;">:-{  ACCESS VIOLATION! </h3></div><br /><br /><br /> ';
		die;
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RoomRes|Control Panel</title>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.tabs.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<script src="jquery.min.js"></script>
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.tabs.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.button.custom.min.js" type="text/javascript"></script>
<style> button:hover {
	 color:#FFF !important;
	 border-radius:12px;
	 transition-duration:1s; 
	}
 button{
background: rgb(206,220,231) !important; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%, rgba(89,106,114,1) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(206,220,231,1)), color-stop(100%,rgba(89,106,114,1))) !important; /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#596a72',GradientType=1 ) !important; /* IE6-9 fallback on horizontal gradient */

background: rgb(76,76,76) !important; /* Old browsers */
background: -moz-linear-gradient(top,  rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))) !important; /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* IE10+ */
background: linear-gradient(to bottom,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ) !important; /* IE6-9 */
	 
	 
	  color:#FFF !important;
 }
 a {
	 color:#FFF !important;
	}
 a:hover{
	 color:#FFF !important;
 }

 #Tabs1 {
	 background-image:url(printable.fw.png) !important; 
}

ul{

}

body{
	background: none !important;
}

li{

background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%) !important; /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))) !important; /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* IE10+ */
background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%) !important; /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ) !important; /* IE6-9 */


	}</style>
<link rel="icon"  href="favicon.ico"  /></head>

<body style="background-image:none !important;">
<a accesskey=""></a>
 <div style="width:100%; display:block;">
 	<div style="float:left; width:50%;">
        
     </div>
     
     <div style="float:right; width:50%; text-align:right; display:block;">
     	<a style="font-family:'Courier New', Courier; color:#60C !important; font-size:14px; cursor:none;"> Loged in as <?php echo @$_SESSION['u56_name'] ?> </a>
         <a style="text-align:right; text-decoration:none; color:#F00 !important;" href="proc_adds.php?act=logout&to=c_login.php"> Logout </a>
     </div>
     	
     </div>
 </div>
 <br />
 
<div id="Tabs1">
   <ul>
     <li><a href="#tabs-1">RESIDENCE MANAGEMENT</a></li>
     <li><a href="#tabs-2">ROOM MANAGEMENT</a></li>
     <li><a href="#tabs-3">TRIMESTER MANAGEMENT</a></li>
     <li><a href="#tabs-4">ROOM OCCUPANT MANAGEMENT</a></li>
     <li><a href="#tabs-5">ADMIN</a></li>
     <li><a href="#tabs-6">SYS</a></li>
     
  </ul>
   
   <div id="tabs-1">
     <p>
       <button id="Button1" onClick="javascript:window.location='new_residence.php';">ADD NEW RESIDENCE</button> <br /><br />
       <button id="Button3" onClick="javascript:window.location='print_res_lists.php';">RESIDENCE OCCUPANT LISTS</button> <br /><br />
       <button id="Button2" onClick="javascript:window.location='';" >*MANAGE CURRENT RESIDENCES</button>
       
     </p>
   </div>
   
   <div id="tabs-2">
     <p>
   	   <button id="Button4" onClick="javascript:window.location='new_room.php';">ADD ROOMS</button> <br /><br />
   	   <button id="Button5" onClick="javascript:window.location='room_availability.php';">MANAGE  ROOM AVAILABILITY</button>
     </p>
   </div>
   
   <div id="tabs-3">
     <p>
     	
   	   <button id="Button6" onClick="javascript:window.location='new_trimester.php';">REGISTER A NEW TRIMESTER</button> <br /><br />
   	   <button id="Button7" onClick="javascript:window.location='clear_room.php';">OPEN RESERVATION FOR ANOTHER TRIMESTER</button><br /><br />
       <code>Current Trimester: 
           <code style="color:#00F;">
           		<?php
				
					$connection->query("SELECT * FROM trimester ORDER by id DESC LIMIT 1",true);
					$trimres = $_SESSION['query'];
					if($trimres){
						while($trimes = mysqli_fetch_array($trimres)){
							echo htmlentities($trimes['name']);
						}
					}else{
						echo 'There is currently no registered trimester!';
					}
				
				?>
           </code>
       </code>
     </p>
   </div>
   
   <div id="tabs-4">
     <p>
     <div id="Buttonset1">
       <button id="Button11" onClick="javascript:window.location='reservation_reset.php';">RESET RESERVATION DATA</button> <br /><br />
       <button id="Button8" onClick="javascript:window.location='admin_search_pro.php';">LiveSearch [Comprehensive]</button> <br /><br />
       <button id="Button9" onClick="javascript:window.location='pro_basic_search.php';">LiveSearch [Reserved Rooms] </button> <br /><br />
       <button id="Button10" onClick="javascript:window.location='user_deactivate.php';">DISCONTINUE LEAVING PERSON</button>
     </div>
     <p>     
  </div>
   
   
   <div id="tabs-5">
     <p>
     <div id="Buttonset2">
       <button id="Button12" onClick="javascript:window.location='new_admin.php';">ADD NEW ADMINISTRATOR</button> <br /><br />
       <button id="Button13" onClick="javascript:window.location='manage_admin.php';">MANAGE CURRENT ADMINISTRATORS</button>
     </div>
     </p>
   </div>
   
   <div id="tabs-6">
     <p>
        <button id="Button18" class="admin_bkup" onClick="">DataBase Backup</button><br /><br />
        <button id="Button17" class="admin_restore" onClick="" disabled="disabled" >Restore Database</button><br /><br />
        <button id="Button19" class="admin_clear" onClick="">Clear Old Backup Files</button><br /><br />
        
       	<button id="Button15" class="enable_res"  onClick="">ENABLE RESERVATION</button><br /><br />
     	<button id="Button16" class="disable_res" onClick="">DISABLE RESERVATION</button><br /><br />
     </p>
      
   </div>
   
   
   <div id="tabs-7">
   	<p>
    	<div style="width:100%; display:block; margin-top:20px;">

			<div style="width:45%; float:left; text-align:left;"></div>
    
			<div style="width:45%; float:right; text-align:right;">          	
                <div style="width:50%; float:left; text-align:right;" ></div>
                <div style="width:50%; float:right; text-align:right;" id="switch_res"></div>   
           	</div>
		</div>
    </p>
   </div>
   
</div>











<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
$(function() {
	$( "#Button1" ).button();
	
});
$(function() {
	$( "#Button2" ).button();
});
$(function() {
	$( "#Button3" ).button(); 
});
$(function() {
	$( "#Button4" ).button(); 
});
$(function() {
	$( "#Button5" ).button(); 
});
$(function() {
	$( "#Button6" ).button(); 
});
$(function() {
	$( "#Button7" ).button(); 
});
$(function() {
	$( "#Button7" ).button(); 
});
$(function() {
	$( "#Button8" ).button(); 
});
$(function() {
	$( "#Button9" ).button(); 
});
$(function() {
	$( "#Button10" ).button(); 
});
$(function() {
	$( "#Button11" ).button(); 
});
$(function() {
	$( "#Button12" ).button(); 
});
$(function() {
	$( "#Button13" ).button(); 
});
$(function() {
	$( "#Button15" ).button(); 
});
$(function() {
	$( "#Button16" ).button(); 
});
$(function() {
	$( "#Button17" ).button(); 
});
$(function() {
	$( "#Button18" ).button(); 
});
$(function() {
	$( "#Button19" ).button(); 
});
$(function() {
	$( "#Buttonset1" ).buttonset(); 
});
$(function() {
	$( "#Button11" ).button(); 
});
$(function() {
	$( "#Buttonset2" ).buttonset(); 
});

</script>


<script>
$(document).ready(function(e) {
	
 		$.post("proc_adds.php", {act:"visual_stat"}, 
			
			function(data, status){
				$('#switch_res').html(data);
		}); 
		
		$('.disable_res').click(function(e) {
            $.post("proc_adds.php", {act:"power_switch",stat:0}, 
			
			function(data, status){
				$('#switch_res').html(data);
			}); 
        }); 
		
		$('.enable_res').click(function(e) {
            $.post("proc_adds.php", {act:"power_switch",stat:1}, 
			
			function(data, status){
				$('#switch_res').html(data);
			});             
        });
//		
	  $('.admin_bkup').click(function(e) {
            $.post("iara_main.php", {c0m1:"backup"}, 
			
			function(data, status){
				//$('#switch_res').html(data);
				alert(data);
			}); 
        });
		
		$('.admin_restore').click(function(e) {
            $.post("iara_main.php", {c0m1:"restore"}, 
			
			function(data, status){
				//$('#switch_res').html(data);
				alert(data);
			}); 
        }); 
		
		$('.admin_clear').click(function(e) {
            $.post("iara_main.php", {c0m1:"clean"}, 
			
			function(data, status){
				//$('#switch_res').html(data);
				alert(data);
			}); 
        });  
		
});

</script>
</body>
</html>