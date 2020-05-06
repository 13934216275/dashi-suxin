<?php
include "../../config/db.php";
$id=$_POST['id'];
$status=$_POST['status'];
$sql="update admin set status='$status' where id=$id";
$res=$mysqli->query($sql);
if($status==1){
    echo 1;
}else{
    echo 0;
}