
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<?php

		echo "<h1>selamat datang ,".$this->session->userdata("nama")." ".$this->session->userdata("level")."</h1><br/>";
		if (($this->session->userdata("nama") == "") and ($this->session->userdata("level") == 0)){
			redirect('admin/');
		}else {
	?>

	<a href="<?php echo base_url().'admin/verifikasi'?>" verifikasi pendaftaran->submit->add pass+username->method verifikasi(update pake ID table pendaftar, insert ke table listuser)<br/>
	<?php echo anchor('jadwal/edit_jadwal','kelola jadwal praktek'); ?><br/>
	<a href="<?php echo base_url().'admin/logout'?>">logout we mun enggesmah</a>

	<?php }?>
</body>

</html>
