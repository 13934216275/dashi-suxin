<?php
header("Content-type:text/html;charset=utf-8");
$db_host="localhost";                                           //连接的服务器地址
$db_user="root";                                                    //连接数据库的用户名
$db_psw="";                                                  //连接数据库的密码
$db_name="suxin";                                           //连接的数据库名称
$mysqli=new mysqli($db_host,$db_user,$db_psw,$db_name);       // 检测连接
mysqli_query($mysqli,"set names utf8");
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}
//echo "链接成功";


