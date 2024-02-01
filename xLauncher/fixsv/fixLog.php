<?php
// MySQL bağlantısı
$servername = "127.0.0.1";
$username = "rextbfcm_server";
$password = "99201102aA@";
$dbname = "rextbfcm_server";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Veritabanina baglanilamadi: " . $conn->connect_error);
}
 
if (isset($_GET["Server_Name"]) && isset($_GET["hata_Kodu"])) 
{
    $ServerName = $_GET["ServerName"]; 
	$ServerName = mysqli_real_escape_string($conn, $ServerName); 
	
	$Client = $_GET["hata_Kodu"]; 
	$Client = mysqli_real_escape_string($conn, $Client); 
	
    $check_sql = "SELECT * FROM server_list WHERE server_name = '$ServerName'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) 
	{
        $row = $check_result->fetch_assoc();
		if (isset($row["server_pattern"])) 
		{
			$cevap = $row["server_pattern"];
			echo "Pattern : " . $cevap;
		} 
		else
		{
			echo "error";
		}
    } 
	else
	{
		echo "error";
	}	
} 
else
{
	echo "error";
}
$conn->close();
?>

<?php
if( isset($_GET['Server_Name']) and isset($_GET['hata_Kodu']) )
{
	date_default_timezone_set('Europe/Istanbul'); 
    $datetime = new DateTime();    
	$Log_GuncelTarih = $datetime->format('Y-m-d H:i:s');
		
	$Server_Name = stripslashes($_GET['Server_Name']);
	
	$Server_Hata = stripslashes($_GET['hata_Kodu']);
	
	$hata_QUERY = mysqli_query($con, "SELECT * FROM `server_hatalar` WHERE Server_Name='$Server_Name'");
	if ($hata_QUERY->num_rows > 0)
	{
		$hata_Guncelle = mysqli_query($con, "UPDATE server_hatalar SET Server_Hata='$Server_Hata',Hata_Tarih='$Log_GuncelTarih',Hata_Durum='Waiting...',Fix_Tarih='Waiting...' WHERE Server_Name='$Server_Name'");
	} 
	else 
	{
		$query    = "insert into server_hatalar(Server_Name,Server_Hata,Hata_Durum,Hata_Tarih,Fix_Tarih) values('$Server_Name','$Server_Hata' ,'Waiting...','$Log_GuncelTarih','Waiting...')";  
		$result = mysqli_query($con, $query);    
	}
}
?>