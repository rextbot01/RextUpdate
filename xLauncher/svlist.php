<?php
 
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

$url = 'https://web.mazi2.com/';
$status = checkSiteStatus($url);
$siteDurum = "Pasif";
if ($status) 
{
    $siteDurum = "Site Aktif";
} 
else 
{
   $siteDurum = "Site Pasif";
}

$html = file_get_contents($url);

preg_match('/<title>(.*?)<\/title>/', $html, $matches);
$title = $matches[1];

preg_match('/<link rel=".*?icon".*?href="(.*?)".*?>/', $html, $matches);
$icon = $matches[1];





echo '<table style=" border: 1px solid gray; padding: 5px; border-radius: 5px; ">';
echo '<tr>';

echo "<td><img style='width: 25; border: 1px solid; border-radius: 10px; padding: 3px;' src='$icon' alt='Site Icon'></td>";
echo "<td>$title</td>"; 
echo "<td>20.10.2023</td>";
echo "<td>$siteDurum</td>";

echo '</tr>';
echo '</table>';

?>

