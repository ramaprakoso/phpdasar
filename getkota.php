<?php 
	include "koneksi.php"; 
	$id=$_POST['id']; 
	$query=mysql_query("SELECT * FROM kota WHERE provinsi_id='$id'"); 
	$count=mysql_num_rows($query); 
	if($count > 0 ){
		while ($data=mysql_fetch_array($query)) {
			echo "<option value=".$data["id_kota"].">".$data["nama_kota"]."</option>";
		}
	}
?>