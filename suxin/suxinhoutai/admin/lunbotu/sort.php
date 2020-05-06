<?php
include "../../config/db.php";

$id=$_GET['id'];
$sort=$_GET['value'];
$sql="update banner set sort='$sort' where id='$id'";
$res=$mysqli->query($sql);
if($res==true){
    $data=[
        "code"=>200,
        "info"=>"修改成功"
    ];
}else{
    $data=[
        "code"=>400,
        "info"=>"修改失败"
    ];
}
echo json_encode($data);
?>