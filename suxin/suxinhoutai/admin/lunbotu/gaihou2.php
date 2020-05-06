<?php
$db_host="localhost";                                           //连接的服务器地址
$db_user="root";                                                  //连接数据库的用户名
$db_psw="";                                                  //连接数据库的密码
$db_name="suxin";                                           //连接的数据库名称
$mysqli=new mysqli($db_host,$db_user,$db_psw,$db_name);
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$id=$_POST['id'];
$img=$_POST['img'];
$name=$_POST['name'];
$oldImg=$_POST['oldImg'];
$sort=$_POST['sort'];
$sql="update banner set name='$name',img='$img',sort='$sort' where id=$id";
$result=$mysqli->query($sql);
//var_dump($result);
if($result){
    unlink($oldImg);
    echo "<script>alert('修改成功')</script>";
    echo "<script>location.href='index2.php'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
}
?>