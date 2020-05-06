<?php
include "../../config/db.php";
$sqlnav="select * from nav order by sort";
$resnav=$mysqli->query($sqlnav);
$datanav=$resnav->fetch_all(MYSQLI_ASSOC);
$sqlmessage="select * from message";
$sqlmessage=$mysqli->query($sqlmessage);
$datamessage=$sqlmessage->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言</title>
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1121332_jd2kr6q08o.css">
    <link rel="stylesheet" href="../../asset/home/lyjy.css">
    <link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
    <script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>

</head>
<style>
    .layui-form-label{
        width: 95px;
        float: left;
        padding-right: 0;
    }
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
    .xian{
        width: 100%;
        height: 1px;
        background:#e0e0e0;
        margin-top: 20px;
    }
    .search-input input{
        margin-bottom: 30px;
    }
    .kua p{
        margin-left:50px;
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
        <span>留言建议</span>
    </div>
    <div class="buju">
        <?php
        foreach ($datamessage as $k=>$v){
           ?>
            <div class="kua">
                <i class="iconfont icon-yonghuzhongxin_f"></i>
                <b><?php echo "$v[name]"?></b>
                <span><?php echo "$v[time]"?></span>
                <p><?php echo "$v[phone]"?></p>
                <div class="kong">
                    <ul><?php echo "$v[content]"?></ul>
                </div>
                <div class="xian"></div>
            </div>
        <?php
        }
        ?>
        <div class="jia">
<i class="iconfont icon-down"></i>
            <span>加载更多</span>
        </div>
    </div>
    <div class="sou">
        <div class="search-input">
            <form class="layui-form" action="lyjytianjia.php?" method="post">
            <input type="text" class="layui-input" name="name" placeholder="姓名">
            <input type="text" class="layui-input" name="phone" placeholder="联系电话">
            <input type="text" class="layui-input" placeholder="电子邮箱">
            <input type="text" class="layui-input" name="content" placeholder="您的建议">
            <input type="text" class="layui-input" placeholder="验证码">
            <img src="../../asset/home/img/ajax.png" alt="">
        </div>
        <div class="tijiao" style="background: #ffffff"><button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button></div>
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
<script src="../../asset/home/lyjy.js"></script>
<script>
    layui.use('from', function(){
        var from = layui.from;

    });
</script>