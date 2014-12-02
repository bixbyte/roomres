<?php

$dat = <<<IRA 
<!-- Begin page heading -->
<h1 class="page-heading ">
    DASHBOARD <small>| htmlentities(strtoupper($_SESSION['l031n45'])) </small>
</h1>
<!-- End page heading -->

        $id = 'panel.php';
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


<!-- BEGIN ALERT -->
					<div class="alert alert-success alert-bold-border fade in alert-dismissable" >
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          <p><strong>Personal Details</strong></p>
                                          <table width="100%" class="table table-striped ">
                                              <thead>
                                                  <tr>
                                                    <td width="30%" class="text-muted">Name</td>
                                                    <td width="30%" class="text-muted">Identification Number</td>
                                                    <td width="30%" class="text-muted">Email address </td>
                                                  </tr>
                                              </thead>
                                              <tr>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_name']); ?></a></td>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_s_idnum']); ?></a> </td>
                                                  <td> <a class="alert-link" href="#"><?php echo @htmlentities($_SESSION['u56_email']); ?></a></td>
                                              </tr>
                                          </table>
					</div>
					<!-- END  ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information fly-out-l">
								<i class="fa fa-users icon-bg "></i>
								<div class="tiles-inner text-center ">
									<p>RESIDENCE</p>
									<h2 class="bolded">
                                                                            <?php 
		 
                                                                                if(@$_SESSION['u56_res'] != '' && @$_SESSION['u56_res'] != 0 ){ 
                                                                                        $connection->query("SELECT name FROM residence WHERE id='$_SESSION[u56_res]' LIMIT 1",true);
                                                                                        $conres = $_SESSION['query'];
                                                                                        while($resnom = mysqli_fetch_array($conres)){
                                                                                                echo @htmlentities($resnom['name']);
                                                                                        }
                                                                                }else{
                                                                                         echo "n/a";
                                                                                }
                                                                            ?>
                                                                        </h2> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-primary tiles-information fly-out-l">
								<i class="fa fa-shopping-cart icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>ROOM NUMBER</p>
									<h1 class="bolded">
                                                                            <?php 
                                                                                if(@$_SESSION['u56_rnum'] != '' && @$_SESSION['u56_rnum'] != 0 ){ 
                                                                                    print htmlentities(@$_SESSION['u56_rnum']); 
                                                                                }else{ 
                                                                                    echo "n/a";
                                                                                } 
                                                                            ?></h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-danger tiles-information fly-out-l">
								<i class="fa fa-comments icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TRIMESTER</p>
									<h2 class="bolded"><?php echo @htmlentities($_SESSION['trim_name']); ?></h2> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-warning tiles-information fly-out-l">
								<i class="fa fa-money icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>CAPACITY</p>
									<h2 class="bolded">
                                                                            <?php
                                                                                if(@$_SESSION['u56_res'] != '' && @$_SESSION['u56_res'] != 0 && @$_SESSION['u56_rnum'] != '' ){ 
                                                                                    
                                                                                    $connection->query("SELECT curr_capacity,max_capacity FROM rooms WHERE residence='".@$_SESSION['u56_res']."' AND r_number='".@$_SESSION['u56_rnum']."' LIMIT 1 ",true);
                                                                                    $roomData = $_SESSION['query'];
                                                                                         while($roomDet = mysqli_fetch_array($roomData)){

                                                                                            echo $roomDet['curr_capacity']."/".$roomDet['max_capacity'];
                                                                                        }
                                                                                    
                                                                                    
                                                                                }else{
                                                                                    echo "n/a";
                                                                                }
                                                                             ?>
                                                                        </h2> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
									
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
IRA;