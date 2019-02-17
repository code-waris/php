<?php

include_once('include/config.php');
$arrlist=array();
$json = file_get_contents('data.json');
$obj = json_decode($json,true);
$total=count($obj["customers"]);

$data=$_POST['data'];


if($data!="select"){
for($i=0;$i<$total;$i++){
	echo '<tr>';
	if($obj['customers'][$i]['title']==$data)
	{?>
		<td><?php echo $obj['customers'][$i]['id']?></td>
		<td><?php echo $obj['customers'][$i]['firstName']?></td>
		<td><?php echo $obj['customers'][$i]['lastName']?></td>
		<td><?php echo $obj['customers'][$i]['email']?></td>
		<td><?php echo $obj['customers'][$i]['phone']?></td>
	</tr>
		
	<?php } }}
	else
	{

		echo "0";
	}?>
