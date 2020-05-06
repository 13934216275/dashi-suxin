<?php
include "../../config/db.php";
$type=$_GET['type'];
switch ($type) {
    case 'insert':
        $name=$_POST['name'];
        $sql="insert into category(name) values ('$name')";
        $res=$mysqli->query($sql);
        if($res){
            $data=[
                "code"=>200,
                "info"=>"添加成功"
            ];
        }else{
            $data=[
                "code"=>400,
                "info"=>"添加失败"
            ];
        }
        echo json_encode($data);
        break;
    case 'datas':
        include "../../config/db.php";
        $sqlTot="select count(*) 'tot' from category";
        $resTot = $mysqli ->query($sqlTot);
        $dataTot = $resTot->fetch_all(MYSQLI_ASSOC)[0]['tot'];
        $page=$_GET['page'];
        $limit=$_GET['limit'];
        $start=($page-1)*$limit;
        $sql="select * from category limit $start,$limit"; //desc降序   asc升序
        $res = $mysqli ->query($sql);
        $data = $res->fetch_all(MYSQLI_ASSOC);
        //$data2=date('Y-m-d H:i:s',$time);
        $data0=[
            "code"=>0,
            "msg"=>"",
            "count" =>$dataTot,
            "data"=>$data
        ];
        echo json_encode($data0);
        break;
    case 'del':
        $id=$_POST['id'];
        $sql="delete from category where id='$id'";
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
    case 'compile1':
        $id=$_POST['id'];
        $sql="select * from category where id='$id'";
        $res=$mysqli->query($sql);
        $data=$res->fetch_all(MYSQLI_ASSOC)[0];
//            $datas=$data['name'];
        echo json_encode($data);
        break;
    case 'compile2':
        $id=$_POST['id'];
        $name=$_POST['name'];
        $sql="update category set name='$name' where id='$id'";
        $res=$mysqli->query($sql);
        if($res){
            $data=[
                "code"=>200,
                "info"=>"修改成功"
            ];
        }else{
            $data=[
                "code"=>400,
                "info"=>"修改失败"
            ];
        }
        echo json_encode($data);
        break;
}