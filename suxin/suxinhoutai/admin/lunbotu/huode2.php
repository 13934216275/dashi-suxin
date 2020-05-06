<?php
//var_dump($_POST);
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
//echo "连接成功";
$name=$_POST["name"];
$img=$_POST["img"];
$sort=$_POST["sort"];
$status=0;
  $sql="select * from banner where name='$name'";
 $result=$mysqli->query($sql);
$date=$result->fetch_all(MYSQLI_ASSOC);
//  var_dump($date);
   if (!$date){
  $addsql= "insert into banner(name,img,sort)values('$name','$img','$sort')";
  $result1=$mysqli->query($addsql);
   echo "<script>alert('添加成功')</script>";
 echo "<script>window.location.href='index2.php'</script>";
      }else{
echo "<script>alert('用户名已存在')</script>>";
echo "<script>window.location.href='add.php'</script>";
  }

?>
