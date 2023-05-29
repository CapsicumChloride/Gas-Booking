<?php
include("../dbcon.php");

$sql = "SELECT * FROM sectionone WHERE issuedate";
$result = mysqli_query($con, $sql);
$output ='<table>
<tr>
<th align = "center">Serial</th>
<th align = "center">Name</th>
<th align = "center">Rank</th>
<th align = "center">Issue Date</th>
<th align = "center">Quantity</th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['id'].'</th>
    <th align = "center">'.$excel['name'].'</th>
    <th align = "center">'.$excel['rank'].'</th>
    <th align = "center">'.$excel['issuedate'].'</th>
    <th align = "center">'.$excel['quantity'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=SectionOneIssue.xls');
echo $output;


?>