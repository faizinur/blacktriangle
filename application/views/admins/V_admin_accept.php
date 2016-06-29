<!DOCTYPE html>
<html>
<head>
	<title>halaman accept</title>
</head>
<body>


	<form action="<?php echo base_url().'index.php/admin/penerimaan'?>" method="post">

		<select name='id_pmb' required>
			<option value=''>--PIlih pembimbing--</option>
				<?php				
					foreach ($id_pmb as $pmb) {?>
						<option value='<?php echo $pmb->id ?>'><?php echo $pmb->username ?></option>
				<?php } ?>
		</select>

		<input type="hidden" value="<?php echo $id_m;?>" name="id_baru" >
		
		<input type="text" name="username"  placeholder='username'>

		<input type="password" name="password"  placeholder='password'>
	
		<input type="submit" value="Daftar coeg! aing leuleus yeuh!">
	</form>

</body>
</html>