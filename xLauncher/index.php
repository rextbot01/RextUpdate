<?php
require('db.php'); 
date_default_timezone_set('Europe/Istanbul'); 
mysqli_set_charset($con,"utf8");
$datetime = new DateTime(); 
 
function checkSiteStatus($url) 
{
    $headers = @get_headers($url);
    if ($headers && strpos($headers[0], '200') !== false)
	{
        return true;
    } 
	else 
	{
        return false;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RextBot Server List</title>
    <link rel="stylesheet" href="styles.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>


<div class="container">
	<div class="item"> 
	<!-- ############################################# -->
		<div class="wrapper">
			<header>RextBot PVP List</header>
			
			<?php		
			$result = mysqli_query($con, "SELECT * FROM `serverlist` WHERE ServerTipi='pvp' ORDER BY `ServerTarih` ASC ");

			// Her satırı işle
			while ($row = mysqli_fetch_assoc($result)) 
			{ 
				$ServerName 			= $row["ServerName"];
				$ServerSite 			= $row["ServerSite"];
				$ServerTarih 			= $row["ServerTarih"];
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 205px;padding-right: 15px;"><span class="icon"><i></i></span>'. $ServerName . '</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;">'. $ServerTarih . '</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;/* transform: translateY(-50%); */background: #b7e59b;text-align: center;color: #fff;border-radius: 3px 3px 3px 3px;cursor: pointer;"><a href="' . $ServerSite . '" target="_blank" rel="noreferrer noopener">Link</a></li>
			</ul>';
			}
			?>	
		</div>
	<!-- ############################################# --> 
  </div> 
  <div class="item"> 
	<!-- ############################################# -->
		<div class="wrapper">
			<header>RextBot X List</header>
			
			<?php		
			$result = mysqli_query($con, "SELECT * FROM `serverlist` WHERE ServerTipi='pvp' ");

			// Her satırı işle
			while ($row = mysqli_fetch_assoc($result)) 
			{ 
				$ServerName 			= $row["ServerName"];
				$ServerSite 			= $row["ServerSite"];
				$ServerTarih 			= $row["ServerTarih"];
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 205px;padding-right: 15px;"><span class="icon"><i></i></span>'. $ServerName . '</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;">10.20.2023</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;/* transform: translateY(-50%); */background: #b7e59b;text-align: center;color: #fff;border-radius: 3px 3px 3px 3px;cursor: pointer;"><a href="' . $ServerSite . '" target="_blank" rel="noreferrer noopener">Link</a></li>
			</ul>';
			}
			?>	
		</div>
	<!-- ############################################# --> 
  </div> 
  <div class="item"> 
	<!-- ############################################# -->
		<div class="wrapper">
			<header>RextBot PLUS List</header>
			
			<?php		
			$result = mysqli_query($con, "SELECT * FROM `serverlist` WHERE ServerTipi='pvp' ");

			// Her satırı işle
			while ($row = mysqli_fetch_assoc($result)) 
			{ 
				$ServerName 			= $row["ServerName"];
				$ServerSite 			= $row["ServerSite"];
				$ServerTarih 			= $row["ServerTarih"];
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 205px;padding-right: 15px;"><span class="icon"><i></i></span>'. $ServerName . '</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;">10.20.2023</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;/* transform: translateY(-50%); */background: #b7e59b;text-align: center;color: #fff;border-radius: 3px 3px 3px 3px;cursor: pointer;"><a href="' . $ServerSite . '" target="_blank" rel="noreferrer noopener">Link</a></li>
			</ul>';
			}
			?>	
		</div>
	<!-- ############################################# --> 
  </div> 
  <div class="item"> 
	<!-- ############################################# -->
		<div class="wrapper">
			<header>RextBot x64 List</header>
			
			<?php		
			$result = mysqli_query($con, "SELECT * FROM `serverlist` WHERE ServerTipi='pvp' ");

			// Her satırı işle
			while ($row = mysqli_fetch_assoc($result)) 
			{ 
				$ServerName 			= $row["ServerName"];
				$ServerSite 			= $row["ServerSite"];
				$ServerTarih 			= $row["ServerTarih"];
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 205px;padding-right: 15px;"><span class="icon"><i></i></span>'. $ServerName . '</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;margin-right: 15px;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;">10.20.2023</li>
				</ul>';
				
				echo '<ul class="todoList" style="display: inline-block;">
				<li style="width: 100%;max-width: 115px;padding-left: 15px;padding-right: 15px;text-align: center;/* transform: translateY(-50%); */background: #b7e59b;text-align: center;color: #fff;border-radius: 3px 3px 3px 3px;cursor: pointer;"><a href="' . $ServerSite . '" target="_blank" rel="noreferrer noopener">Link</a></li>
			</ul>';
			}
			?>	
		</div>
	<!-- ############################################# --> 
  </div> 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
</div>
</body>
</html>
