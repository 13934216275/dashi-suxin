<?php
include "../../config/db.php";
//var_dump($_POST);
$name=$_POST['name'];
$img=$_POST['img'];
$sort=$_POST['sort'];

$qqq="insert into banner(name,img,sort)values ('$name','$img','$sort')";
$res=$mysqli->query($qqq);
//var_dump($res);
if($res){
    echo "<script>alert('添加成功')</script>";
    echo "<script>location.href='index2.php'</script>";
}else{
    echo "<script>alert('添加失败')</script>";
    echo "<script>location.href='add.php'</script>";
}