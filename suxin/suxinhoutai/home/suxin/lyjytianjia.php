<?php
include "../../config/db.php";
$name=$_POST["name"];
$phone=$_POST["phone"];
$content=$_POST["content"];
$time=date("Y-m-d H:i:s",time());
$sql="insert into message(name,phone,content,time)values('$name','$phone','$content','$time')";
$res=$mysqli->query($sql);
if($res){
    echo "<script>alert('添加成功')</script>>";
    echo "<script>window.location.href='lyjy.php'</script>";
}else{
    echo "<script>alert('添加失败')</script>>";
    echo "<script>window.location.href='lyjy.php'</script>";
}
?>