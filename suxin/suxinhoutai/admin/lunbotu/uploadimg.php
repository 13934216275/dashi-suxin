<?php
include "../../config/db.php";
//var_dump($_FILES);
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
?>