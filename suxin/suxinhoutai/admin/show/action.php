<?php
include "../../config/db.php";
$type=$_GET['type'];
switch ($type) {
    case "add1":
        $name=$_POST['title'];
        $img=$_POST['img'];
        $info=$_POST['info'];
        $time22=date("Y-m-d H:i:s",time());
        $author=$_POST['author'];
        $cid=$_POST['cid'];
        $num=$_POST['num'];
        $content=$_POST['content'];
        $qqq="insert into showw(title,img,info,time,author,num,content,cid)values ('$name','$img','$info','$time22','$author','$num','$content','$cid')";
        $res=$mysqli->query($qqq);
//var_dump($res);
        if($res){
            echo "<script>alert('添加成功')</script>";
            echo "<script>location.href='index.php'</script>";
        }else{
            echo "<script>alert('添加失败')</script>";
            echo "<script>location.href='add.php'</script>";
        }
        break;
    case 'add':
        $name=$_POST['name'];

        $sql="insert into showw(title) values ('$name')";

        $res=$mysqli->query($sql);
        if($res){
            $data=[
                "code"=>200,
                "info"=>"添加成功"
            ];
        }else {
            $data = [
                "code" => 400,
                "info" => "添加失败"
            ];
        }
        echo json_encode($data);
        break;
    case 'datas':
        $sqlTot = "select count(*) 'tot' from showw";
        $resTot = $mysqli->query($sqlTot);
        $dataTot = $resTot->fetch_all(MYSQLI_ASSOC)[0]['tot'];
        $page=$_GET["page"];
        $limit=$_GET["limit"];
        $start=($page-1)*$limit;
        $sql = "select * from showw limit $start,$limit";//获取表中数据
        $result = $mysqli->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);//一次获取所有数据
//var_dump($data);

        $data0=[
            "code"=>0,
            "msg"=>"",
            "count"=>$dataTot,
            "data"=>$data,
        ];
        echo json_encode($data0);
        break;
    case 'del':
        $id=$_POST["id"];
        $sql = "delete from showw where id = $id";
        $res=$mysqli->query($sql);
        if($res){
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
    case 'xiugai':

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
    case 'query':
$sql='select * from category';
$res=$mysqli->query($sql);
$data=$res->fetch_all(MYSQLI_ASSOC);
$data0=[
  "code"=>200,
  "info"=>"成功",
  "data"=>$data
];
echo json_encode($data0);
        break;
//    case '':
//
//        break;

}