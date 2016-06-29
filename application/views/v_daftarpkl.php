<!DOCTYPE html>
<html>
<head>
	<title>Form Daftar PKL</title>
</head>
<body>
	<center>Daftar Pkl</center>
	<form action="<?php echo base_url().'daftar/daftarmhs'?>" method="post">
		<table align="center">
			<tr>
				<td>NRP</td>
				<td><input type="text" name="nrp"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Perguruan Tinggi</td>
				<td><input type="text" name="pt"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" name="jurusan"></td>
			</tr>
			<tr>
				<td>Bidang</td>
				<td><input type="text" name="bidang"></td>
			</tr>
			<tr>
				<td>tanggal masuk</td>
				<td><input type="date" name="tgl_msk"></td>
			</tr>
			<tr>
				<td>Lama KP</td>
				<td><input type="number" name="lamakp"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Daftar coeg! aing leuleus yeuh!"></td>
			</tr>			
		</table>
	</form>

	<a href="<?php echo base_url()?>">kembali</a>
</body>
</html>