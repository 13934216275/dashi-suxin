<?php
include "../../config/db.php";
$sqlnav="select * from nav order by sort";
$resnav=$mysqli->query($sqlnav);
$datanav=$resnav->fetch_all(MYSQLI_ASSOC);
$sqlbanner="select * from banner";
$resbanner=$mysqli->query($sqlbanner);
$databanner=$resbanner->fetch_all(MYSQLI_ASSOC);
$sqlshoww="select * from showw where cid=18";
$resshoww=$mysqli->query($sqlshoww);
$datashoww=$resshoww->fetch_all(MYSQLI_ASSOC);
$sqlshoww1="select * from showw where cid=17";
$resshoww1=$mysqli->query($sqlshoww1);
$datashoww1=$resshoww1->fetch_all(MYSQLI_ASSOC);
//var_dump($datashoww1);
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_1121332_if7cpykaakk.css">
    <link rel="stylesheet" href="../../asset/home/sxhh.css">
</head>
<body>
<style>
    .head-right{
        display: flex;
        justify-content:space-between;
        line-height: 79px;
        margin-right: 50px;
    }
    .kuai a{
        color: #FFFFFF;
    }
    .kuai a:hover{
        color: #16B0DC;
    }
    .buju{
        width: 1349px;
        height: 707px;
        position: relative;
        margin-top: 50px;
    }
    .kua:nth-child(1){
        width:530px ;
        height:96px ;
        position: absolute;
        left: -700px;
        transition: all 0.5s;
        top: 50px;
    }
    .kua:nth-child(2){
        width:530px ;
        height:96px ;
        position: absolute;
        left: 1300px;
        transition: all 0.5s;
        top: 50px;
    }
    .kua:nth-child(3){
        width:530px ;
        height:96px ;
        position: absolute;
        left:-700px;
        top:180px;
        transition: all 0.5s;
    }
    .kua:nth-child(4){
        width:530px ;
        height:96px ;
        position: absolute;
        left: 1300px;
        top:180px;
        transition: all 0.5s;
    }
    .kua:nth-child(5){
        width:530px ;
        height:96px ;
        position: absolute;
        left:-700px;
        top:320px;
        transition: all 0.5s;
    }
    .kua:nth-child(6){
        width:530px ;
        height:96px ;
        position: absolute;
        left:1300px;
        top:270px;
        transition: all 0.5s;
    }
    .kua:nth-child(7){
        width:530px ;
        height:96px ;
        position: absolute;
        left:-700px;
        top:450px;
        transition: all 0.5s;
    }
    .kua:nth-child(8){
        width:530px ;
        height:96px ;
        position: absolute;
        left: 1300px;
        top:450px;
        transition: all 0.5s;
    }
</style>
<!--头部-->
<div class="head">
    <img src="../../asset/home/img/1497971419.png" alt="">
<div class="head-right" style="width: 600px;height: 79px; float: right">
    <?php
    foreach($datanav as $k=>$v){
        ?>

    <div class="kuai">
        <a href="<?php echo "$v[url]"?>"><?php echo "$v[name]"?></a>
    </div>
        <?php
    }
    ?>

</div>
</div>
<!--轮播图-->
    <div class="chart">
        <?php
        foreach ($databanner as $k=>$v){
            ?>
            <li><a href=""><img src="<?php echo "$v[img]"?>" alt="" style="left: 0"></a></li>
        <?php
        }
        ?>
        <div class="left1"><i class="iconfont icon-left"></i></div>
        <div class="right1"><i class="iconfont icon-webicon213"></i></div>
        <div class="dian">
            <ul class="hot"></ul>
            <ul></ul>
        </div>
    </div>
<!--内容-->
<div class="content1">
<div class="hed1">
    <p>素馨花艺
        <i class="iconfont icon-sanjiao4"> </i>
    </p>
        <div class="biao">
    <p>More</p>
</div>
    <h1>花艺师与您一同分享素馨花卉给您的生活带去花香世界</h1>
</div>
    <div class="bao">
        <div class="da">
        <?php
        foreach ($datashoww as $k=>$v){
            ?>
            <div class="kk">
            <img src="<?php echo "$v[img]"?>" alt="">
            <p><?php echo "$v[title]"?></p>
            <h1><?php echo "$v[info]"?></h1>
                <div class="rr">
                    <i class="iconfont icon-shipin"></i>
                    <span>查看详情</span>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
<div class="zuo">
    <i class="iconfont icon-left"></i>
</div>
<div class="you">
    <i class="iconfont icon-webicon213"></i>
</div>
    </div>
</div>
<div class="dibu">
    <div class="content">
        <div class="hed999">
            <p>素馨花语
                <i class="iconfont icon-sanjiao4"></i>
                <div class="biao">
            <p>More</p>
            </p>
        </div>
    </div>
    <ul class="buju">
        <?php foreach ($datashoww1 as $k=>$v){

            ?>
            <div class="kua">
                    <img src="<?php echo $v['img']?>" alt="">
                    <li>
                        <ul><?php echo $v['title']?></ul>
                        <p><?php echo $v['info']?></p>
                        <span><?php echo $v['time']?></span>
                        <a><?php echo $v['author']?></a>
                        <b>
                            <i class="iconfont icon-yanjing"></i>
                            <?php echo $v['num']?></b>

                    </li>
            </div>
            <?php
        }?>

    </ul>
</div>
<div class="zhushi">
<div class="tou">
<p>素馨花卉工作室</p>
    <li>郑州素馨花卉有限公司由优秀的花艺、花卉设计师王亚楠于2017年成立。</li>
    <h1>经营范围：花卉、工艺品、饰品的销售；礼仪策划；花卉、苗木种植技术咨询。</h1>
     <h2>前期以鲜花、花束的包装及零售为主，逐渐过渡到花艺培训、家庭园艺等花香生活的指导，以及与花卉相关的文学创作。</h2>
     <h3>公司致力于将多彩花艺带入寻常人家，让对生活有着更高追求的人们享受温馨素雅的花香世界，力求将这种文化做到极致。</h3>
    <h4>公司地址：郑州市 中牟县 育才巷 县直一初中家属院 1单元201室</h4>
    <h5>联系电话：0371-62180519  15890062947</h5>
    <h6>电子邮箱：office@suxinhuahui.com</h6>
</div>
    <div class="tu" style="width: 530px;height: 340px;margin-top: 380px;margin-left: 409px;">
        <!--    <img src="../asset/home/img/staticimage.png" alt="">-->
        <iframe src="ditu.php" width="530" height="340" frameborder="0" scrolling="no"></iframe>
    </div>
    <div class="di">
<div class="biaozhi">
    <a><i class="iconfont icon-weixin1"></i></a>
    <b><i class="iconfont icon-qq"></i></b>
    <span><i class="iconfont icon-informatiom"></i></span>
    <h4>豫ICP备17021305号   豫公网安备 41012202000160号</h4>
    <h5>联系电话 0371-62180519  15890062947</h5>
    <h6>郑州素馨花卉有限公司 版权所有 © 2017-2021</h6>
</div>
    </div>
</div>
<div class="top">
    <i class="iconfont icon-xiangshang"></i>
</div>
</body>
</html>
<script src="../../asset/home/index.js"></script>
<script src="../../asset/home/animate.js"></script>
