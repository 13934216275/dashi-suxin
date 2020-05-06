<?php
include "../common/header.php";

?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<?php
include "../../config/db.php";
$id=$_GET['id'];
//var_dump($id);
$sql="select * from admin where id='$id'";
$result=$mysqli->query($sql);
$datal = $result->fetch_all(MYSQLI_ASSOC);
$data=$datal[0];
?>
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 35px;">
        <form class="layui-form" action="gaihou.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']?>">
            <div class="layui-form-item">
                <label class="layui-form-label">管理员账号</label>
                <div class="layui-input-block">
                    <input type="text" name="username"  value="<?php echo $data['username']?>" required  lay-verify="username" placeholder="请输入账号" autocomplete="off" class="layui-input" value="<?php echo $data['username']?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">管理员密码</label>
                <div class="layui-input-block">
                    <input type="password" name="password" required value="<?php echo $data['password']?>" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input" value="<?php echo $data['password']?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">管理员密码</label>
                <div class="layui-input-block">
                    <input type="password" name="repassword" required value="<?php echo $data['password']?>" lay-verify="required|pass" placeholder="请再次输入密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交<tton>
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
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
//            return false;
        });
        form.verify({
            username: function(value, item){ //alue：表单的值、item：表单的DOM对象
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
