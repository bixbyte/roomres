<?php

header("content-type: application/json");

$id = "new_room.php";
$connect = true;
include "main.php";

$connection->query("SELECT * FROM residence ", false);

$ox = $_SESSION['query'];
$rr = array();
while($result = mysqli_fetch_array($ox)){
  $rr[] = array( "id" => $result['id'], "name" => $result['name'] );
}

echo json_encode($rr);

?>