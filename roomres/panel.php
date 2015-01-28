<?php
	@session_start();
	
	if(@$_SESSION['l031n45'] == ''){
		
		include "redirect.php";
		$go = new redirect("login.php");
		die();
		
	}
	if(@$_SESSION['154dm1n']){
		include "redirect.php";
		$go = new redirect("cpanel.php");
		die();
	}
	
?>
<!DOCTYPE HTML>
<html>
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="form_init.js" id="form_init_script"
    data-name="">
    </script>
    <link rel='icon' href='favicon.ico' />
    <link rel="stylesheet" type="text/css" href="default.css"
    id="theme" />
    <title>
    </title>
  <link rel="icon"  href="favicon.ico"  /></head>
  
  <body><style>#docContainer .fb_cond_applied{ display:none; }</style><noscript><style>#docContainer .fb_cond_applied{ display:inline-block; }</style></noscript><form  id="docContainer"
action="" enctype="multipart/form-data" method="POST"  >
  <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
    <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="image_default.png"/></a>
  </div>
  <div class="section" id="section1">
    <div class="column ui-sortable" id="column1">
    
      
      <div class="fb-item fb-100-item-column" id="item1" style="height: 50px; min-height: 5px;">
        <div class="fb-spacer">
          <div id="item1_div_0">
          
          </div>
        </div>
      </div>
      <div>
          <div style="float:left;">
			  <?php $id = 'panel.php'; 	echo "<b>Welcome </b> <code style='text-transform:uppercase;'>".(@htmlentities($_SESSION['l031n45']));	echo ' </code>'; ?>
              	
          </div>
          <div style="float:right;">
          <b><a href="find_reservant.php" style="text-decoration:none; color:#999;" target="new"> People Finder</a> </b>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
          	<b><a href="history.php" style="text-decoration:none; color:#999;"> MY  HISTORY </a> </b> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <a style="text-align:right; text-decoration:none;" href="proc_adds.php?act=logout"> Logout </a>
          </div>
      </div>
      <div class="fb-item" id="item3">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/
	
	
	
	//Get the User's vital information and store them in session variables
	$connect = true;
	include("main.php");
	
	$connection->query("SELECT * FROM reservants WHERE s_idnum='$_SESSION[l031n45]' ",true);
	
	$arraydets = $_SESSION['query'];
	
	while($res = mysqli_fetch_array($arraydets)){
		$_SESSION['u56_id'] 		= $res['id'];
		$_SESSION['u56_name'] 		= $res['name'];
		$_SESSION['u56_s_idnum'] 	= $res['s_idnum'];
		$_SESSION['u56_email'] 		= $res['email'];
		$_SESSION['u56_rnum'] 		= $res['rnum'];
		$_SESSION['u56_res']		= $res['res'];
		$_SESSION['u56_tel'] 		= $res['tel'];
		$_SESSION['u56_passwd'] 	= $res['passwd'];
		$_SESSION['u56_gender'] 	= $res['gender'];
	} 
	
	
	//Display  all residences.
	
	$connection->query("SELECT * FROM residence WHERE gender='$_SESSION[u56_gender]' OR gender='a' ORDER BY id DESC ",true);
	$residencesss = $_SESSION['query'];
?>    
	<div id="res_r">
    
    
    <b><u>PERSONAL DETAILS</u></b><br /><br />
     
    
     Name: <code style="color:green; text-transform:capitalize;"> <?php echo @htmlentities($_SESSION['u56_name']); ?></code> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  ID Number: <code style="color:green; text-transform:uppercase;"><?php echo htmlentities($_SESSION['u56_s_idnum']); ?></code>
     <br /><br/>
     Email: <code style="color:green; text-transform:lowercase;"><?php echo @htmlentities($_SESSION['u56_email']); ?></code> 
     <br />
     <br /><br />
     <b><u>RESERVATION DETAILS</u></b><br /><br />
     Room Number : <code style="color:red;"><?php if(@$_SESSION['u56_rnum'] != '' && @$_SESSION['u56_rnum'] != 0 ){ print htmlentities(@$_SESSION['u56_rnum']); }else{ echo "NULL";} ?></code> &nbsp;&nbsp;&nbsp;&nbsp;
     Residence : <code style="color:red; text-transform:capitalize;">
	 	<?php 
		 
			if(@$_SESSION['u56_res'] != '' && @$_SESSION['u56_res'] != 0 ){ 
				$connection->query("SELECT * FROM residence WHERE id='$_SESSION[u56_res]' LIMIT 1",true);
				$conres = $_SESSION['query'];
				while($resnom = mysqli_fetch_array($conres)){
					echo @htmlentities($resnom['name']);
				}
			}else{
				 echo "NULL";
			}
			
		?>
        		</code>
     <br /><br />
     Trimester : <code style="color:red;"> <?php echo @htmlentities($_SESSION['trim_name']) ?> </code>
     <br />
     <br />
     <br />
     
     <b><u>RESERVATION INSTRUCTIONS</u></b><br /><br />
     <ul>
     	<li>Click on the button that bears the name of the residence that you seek to book</li>
        <li>Select A Room and click reserve</li>
     </ul>
     <br />
     <br />
     
     
     <b><u>ROOM MATES</u></b><br /><br />
         
         <?php
            
            $connection->query("SELECT * FROM reservants WHERE rnum='$_SESSION[u56_rnum]' AND res='$_SESSION[u56_res]' AND actif='1' AND (rnum <> 0 AND res <> 0) ORDER BY name ", true);
            $rmate = $_SESSION['query'];
            
            while($mate = mysqli_fetch_array($rmate)){
				
				if(strtoupper($mate['s_idnum']) != strtoupper($_SESSION['l031n45'])){					
					echo '<div id="panel_container">
							<div id="panel_nom"><code>'.@htmlentities(strtoupper($mate['name'])).'</div>
							<div id="panel_tel">['.@htmlentities($mate['tel']).']</div></code>
						 </div>';
				}
					 
            }
         ?>
        
         
     </div>
      
  <div id="res_holder" align="center">
  
<?php

	$res_d = array();
	$res_d[] = '<form class="holdres" action="#" novalidate>
		<input type="hidden" value="" name="res">
	<button type="submit" hidden="hidden" class="resa">---- *.*.*.*.*.*.*.* ----</button></form>';

	$connection->query("SELECT * FROM 4v41l WHERE id=0 LIMIT 1",true);
			@$qry = @$_SESSION['query'];
			
			while($stat = mysqli_fetch_array($qry)){
				@$status = $stat['stat'];
			}
	$connection->num_rows("SELECT * FROM activity WHERE s_id='$_SESSION[l031n45]'",true);
	$times = $_SESSION['num_rows'];
		
		if(@$_SESSION['u56_res'] == 0 || @$_SESSION['u56_rnum'] == 0){
			
			if(@$status == 1 || @$times < 1){
				
				while(@$resresults = @mysqli_fetch_array($residencesss)){
					
					$res_d[] = '<form class="holdres" action="new_reservation.php" method="post">
					<input type="hidden" value="'.@htmlentities($resresults['id']).'" name="res">
					<button type="submit" class="resa">'.@htmlentities($resresults['name']).'</button>	
					</form>';
				}
				
				foreach($res_d as $res_){
					echo $res_."<br>";
				}
			
			}else{
				echo 'The Current Session Is closed for reservation';
			}
		
		}else{
			echo '
			<br />
			<br />
			<h3><code style="color:navy; text-transform:uppercase;"> You have already reserved a room! </code></h3>
			<br />
			<br /><br />
			<br /><br />
			<br />
			<code>
			In case you would like to change from your current room, please consult the residence administrator for assistance.
			</code>
			';
		}
		
	
?>
</div>

<?php





//Testing to see that the required session variables have been set
/*
echo "<br /> DB ID LOCATION: <code> "	.$_SESSION['u56_id']. "</code> <br /> Name: <code>".
	$_SESSION['u56_name']."</code><br /> ID Number: <code>".
	$_SESSION['u56_s_idnum']."</code><br /> Email: <code>".
	$_SESSION['u56_email'] ."</code><br /> Room Number: <code>".
	$_SESSION['u56_rnum']."</code><br /> Telephone Number: <code>".
	$_SESSION['u56_tel']."</code><br /> Password: <code>". 
	$_SESSION['u56_passwd']."</code><br /> Gender: <code>",
	$_SESSION['u56_gender']."</code>" ;
*/


?>    
      
      <div class="fb-item" id="item4">
        <div class="fb-sectionbreak">
          <hr style="max-width: 960px;">
        </div>
      </div>
      <div class="fb-item fb-100-item-column" id="item2" style="height: 50px; min-height: 5px;">
        <div class="fb-spacer">
          <div id="item2_div_0">
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </form>
</body>
</html>