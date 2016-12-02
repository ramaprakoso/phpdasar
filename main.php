<?php 
	session_start(); 
	require_once('koneksi.php');
	if(isset($_SESSION['login_user'])or($_SESSION['FBID'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#id_provinsi").change(function(){
				var idprovinsi=$(this).val(); 
				if(idprovinsi!=""){
					$.ajax({
						type:"post",
						url:"getkota.php",
						data:"id="+idprovinsi,
						success:function(data){
							$("#subkategori").html(data);
						}
					});
				}
			});
		});
	</script>
</head>
<body>
<h2><a href="logout.php">Logout</a></h2>
 <div class = "container">
            
            <div class = "hero-unit">
               <h1>Hello</h1>
               <p>Welcome to "facebook login" tutorial</p>
            </div>
            
            <div class = "span4">
				
               <ul class = "nav nav-list">
                  <li class = "nav-header">Image</li>
						
                  <li><img src = "https://graph.facebook.com/<?php 
                     echo $_SESSION['FBID']; ?>/picture"></li>
                  
                  <li class = "nav-header">Facebook ID</li>
                  <li><?php echo  $_SESSION['FBID']; ?></li>
               
                  <li class = "nav-header">Facebook fullname</li>
						
                  <li><?php echo $_SESSION['FULLNAME']; ?></li>
               
                  <li class = "nav-header">Facebook Email</li>
						
                  <li><?php echo $_SESSION['EMAIL']; ?></li>
               
                  <div><a href="logout.php">Logout</a></div>
						
               </ul>
					
            </div>
         </div>
	<select name="provinsi" id="id_provinsi">
		<option selected="selected">Pilih Provinsi</option> 
		<?php 
			$query=mysql_query("SELECT * FROM provinsi");
			while($data=mysql_fetch_array($query)){
		?>
		<option value="<?php echo $data['id_provinsi']?>"><?php echo $data['nama_provinsi']?></option>
		<?php #endwhile 
		} ?>
	</select>

	<select name="subkategori" id="subkategori">
		<option selected="selected">Pilih Kota</option>
	</select>
</body>
</html>

<?php 
	}else{
		echo "Forbidden Page !!!"; 
	}
?>