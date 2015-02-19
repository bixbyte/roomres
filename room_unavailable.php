<?php

$id = "new_room.php";
$connect = true;
include "main.php";

//filter for top residential admin only

//Store the residence details in an associative array in the order {'residence_id'=>'residence_title/name'}
$reslist = $connection->query("SELECT * FROM residence",true);
$listed = $_SESSION['query'];

$resarr = array();
while($pa = mysqli_fetch_assoc($listed)){
    $resarr[$pa['id']] = $pa['name'];
}

//Getting all admin data save for the first 3 defaults
$qry = "SELECT * FROM rooms WHERE available='0'";
$connection->num_rows($qry,true);

if($_SESSION['num_rows'] <> false ){
    header("Content-Type:application/json ");

   die(   json_encode( array("rooms" => $connection->printQueryResults( $qry, true), "residences" => $resarr )  ));

}else{

    die ('<div class="alert alert-info alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>NOTE: </strong><br> There are currently no specially reserved rooms!<br> <a class="alert-link" onclick="roomAvail()">Click to specially reserve a room</a>.
			</div>');
  }



?>
