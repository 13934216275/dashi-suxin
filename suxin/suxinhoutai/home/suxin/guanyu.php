<?php
include "../../config/db.php";
$sqlnav="select * from nav order by sort";
$resnav=$mysqli->query($sqlnav);
$datanav=$resnav->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关于</title>
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1121332_bw0emvlc969.css">
    <link rel="stylesheet" href="../../asset/home/guanyu.css">
</head>
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
</style>
<body>
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
<div class="tuu">
    <img src="../../asset/home/img/8520.jpg" alt="">
</div>
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
        <h4>豫ICP备17021305号</h4>
        <del>豫公网安备 41012202000160号</del>
        <h5>联系电话 0371-62180519  15890062947</h5>
        <h6>郑州素馨花卉有限公司 版权所有 © 2017-2021</h6>
        <img src="../../asset/home/img/gonganbeian.png" alt="">
    </div>

</div>
</body>
</html>