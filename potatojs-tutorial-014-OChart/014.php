<?php
header('Content-Type:application/json');
$list=array();
$data=array();

$data[0]="0";
$data[1]="1";
$data[2]="3";
$data["calories"]="4";
array_push($list,$data);

$data[0]="1";
$data[1]="2";
$data[2]="5";
$data["calories"]="8";
array_push($list,$data);

$data[0]="3";
$data[1]="3";
$data[2]="1";
$data["calories"]="7";
array_push($list,$data);

$data[0]="2";
$data[1]="5";
$data[2]="7";
$data["calories"]="14";
array_push($list,$data);

echo json_encode($list);

?>
