
<?php
include "common/header.php";
include "common/side.php";
?>
<link rel="stylesheet" href="../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../asset/admin/layui-v2.4.5/layui/layui.js"></script>
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
            ,url: 'guanli/rere2.php' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', width:200, sort: true}   //, fixed: 'left'
                ,{field: 'username', title: '用户名', width:200}
                ,{field: 'status', title: '状态', width:330, sort: true,templet:'#titleTpl',}
                ,{field: 'time', title: '注册时间', width:200}
                ,{title: '操作', width:200,templet:'#titleTp2'}
            ]],toolbar: true,           //最上面右边的打印大牛和保存按钮
            limit:2,
            // toolbar: 'default'       //最上面的增加删除和右边的打印按钮
        });

    });
</script>

<script type="text/html" id="titleTpl">
    {{#  if(d.status ==0){ }}
    <!--    <a href="/detail/{{d.id}}" class="layui-table-link">-->
    <button class="layui-btn layui-btn-normal" onclick="status(this,{{d.id}},1)">白名单</button>
    <!--</a>-->
    {{#  } else { }}
    <button class="layui-btn layui-btn-danger" onclick="status(this,{{d.id}},0)">黑名单</button>
    {{#  } }}
</script>

<script type="text/html" id="titleTp2">
    <a href="guanli/xiugai.php?id={{d.id}}"><button class="layui-btn layui-btn-primary layui-btn-sm">
            <i class="layui-icon">&#xe642;</i>
        </button></a>
    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="sc(this,{{d.id}})">
        <i class="layui-icon">&#xe640;</i>
    </button>
</script>
<script>
    //黑白名单
    function status(obj,id,status) {
        // console.log(id, status);
        $.post("guanli/tt3.php",{id:id,status:status},function (res) {
            // console.log(res);
            if(res==0){
                layer.confirm('修改成功',{
                    btn:['确定','取消']
                },function() {
                    layer.msg('已修改',{icon:1});
                    $(obj).parent().html(`<button class="layui-btn layui-btn-normal " onclick="status(this,${id},1)">白名单</button>`);
                },function(){
                    layer.msg('已经修改',{
                        time:500,
                    });
                });
            }else {
                layer.confirm('修改成功',{
                    btn:['确定','取消']
                },function() {
                    layer.msg('已修改',{icon:1});
                    $(obj).parent().html(`<button class="layui-btn layui-btn-danger" onclick="status(this,${id},0)">黑名单</button>`);
                },function(){
                    layer.msg('已经修改',{
                        time:500,
                    });
                });

            }
        })
    }
    //删除
    function sc(obj,id,) {
        $.get("guanli/del2.php",{id:id},function (res1){
            console.log(res1);
            $(obj).parent().parent().parent().remove();
        });
    }
</script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<?php
include "common/footer.php";
?>
<script src="../config/jquery-3.3.1.min.js"></script>