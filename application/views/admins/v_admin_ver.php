<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		echo "<h1>selamat datang ,".$this->session->userdata("nama")."</h1><br/>";
		if ($this->session->userdata("nama") == ""){
			redirect('admin/index');
		}else{
	?>
<center>Daftar Mahasiswa PKL</center>
	<table style="margin:20px auto;" border="1">
		<tr>	
			<th>no</th>
			<!-- <th>ID</th> -->
			<th>nrp</th>
			<th>nama</th>
			<th>asal pt</th>
			<th>jurusan</th>
			<th>bidang</th>
			<th>lama kp</th>
			<th>tanggal masuk</th>
			<th>status</th>
			<th>aksi</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($pendaftar as $pd) {
		?>
		<tr>
			<td><?php echo $no++?></td>
			<td><?php echo $pd->nrp ?></td>
			<td><?php echo $pd->nama  ?></td>
			<td><?php echo $pd->pt  ?></td>
			<td><?php echo $pd->jurusan  ?></td>
			<td><?php echo $pd->bidang  ?></td>
			<td><?php echo $pd->lamakp." bulan"  ?></td>
			<td><?php echo $pd->tgl_msk  ?></td>
			<td>
				<?php 
					if(($pd->status === 'Y') or ($pd->status === 'y')){
						echo "diterima";
					}else{
						echo "coba lagi";
					}
				?>		
			</td>

			<td>
				<?php ?>
				
				<?php 
					if(($pd->status === 'Y') or ($pd->status === 'y')){
						echo "<a href=#>Accept</a>";
					}else{
						echo anchor('admin/acc_data/'.$pd->id,'Accept');;
					}
				?>		
			</td>
		</tr>
		<?php }		?>
	</table>


	<?php }?>
</body>
</html>