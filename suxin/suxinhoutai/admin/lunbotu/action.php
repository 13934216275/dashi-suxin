<?php
include "../../config/db.php";
$type=$_GET['type'];
switch ($type){
    case "chazhao":
        $sql="select count(*) 'tot' from banner";
        $res = $mysqli ->query($sql);
        $data0 = $res->fetch_all(MYSQLI_ASSOC)[0]['tot'];
        $page=$_GET['page'];
        $limit=$_GET['limit'];
        $fen=($page-1)*$limit;
        $sql00="select * from  banner order by sort desc limit $fen,$limit";
        $res = $mysqli ->query($sql00);
        $data = $res->fetch_all(MYSQLI_ASSOC);
//var_dump($data);
        $data0=[
            "code"=>0,
            "msg"=>"",
            "count" =>$data0,
            "data"=>$data
        ];
        echo json_encode($data0);
        break;
    case "tianjia":
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
        break;
    case "shangchuan":
        $file=$_FILES['file'];
//var_dump($file);
        if($file['error']==0){
            $name=$file['name'];
            $tmp_name=$file['tmp_name'];
//    var_dump($tmp_name);
            $str=strrpos($name,'.');
            $imgs=substr($name,$str);
//    var_dump($imgs);
            $newname=time().rand().$imgs;
            $img='../../upload/banner/'.$newname;

            if (move_uploaded_file($tmp_name,$img)){
                $data=[
                    "code"=>0,
                    "msg"=>'',
                    "data"=>[
                        "src"=>"$img"
                    ]
                ];
            }else {
                $data = [
                    "code" => 0,
                    "msg" => '',
                    "data" => [
                        "src" => ""
                    ]
                ];
            }
        }else{
            $data=[
                "code"=>0,
                "msg"=>'',
                "data"=>[
                    "src"=>""
                ]
            ];
        }

        echo json_encode($data);
        break;
    case "del":
        $id=$_GET['id'];
        $sql00="select * from banner where id='$id'";
        $res=$mysqli->query($sql00);
        $data00=$res->fetch_all(MYSQLI_ASSOC)[0];
        $img=$data00['img'];
        $sql="delete from banner where id='$id'";   //''
        $ress=$mysqli->query($sql);
        if($ress){
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
        break;
    case "sort":
        $id=$_GET['id'];
        $sort=$_GET['value'];
        $sql="update banner set sort='$sort' where id='$id'";
        $res=$mysqli->query($sql);
        if($res==true){
            $data=[
                "code"=>200,
                "info"=>"删除成功"
            ];
        }else{
            $data=[
                "code"=>400,
                "info"=>"删除失败"
            ];
        }
        echo json_encode($data);
        break;
    case "gaihou":
        $mysqli->set_charset('utf8');
        $id=$_POST['id'];
        $img=$_POST['img'];
        $name=$_POST['name'];
        $oldImg=$_POST['oldImg'];
        $sort=$_POST['sort'];
        if ($img==""){
            $sql="update banner set name='$name',sort='$sort' where id=$id";
            $result=$mysqli->query($sql);
            if($result){
//                unlink($oldImg);
                echo "<script>alert('修改成功')</script>";
                echo "<script>location.href='index2.php'</script>";
            }else{
                echo "<script>alert('修改失败')</script>";
            }
        }else{
            $sql="update banner set name='$name',img='$img',sort='$sort' where id=$id";
            $result=$mysqli->query($sql);
            if($result){
                unlink($oldImg);
                echo "<script>alert('修改成功')</script>";
                echo "<script>location.href='index2.php'</script>";
            }else{
                echo "<script>alert('修改失败')</script>";
            }
        }

//var_dump($result);

        break;
    default:
        break;






}