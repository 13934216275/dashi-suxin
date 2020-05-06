<?php
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
$sql00="select * from banner where id='$id'";
$res=$mysqli->query($sql00);
$data00=$res->fetch_all(MYSQLI_ASSOC)[0];
$img=$data00['img'];
$sql="delete from banner where id='$id'";   //''
$result=$mysqli->query($sql);
if($result){
    unlink($img);
    $data=[
        "code"=>200,
        "info"=>"删除成功"
    ];
}else {
    $data = [
        "code" => 400,
        "info" => "删除失败"
    ];
}
echo json_encode($data);
?>
