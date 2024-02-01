<?php
require('db.php'); 
date_default_timezone_set('Europe/Istanbul'); 
mysqli_set_charset($con,"utf8");
$datetime = new DateTime(); 
 
 
if( isset($_GET['fix_Hata']))
{ 
	date_default_timezone_set('Europe/Istanbul'); 
    $datetime = new DateTime();    
	$Log_GuncelTarih = $datetime->format('Y-m-d H:i:s');
	$fix_Hata = stripslashes($_GET['fix_Hata']);
	$hata_Guncelle = mysqli_query($con, "UPDATE server_hatalar SET Hata_Tarih='$Log_GuncelTarih',Hata_Durum='Fixed',Fix_Tarih='$Log_GuncelTarih' WHERE id='$fix_Hata'");
}	

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RextBot Hata Tespit Sistemi</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>


<div class="container">
	<div class="item">
  <!-- ############################################# -->
		<div class="wrapper">
			<header>RextBot Hata Listesi</header>
			 
			 <?php
					$result = mysqli_query($con, "SELECT * FROM `server_hatalar` ORDER BY Hata_Tarih desc ");
			?>	
				
			<!-- ####################################################################################################################################### -->
			<ul class="todoList" style="display: inline-block;margin-right: 15px;max-height: 100%;">
				<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">Server Name</li>
				<?php		
					while ($row = mysqli_fetch_assoc($result)) 
					{ 
						if(strstr($row["Server_Name"], "[U]")) 
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background-color: #919191;">'. $row["Server_Name"] . '</li>';
						else
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">[PVP]'. $row["Server_Name"] . '</li>'; 
					}
					mysqli_data_seek($result, 0);
				?>	
			</ul>
			
			<ul class="todoList" style="display: inline-block;margin-right: 15px;max-height: 100%;">
				<li style="width: 100%;padding-left: 15px;padding-right: 15px;text-align: center;">Server Hata</li>
				<?php		
					while ($row = mysqli_fetch_assoc($result)) 
					{ 
						if(strstr($row["Server_Name"], "[U]")) 
							echo '<li style="width: 100%;padding-left: 15px;padding-right: 15px;text-align: center;background-color: #919191;">'. $row["Server_Hata"] . '</li>'; 
						else
							echo '<li style="width: 100%;padding-left: 15px;padding-right: 15px;text-align: center;">'. $row["Server_Hata"] . '</li>'; 
					}
					mysqli_data_seek($result, 0);
				?>	
			</ul>
			<ul class="todoList" style="display: inline-block;margin-right: 15px;max-height: 100%;">
				<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">Hata Tarih</li>
				<?php		
					while ($row = mysqli_fetch_assoc($result)) 
					{ 
						if(strstr($row["Server_Name"], "[U]")) 
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background-color: #919191;">'. $row["Hata_Tarih"] . '</li>';
						else
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">'. $row["Hata_Tarih"] . '</li>';
					}
					mysqli_data_seek($result, 0);
				?>	
			</ul>
			
			<ul class="todoList" style="display: inline-block;margin-right: 15px;max-height: 100%;">
				<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">Fix Tarih</li>
				<?php		
					while ($row = mysqli_fetch_assoc($result)) 
					{ 
						if(strstr($row["Server_Name"], "[U]")) 
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background-color: #919191;">'. $row["Fix_Tarih"] . '</li>'; 
						else
						echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">'. $row["Fix_Tarih"] . '</li>';	
					}
					mysqli_data_seek($result, 0);
				?>	
			</ul>
			
			<ul class="todoList" style="display: inline-block;margin-right: 15px;max-height: 100%;">
				<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;">Hata Durum</li>
				<?php		
					while ($row = mysqli_fetch_assoc($result)) 
					{ 
						$durum = $row["Hata_Durum"];
						if(isset($_GET['admin']) and $durum != "Fixed")
						{
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background: #00b8ff;color: white;"><a href="index.php?admin&fix_Hata='.$row["id"].'">Fix Server</a></li>';
						} 
						else if($durum != "Fixed")
						{
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background: #ff006a;color: white;">Waiting...</li>';
						} 
						else
						{
							echo '<li style="width: 100%;max-width: 200px;padding-left: 15px;padding-right: 15px;text-align: center;background: #ffc800;color: white;">'. $row["Hata_Durum"] . '</li>'; 
						}
					}
				?>	
				
				
			</ul>
			<!-- ####################################################################################################################################### -->
		</div>
	<!-- ############################################# -->
  </div>
</body>
</html>
