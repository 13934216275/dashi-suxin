<?php
//include "../../config/db.php";
include "../common/header.php";
include "../common/side.php";
?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<div class="layui-body">
    <div style="padding: 15px">
        <table id="demo" lay-filter="test"></table>
    </div>
</div>
<script>
    layui.use('table', function(){
        var table = layui.table;
        //第一个实例
        table.render({
            elem: '#demo'
            // ,height: 355
            ,url: 'xuanran.php' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', width:100, sort: true}   //, fixed: 'left'
                ,{field: 'name', title: '用户名', width:200}
                // ,{field: 'status', title: '状态', width:330, sort: true,templet:'#titleTpl',}
                ,{field: 'time', title: '注册时间', width:200}
                ,{field: 'content', title: '内容', width:200}
                ,{field: 'phone', title: '电话', width:200}
                ,{title: '操作', width:200,templet:'#titleTp2'}
            ]],toolbar: true,           //最上面右边的打印大牛和保存按钮
            limit:2,
            // toolbar: 'default'       //最上面的增加删除和右边的打印按钮
        });

    });
</script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<?php
include "../common/footer.php";
?>
<script src="../../config/jquery-3.3.1.min.js"></script>