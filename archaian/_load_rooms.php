<?php

$id = "_load_rooms.php";
$connect = true;
include("main.php");
if( ( $_SESSION['u56_res'] == 0 && $_SESSION['u56_rnum'] == 0 ) || ( $_SESSION['u56_res'] == '' && $_SESSION['u56_rnum'] == '' )):

  if(@$_REQUEST['resid'] != '' && @$_REQUEST['resid'] != 0 ){

      $connection->query("SELECT r_number,max_capacity,curr_capacity FROM rooms WHERE residence='".$_REQUEST['resid']."'  AND available=1", true);
      $all_rooms = $_SESSION['query'];
      $resp = "";  
     
      while( $r_data = mysqli_fetch_array($all_rooms) ){
          
         if ($r_data['max_capacity']  ==  $r_data['curr_capacity'] ) {
             $percent = 100; 
         }else if($r_data['curr_capacity'] ==  0 ) { 
             $percent = 0;
         }else{
             $percent = ( ($r_data['curr_capacity']/$r_data['max_capacity']) * 100 );
         }
         
          if( $percent == 100 ){ 
              $i = 2;
              $data = 'onclick="javascript:book_room( 0, '.$_REQUEST['resid'].' )" class="btn btn-danger "';
          }else if($percent > 0 ){
              $i = 2;
              $data = 'onclick="javascript:book_room( ' .@htmlentities($r_data['r_number'].', '.$_REQUEST['resid']).')" class="btn  btn-info"';
          }else{
              $i = 1;
              $data = 'onclick="javascript:book_room(' .@htmlentities($r_data['r_number'].','.$_REQUEST['resid']). ')" class=" btn  btn-success"';
          }
          
          //<button type="button" class="btn btn-success">Success</button>
          $resp .=  '<button type="button" '.$data.'> Room ' .@htmlentities($r_data['r_number']).'  </button>'; 
          
      }
      
      die($resp);

  }else{

      die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
  			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <br><br>
  			  <strong>Error!</strong><br> FAILED TO FETCH RESIDENCE DATA!<br> <br><br><a href="#" class="alert-link">That residence might be fully occupied!</a>.
          <br><br><br>
  			</div>');

  }

else:

  die ('<div class="alert alert-danger alert-bold-border fade in alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <br><br>
          <strong>Error!</strong><br> YOU ARE CURRENTLY ALLOCATED A ROOM!!<br> <br><br><a href="#" class="alert-link">See the residence administrator for further assistance</a>.
          <br><br><br>
        </div>');

endif;


?>