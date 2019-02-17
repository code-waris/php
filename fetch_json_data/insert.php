<?php



$json = file_get_contents('data.json');
$data = json_decode($json,true);
$total=count($data["customers"]);
$_POST['id']=$total+1;
array_push($data['customers'], $_POST);
$final_data = json_encode($data); 
file_put_contents('data.json', $final_data);

?>