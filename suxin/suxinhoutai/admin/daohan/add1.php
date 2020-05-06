<?php
include "../common/header.php";
include "../common/side.php";
?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<style>
    .layui-form-label{
        width: 95px;
        float: left;
        padding-right: 0;
    }

</style>
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <form class="layui-form" action="huode1.php" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">name：</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required  lay-verify="name" placeholder="请输入新的名字" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">url：</label>
                <div class="layui-input-block">
                    <input type="url" name="url" required lay-verify="url" placeholder="请输入新的url" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">sort：</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" required lay-verify="sort" placeholder="请输入新的sort" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '用户名首尾不能出现下划线\'_\'';
                }
                if(/^\d+\d+\d$/.test(value)){
                    return '用户名不能全为数字';
                }
            }
            ,pass: [
                /^[\S]{6,12}$/
                ,'密码必须6到12位，且不能出现空格'
            ]
        });

    });




</script>
