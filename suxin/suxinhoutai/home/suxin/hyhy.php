<?php
include "../../config/db.php";
$sqlnav="select * from nav order by sort";
$resnav=$mysqli->query($sqlnav);
$datanav=$resnav->fetch_all(MYSQLI_ASSOC);
$sqlshoww2="select * from showw where cid=19";
$resshoww2=$mysqli->query($sqlshoww2);
$datashoww2=$resshoww2->fetch_all(MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>花言花语</title>
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1121332_bw0emvlc969.css">
    <link rel="stylesheet" href="../../asset/home/hyhy.css">
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
    .kua h4{
        position: absolute;
        top: 140px;
        left: 260px;
        color: #76838f;
    }
</style>
<body>
<div class="beijing">
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
<div class="hed">
<span>花言花语</span>
</div>
<div class="buju" style="height: 1650px">
    <?php
    foreach ($datashoww2 as $k=>$v){
        ?>
    <div class="kua">
        <img src="<?php echo "$v[img]"?>" alt="">
        <li>
            <a href="xianqing.php?id=<?php echo $v['id']?>"><?php echo "$v[title]"?></a>
            <p><?php echo "$v[info]"?></p>
            <span><?php echo "$v[time]"?></span>
            <h4><?php echo "$v[author]"?></h4>
            <b><i class="iconfont icon-yanjing"></i>
                <?php echo "$v[num]"?></b>
        </li>
    </div>
    <?php
    }
    ?>
    <div class="niu">
        <div class="shan">
<span>上一页</span>
        </div>
        <div class="shan1">
            <span>1</span>
        </div>
        <div class="shan2">
            <span>2</span>
        </div>
        <div class="shan3">
            <span>3</span>
        </div>
        <div class="shan4">
            <span>下一页</span>
        </div>
    </div>
</div>
    <div class="sou">
        <div class="search-input">
            <input type="text" class="input-box" placeholder="Search">
                <i class="iconfont icon-xiazai17"></i>
            <div class="cm">
                <span>为您推荐</span>
            </div>
            <div class="mzg">
             <span>适合家庭的摆台花</span>
            </div>
            <div class="mzg1">
                <span>夏日里的一抹清凉</span>
            </div>
            <div class="mzg2">
                <span>亲临进口花材</span>
            </div>
            <div class="zz">
                <span>所有文章</span>
            </div>
        </div>
    </div>
    <div class="tiao"></div>
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