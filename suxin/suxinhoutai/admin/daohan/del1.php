<?php
var_dump($_GET);
header("Content-type:text/html;charset=utf-8");
$db_host="localhost";                                           //连接的服务器地址
$db_user="root";                                                  //连接数据库的用户名
$db_psw="";                                                  //连接数据库的密码
$db_name="suxin";                                           //连接的数据库名称
$mysqli=new mysqli($db_host,$db_user,$db_psw,$db_name);       // 检测连接
mysqli_query($mysqli,"set names utf8");
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}
//echo "连接成功";
$id=$_GET['id'];
$sql="delete from nav where (id='$id')";   //''
$result=$mysqli->query($sql);
if($result==true){
    echo '<script>alert("删除成功") </script>';
    echo '<script>location.href="../index1.php"</script>';
}else{
    echo '<script>alert("删除失败") </script>';
}

