<?php
include "../../config/db.php";
$id=$_GET['id'];
$status=$_GET['status'];
$sql="delete from admin where id=$id";
$res=$mysqli->query($sql);
if($res==true){
    $data=[
        "code"=>200,
        "info"=>"删除成功"
    ];
}else{
    $data=[
        "code"=>400,
        "info"=>"删除失败"
    ];
}
echo json_encode($data);
?>

