<?php
include "../../config/db.php";
$mysqli->set_charset('utf8');
$id=$_POST['id'];
$img=$_POST['img'];
$title=$_POST['title'];
$oldImg=$_POST['oldImg'];
$info=$_POST['info'];
//$cid=$_POST['cid'];
$author=$_POST['author'];
$content=$_POST['content'];
$num=$_POST['num'];
$sql="update showw set title='$title',content='$content',img='$img',info='$info',author='$author',num='$num' where id=$id";
$result=$mysqli->query($sql);
//var_dump($result);
if($result){
    unlink($oldImg);
    echo "<script>alert('修改成功')</script>";
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
}
?>