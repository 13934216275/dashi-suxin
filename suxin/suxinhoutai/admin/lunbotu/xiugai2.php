<?php
include "../common/header.php";

?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<?php
include "../../config/db.php";
$id=$_GET['id'];
$sql="select * from banner where id='$id'";
$result=$mysqli->query($sql);
$datal = $result->fetch_all(MYSQLI_ASSOC);
//var_dump($datal);

$data=$datal[0];
?>
<script type="text/html" id="titleTp9">
    <img src="{{d.img}}" alt="">
</script>




<div class="layui-body" id="nb">
    <!-- 内容主体区域 -->
    <div style="padding: 35px;">
        <form class="layui-form" action="action.php?type=gaihou" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>">
            <input type="hidden" name="oldImg" value="<?php echo $data['img']?>">
            <div class="layui-form-item">
                <label class="layui-form-label">name</label>
                <div class="layui-input-block">
                    <input type="text" name="name"  value="<?php echo $data['name']?>" required  lay-verify="username" placeholder="请输入账号" autocomplete="off" class="layui-input" value="<?php echo $data['name']?>">
                </div>
            </div>
            <button type="button" class="layui-btn" id="test1" style="margin-left:130px;"><i class="layui             -icon">&#xe67c;</i>上传图片</button>
            <label class="layui-form-label">图片：</label>
            <blockquote class="layui-elem-quote layui-quote-nm" style="height: 300px;margin-left: 100px">
                <img src="<?php echo $data['img']?>" alt="" id="zxc" name="img" style="width: 200px;height: 200px">
            </blockquote>
            <input type="hidden" name="img" id="mnb">
            <div class="layui-form-item">
                <label class="layui-form-label">sort</label>
                <div class="layui-input-block">
                    <input type="sort" name="sort" required value="<?php echo                                     $data['sort']?>" lay-verify="required|pass" placeholder="请再次输                              入密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交                       </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "../common/side.php";
?>
<?php
include "../common/footer.php";
?>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });

</script>
<script>
    layui.use(['upload','jquery'], function(){
        var upload = layui.upload;
        var $= layui.jquery;
        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            , url: 'action.php?type=shangchuan' //上传接口
            , accept: 'images' //允许上传的文件类型
            , size:500//最大允许上传的文件大小
            , acceptMime: 'image/*'
            , exts: 'jpg|png|gif|bmp|jpeg'
            , field: 'file'
            , done: function (res, index, upload) { //上传后的回调
                $('#zxc').attr("src",`${res.data.src}`);
                $('#mnb').val(`${res.data.src}`);
            }
        });
    });
</script>
