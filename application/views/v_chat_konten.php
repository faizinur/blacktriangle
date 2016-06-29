	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

<?php  

		$sender = $this->session->userdata("id_user");
		$receiver = $this->session->userdata("id_pbm");
	foreach ($d_chat as $d) {
		# code...
		if($d->id_sndr == $sender){
								?>
						<div class="col-md-12">
						<div class="panel panel-default panel-comment pull-right">
							<div class="panel-heading" >
								<b>urang :</b><small class="pull-right" style="color:grey;margin-top:0px;">
									<?php 
										echo $d->pesan."<br/>";
										echo $d->tg_psn;
									?>
								</small><br/>
							
							</div>
						</div>
					</div>
								<?php
		}else{
												?>
								<div class="col-md-12">
						<div class="panel panel-default panel-comment pull-left">
							<div class="panel-heading" >
								<b>batur :</b><small class="pull-right" style="color:grey;margin-top:0px;">
									<?php 
										echo $d->pesan."<br/>";
										echo $d->tg_psn;
									?>

								</small><br/>
							</div>
						</div>
					</div>

								<?php

		}
	}
?>


<!--
<?php for ($i=0; $i < 100; $i++) { 
							# code...
							if (intval($i)% 2 != 0){
								
								?>
											<div class="col-md-12">
						<div class="panel panel-default panel-comment pull-right">
							<div class="panel-heading" >
								<b>urang :</b><small class="pull-right" style="color:grey;margin-top:0px;"></small><br/>
							
							</div>
						</div>
					</div>
								<?php
							}else{

								?>
								<div class="col-md-12">
						<div class="panel panel-default panel-comment pull-left">
							<div class="panel-heading" >
								<b>batur :</b><small class="pull-right" style="color:grey;margin-top:0px;"></small><br/>
							
							</div>
						</div>
					</div>

								<?php
							}

						}  ?>
						-->