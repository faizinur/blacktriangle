<!DOCTYPE html>
<html>
<head>
	<title>Form Chat!</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	<blink><center><h1>BELOM BIKIN!</h1></center><blink/>
	<?php
		echo "<h1>(data session)Nama:".$this->session->userdata("nama")."/Id user".$this->session->userdata("id_user")."/ID pembimbing".$this->session->userdata("id_pbm")."</h1> <br/>";
		echo "nama pembimbing : ".$this->session->userdata("nama_pem")."nama pembimbing : ".$this->session->userdata("id_pem");;
		//if ($this->session->userdata("level") != "mahasiswa"){
		//	redirect('mahasiswa/');
		//}
	//	if(($this->session->userdata("nama")=="") or ($this->session->userdata("nama_pem")=="")){
	//		redirect('mahasiswa/');
	//	}

		echo $this->session->userdata('level');

	?>
    <div class="col-lg-12">
    	<div class="panel">
        	<div class="col-lg-12">

        		<div class="panel-body" style="height:400px;overflow-y:auto" id="box">
        			<div id="msg">
        				<ol>
        					<li>data:</li>
        				</ol>
        			</div>
						<!--<div class='panel-body'><h2 style='text-align:center;color:grey'>Click User on Chatt List to Start Chatt</h2></div> -->
						<!--br/>
						<div id="loading" style="display:none"><center><i class="fa fa-spinner fa-spin"></i> Loading...</center></div>
						</br !-->
						<!--load halaman-->
					</div>
				</div>

			
	
				<div class="col-lg-12 pull-right">
					<div class="col-lg-11"> 
		           		<textarea class="form-control" id="msgdata"></textarea>
		          	</div>
		           	<div class="col-lg-1">
		           		<h6 id="status">idle...	</h6>
		           		<input type="submit" value="Kirim Pesan!" class="btn btn-primary pull-right" name="tes" id="btn" onClick="KirimPesan()">
	            	</div>
	            </div>
	        </div>
       

            	

            </div>
        </div>
    </div>

    <input type="hidden" id="snd" value="<?=$this->session->userdata("id_user")?>">
    <input type="hidden" id="rcv" value="<?=$this->session->userdata("id_pbm")?>">
    <a href="<?php echo base_url().'chat/kirimPesan'?>">kirim pesan</a>

        <a href="<?php echo base_url().'chat/loadpesan'?>">loadpesan</a>


	<a href="<?php echo base_url().'mahasiswa/logout'?>">logout we mun enggesmah</a>





	<script>
		$(document).ready(function(){
			//alert('ready!');

			loadpesan($("#snd").val(),$("#rcv").val());
			returen();
				setInterval(function(){ 
					//alert("teu daek bisa aneh!");
					//pesanbaru();
					//loadpesan();
					$("#box").val();
					loadpesan($("#snd").val(),$("#rcv").val());
					
					//alert("load pesan terakhir atau yg belum ada");
				},1000);
			});

			/*function returen(){ //fungi coba coba tapi gagal antepkeun
				var data = "it should be back to here!";
				alert("asup da!");
				$.ajax({
					url 	: "<?php echo base_url().'chat/returen'?>",
					type	: 'POST',
					datatype: 'json',
					data 	: {returen:data},
					beforeSend :function(){

					},
					success : function(result){
						alert("hasil returen" +result);
					}
				});
			}//tutup return
			*/

			function KirimPesan(){//kirim pesan
				var msg = $("#msgdata").val();

				if(msg == ''){
					document.getElementById('msgdata').focus();
					}else{
						$("msgdata").val('');
						//alert('kena! pesan = '+msg);
						//your ajax is here!
						$.ajax({
							url 		: "<?php echo base_url().'chat/kirimPesan'?>",
							type		: 'POST',
							datatype	: 'json',
							data		:{pesan:msg},
							beforeSend :function(){
							},
							success : function(result){
								$("ol").append("<li>saya : "+msg+"</li>");
								
								pesanbaru($("#snd").val(),$("#rcv").val());
								$("msgdata").val('.....');
								bacapsn();
								//alert("ini result loohh:>> "+result);
								//window.location = "<?php //echo base_url().'chat/kirimPesan'?>";
							}
						});
					}//tutup if 80
			}

			//load pesan
			function loadpesan(snd,rcv){//sampe sini binggung

				//alert("belom buat load pesan nanti di panggil di success ajax kirim isi result s: " +s+ " r: "+r);
				$.ajax({
					url 		: "<?php echo base_url().'chat/loadpesan'?>",
					type		: 'POST',
					datatype	: 'json',
					data 		: {id_user:snd,id_rec:rcv},
					beforeSend	: function(){
						$("#msg").html("<h2>Loading mang!,dagoan kedeng!</h2>");
					},
					success	: function(result){
						//$("#hide").hide();
						$("#box").html(result);
						//autoScroll();
					}
				});
			};

			function pesanbaru(snd,rcv){//sampe sini binggung
				//alert("belom buat load pesan nanti di panggil di success ajax kirim isi result s: " +s+ " r: "+r);
				$.ajax({
					url 		: "<?php echo base_url().'chat/pesanbaru'?>",
					type		: 'POST',
					datatype	: 'json',
					data 		: {id_user:snd,id_rec:rcv},
					beforeSend	: function(){

					},
					success	: function(result){

						//$("#hide").hide();
						$("#box").append(result);
					}
				});
			};

			//buat event saat klik pesan update dari unread(u) jadi read(r)
			function bacapsn(){
				alert("buat event saat klik pesan update dari unread(u) jadi read(r)");
			}

			function autoScroll(){
				//var scroll = document.getElementById('box');
				//elem.scrollBottom = elem.scrollHeight;
				$("#box").animate({
					scrollTop:$("#box")[0].scrollHeight},2000);
			}
		//} salah!
	</script>	
</body>
</html>