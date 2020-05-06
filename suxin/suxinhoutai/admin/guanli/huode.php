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
$username=$_POST["username"];
$password=$_POST["password"];
$password000=md5($password);
$status=0;
$time=time();
//var_dump($result);
$repassword = $_POST['repassword'];
if ($username){
    if (strlen($username)>=3&&strlen($username)<=6){
        if ($password){
            if (strlen($password)>=6&&strlen($password)<=12){
                if ($password==$repassword){
                    $sql="select * from admin where username='$username'";
                    $result=$mysqli->query($sql);
                    $date=$result->fetch_all(MYSQLI_ASSOC);
//                    var_dump($date);
                    if (!$date){
                        $addsql= "insert into admin(username,password,status,time)values('$username','$password000','$status','$time')";
                        $result1=$mysqli->query($addsql);
                            echo "<script>alert('添加成功')</script>";
                        echo "<script>window.location.href='../index.php'</script>";
                    }else{
                        echo "<script>alert('用户名已存在')</script>>";
                        echo "<script>window.location.href='add.php'</script>";
                    }
                }else{
                    echo "<script>alert('请输入一致的密码')</script>>";
                    echo "<script>window.location.href='add.php'</script>";
                }
            }else{
                echo "<script>alert('密码请输入6-12位')</script>>";
            }
        }else{
            echo "<script>alert('请输入密码')</script>>";
            echo "<script>window.location.href='add.php'</script>";
        }
    }else{
        echo "<script>alert('用户名请输入3-6位')</script>>";
        echo "<script>window.location.href='add.php'</script>";
    }
}else{
    echo "<script>alert('请输入用户名')</script>>";
    echo "<script>window.location.href='add.php'</script>";
}
?>
