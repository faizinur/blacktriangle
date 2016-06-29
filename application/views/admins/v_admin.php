<!DOCTYPE html>
<html>
<head>
	<title>ini Admin</title>
</head>
<body>
		<blink><center><h1>BELOM BIKIN!</h1></center><blink/>
	<form action="<?php echo base_url().'index.php/admin/cek'?>" method="post">
		<table align="center"> 
			<tr>
				<td>Nama</td>
				<td><input ty pe="text" name="nama"></td>
			</tr>

			<tr>
				<td>password</td>
				<td><input type="password" name="pass"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="masuk"></td>
			</tr>
		</table>
	</form>

		<a href="<?php echo base_url()?>">kembali</a>
</body>
</html>