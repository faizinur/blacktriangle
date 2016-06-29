<!DOCTYPE html>
<html>
<head>
	<title>Login PKL</title>
</head>
<body>
	<center>Login Mahasiswa / Pembimbing redirect tergantung status pake controller yang sama PKL BELOM SELESAI</center>
	<center><h3>Mun Kosong asup keneh da can di validasi!</h3></center>
<div>
	<center><h1>KADE IEU NU MAHASISWA!</h1></center>
	<form action="<?php echo base_url().'index.php/mahasiswa/cek'?>" method="post">
		<table align="center"> 
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>

			<tr>
				<td>password</td>
				<td><input type="password" name="pass" required></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="masuk" value="klik asup!"></td>
			</tr>
		</table>
	</form>
</div>

<div>
	<center><h1>KADE IEU NU PEMBIMBING!</h1></center>
	<form action="<?php echo base_url().'index.php/pembimbing/cek'?>" method="post">
		<table align="center"> 
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>

			<tr>
				<td>password</td>
				<td><input type="password" name="pass" required></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="masuk" value="klik asup!"></td>
			</tr>
		</table>
	</form>
</div>

	<a href="<?php echo base_url()?>">kembali</a>

</body>
</html>