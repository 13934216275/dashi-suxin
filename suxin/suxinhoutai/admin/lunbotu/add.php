<?php
include "../../config/db.php";
include "../common/header.php";
include "../common/side.php";
?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>

<div class="layui-body">    <!-- 内容主体区域 -->
<div style="padding: 15px;">
    <form class="layui-form" action="action.php?type=tianjia" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="name" required  lay-verify="name" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <button type="button" class="layui-btn" id="test1" style="margin-left:130px;"><i class="layui-icon">&#xe67c;</i>上传图片</button>
        <label class="layui-form-label">预览图：</label>
        <blockquote class="layui-elem-quote layui-quote-nm" style="height: 300px;margin-left: 100px">
            <img src="" alt="" id="zxc" style="width: 200px;height: 200px">
        </blockquote>
        <input type="hidden" name="img" id="mnb">
        <div class="layui-form-item">
            <label class="layui-form-label">排序：</label>
            <div class="layui-input-block">
                <input type="text" name="sort" required  lay-verify="sort" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
include "../common/footer.php";
?>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    layui.use('form', function(){
        var form = layui.form;
        form.verify({
            标题: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '标题不能有特殊字符';
                }
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '标题首尾不能出现下划线\'_\'';
                }
                if(/^\d+\d+\d$/.test(value)){
                    return '标题不能全为数字';
                }
            }
            ,pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
        });

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