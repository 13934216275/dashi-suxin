<?php
$db_host="localhost";                                           //连接的服务器地址
$db_user="root";                                                  //连接数据库的用户名
$db_psw="";                                                  //连接数据库的密码
$db_name="suxin";                                           //连接的数据库名称
$mysqli=new mysqli($db_host,$db_user,$db_psw,$db_name);
// 检测连接
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}
echo "连接成功";
$mysqli->set_charset('utf8');
//var_dump($_POST);
$id=$_POST['id'];
//var_dump($id);
$name=$_POST['name'];
$url=$_POST['url'];
$sort=$_POST['sort'];
//$repassword=$_POST['repassword'];
$sql="update nav set name='$name',url='$url',sort='$sort' where id=$id";
$result=$mysqli->query($sql);
var_dump($result);
if($result==true){
    echo "<script>alert('修改成功')</script>";
    echo "<script>location.href='../index1.php'</script>";
}else{
    echo "<script>alert('修改失败')</script>";
}
//?>