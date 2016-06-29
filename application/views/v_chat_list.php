
<?php 
	foreach ($list_user as $lu) {
		# code...
		?>
		<div href="#" value="1" id="abcd"> <?php echo $lu->username; ?></div><br/>
		<?php
		echo "id pembimbing : ".$lu->id_pembimbing."<span/>";
		echo "id user 		: ".$lu->id_user."<span/>";
		echo "username 		: ".$lu->username."<br/>";
	}
?>