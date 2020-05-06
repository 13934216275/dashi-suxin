<?php
include "../../config/db.php";
$sql="select count(*) 'tot' from nav";
$res = $mysqli ->query($sql);
$data0 = $res->fetch_all(MYSQLI_ASSOC)[0]['tot'];
$page=$_GET['page'];
$limit=$_GET['limit'];
$fen=($page-1)*$limit;
$sql00="select * from nav limit $fen,$limit";
$res = $mysqli ->query($sql00);
$data = $res->fetch_all(MYSQLI_ASSOC);
//var_dump($data);
$data0=[
    "code"=>0,
    "msg"=>"",
    "count" =>$data0,
    "data"=>$data
];
echo json_encode($data0);
?>
