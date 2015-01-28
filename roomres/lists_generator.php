<?php
/* 
	Author: The Connection 
	For: The University Of Eastern Africa Baraton
*/

@session_start();

class listgen{
	
	public $id = "list_generator.php";
	
	public function __construct(){
		include "admin_tools.php";
		$this->list_per_residence(); 
	}
	
	public function list_per_residence(){
		
		
	$id = "lists_generator.php";
	$connect = true;
	include "main.php";
			
		//Get the residence names and store them in an associative array in the order "residence_id" => "residence_name"
		// Add "WHERE gender='$_SESSION[u56_gender]'" to limit the gender of residences shown
		$connection->query("SELECT * FROM residence ",true);
		$rezy = $_SESSION['query'];
		
		$rezes = array();
		while($rezys = mysqli_fetch_array($rezy)){
			$rezes[$rezys['id']] = $rezys['name'];
		}

	
		//Conjoiner 
			
			foreach($rezes as $rezid => $rezname){
				//Get rooms in the residence in an array .. not important ~[in the order "room_number" => "residence"]~
				$connection->query("SELECT * FROM rooms WHERE residence='$rezid' ORDER BY r_number ",true);
				$roomarr = $_SESSION['query'];
				
				$roomz = array();
				while($rms = mysqli_fetch_array($roomarr)){
					$roomz[] = $rms['r_number'];
				}
				
				
				//Fetch all resident details from the specified residence
				//and store them in an associative array in the order "room_number" => "Personal Details"
				$connection->query("SELECT * FROM reservants WHERE res='$rezid' ORDER BY rnum ",true);
				$arr_list = $_SESSION['query'];
				
				$residents = array(); 
				while($list = mysqli_fetch_array($arr_list)){
					if(!isset($residents[$list['rnum']])){$residents[$list['rnum']] = "";}
					//in the order  idnumber, name, telephone 
					
						
						$residents[$list['rnum']] .= '
						<tr>
						<td>
						<code style="font-family:Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif; color:#666; font-size:13px;">
						'.htmlentities(strtoupper($list['s_idnum'])).'</code></td>
						<td>
						<code style="font-family:Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif; color:#666; font-size:13px;">
						'.htmlentities(strtoupper($list['name'])).'</code></td>
						<td>
						<code style="font-family:Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif; color:#666; font-size:13px;">
						'.htmlentities($list['tel']).'</code></td>
						</tr>';
						
					
									
				}	
				//print_r($residents); 
				
				//Do Residence members display here
				if(@$rep){echo '<div style="page-break-before:always"></div>';}
				echo '
				 	<table width="99%" align="center">
						<tr >
						<th>					
							<h1> '.htmlentities(strtoupper($rezname)).' <code> residence report </code> </h1>
							<code>Generated on '.date('d/m/Y  H:i:s ').'</code>
						</th>
						</tr>					
					</table>
					
					<center>
					<div align="center" id="container" >
				';
				 
				 $i = 1;
				foreach($roomz as $room){
					
					if(($i % 2) == 0){ $decxa = "right";}else{$decxa = "left";}
					
					echo '
						  	<div id="'.$decxa.'" >
						
						  		<table width="99%" align="center"> 
						  			<tr> 
											<hr />		<th align="left" colspan="3" ><h4>Room '.htmlentities($room).':</h4></th>
						  			</tr>
									'.@$residents[$room].'
								</table>
								
							</div>
						
						';
					
					$i++;
					
				}
				
				echo '
				</div>
				</center>
				<br /><br /><br />';
				$rep = true;
				 
			}
			
		
	}
	
	//End of Class
}

/*
				if($list['available'] == '0'){
						
						$residents[$list['rnum']] .= "**";
						
					}else{
					}
*/
	
	
			
?>