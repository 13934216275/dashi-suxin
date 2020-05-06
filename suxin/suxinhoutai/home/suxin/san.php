<?php
include "../../config/db.php";
$sqlnav1="select * from nav order by sort";
$resnav1=$mysqli->query($sqlnav1);
$datanav1=$resnav1->fetch_all(MYSQLI_ASSOC);
$sqlshoww2="select * from showw where cid=18";
$resshoww2=$mysqli->query($sqlshoww2);
$datashoww2=$resshoww2->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>三</title>
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1121332_bw0emvlc969.css">
    <link rel="stylesheet" href="../../asset/home/san.css">
</head>
<style>
    /*.head{*/
        /*width: 100%;*/
        /*height:79px;*/
        /*background:white;*/
        /*!*background: #37474f;*!*/
        /*position: relative;*/

    /*}*/
    .head img{
        width: 150px;
        height: 50px;
        position: absolute;
        left: 150px;
        top: 14.5px;
    }
    .head-right{
        display: flex;
        justify-content:space-between;
        line-height: 79px;
        margin-right: 50px;
        position: relative;
    }
    .kuai{
        width: 64px;
        height: 79px;
    }
    .kuai a{
        color: #000000;
    }
    .kuai a:hover{
        color: #16B0DC;
    }
    .kuai123{
        width: 674.5px;
        height: 532.5px;
        background: #000;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.4;
        pointer-events: none;
    }
</style>
<body>
<div class="head" style="width: 100%;height:79px;rgba(0,0,0,0);">
    <img src="../../asset/home/img/1497971419.png" alt="">
    <div class="head-right" style="width: 600px;height: 79px; float: right">
        <?php
        foreach($datanav1 as $k=>$v){
            ?>
            <div class="kuai">
                <a href="<?php echo "$v[url]"?>"><?php echo "$v[name]"?></a>
            </div>
       <?php
        }
        ?>

    </div>
</div>
<div class="nei" style="height: 1133.5px;">
    <?php
    foreach ($datashoww2 as $k=>$v){
        ?>
        <div class="tu1">
            <img src="<?php echo "$v[img]"?>" alt="">
            <div class="kuai123"></div>
            <div class="zs">
                <p><?php echo "$v[time]"?></p>
                <h1>-</h1>
                <h2><?php echo "$v[title]"?></h2>
                <div class="liu">浏览</div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="biaozhi" style="background: #e0e0e0;">
    <a><i class="iconfont icon-weixin1"></i></a>
    <b><i class="iconfont icon-qq"></i></b>
    <span><i class="iconfont icon-informatiom"></i></span>
    <h4>豫ICP备17021305号</h4>
    <del>豫公网安备 41012202000160号</del>
    <h5>联系电话 0371-62180519  15890062947</h5>
    <h6>郑州素馨花卉有限公司 版权所有 © 2017-2021</h6>
    <img src="../../asset/home/img/gonganbeian.png" alt="">
</div>
</body>
</html>