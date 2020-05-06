<?php
include "../../config/db.php";
include "../common/header.php";
include "../common/side.php";
?>
    <style>
        .layui-table-cell.laytable-cell-1-0-3{
            height: 100px;
            line-height: 100px;
            text-align: center;
        }
    </style>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<script src="../../config/jquery-3.3.1.min.js"></script>
<div class="layui-body">
    <div style="padding: 15px">
        <button class="layui-btn" onclick="zzz()">添加</button>
        <table id="demo" lay-filter="test"></table>
    </div>
</div>
<script type="text/html" id="titleTp2">
    <a href="xiugai.php?id={{d.id}}">
    <button class="layui-btn layui-btn-primary layui-btn-sm" >
        <i class="layui-icon">&#xe642;</i>
    </button></a>

    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="del(this,{{d.id}})">
        <i class="layui-icon">&#xe640;</i>
    </button>

</script>
<script type="text/html" id="titleTp3">
    <img src="{{d.img}}" alt="">
</script>
<script>
    layui.use(['element','jquery','layer','table'], function(){
        let element = layui.element;
        let $= layui.jquery;
        let layer = layui.layer;
        let table = layui.table;
        window.zzz=function(){
            layer.open({
                type: 1,
                title: '添加信息',
                area: ['420px', '240px'], //宽高
                content: ' <div class="layui-form-item">\n' +
                    '    <label class="layui-form-label">输入框</label>\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">\n' +
                    '    </div>\n' +
                    '  </div>'+
                    ' <div class="layui-form-item">\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <button class="layui-btn" onclick="xxx()">立即提交</button>\n' +
                    '      <button type="reset" class="layui-btn layui-btn-primary">重置</button>\n' +
                    '    </div>\n' +
                    '  </div>'
            });
        };
        layui.use('table', function() {
            table.render({
                elem: '#demo'
                ,id:'idTest'
                ,page: true //开启分页
                , url: 'action.php?type=datas' //数据接口
                , title: '用户表'
                , toolbar: 'default' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
                , cols: [[ //表头
                    {field: 'id', title: 'ID', width:"10%", sort: true}
                    ,{field: 'title', title: 'title', width:"10%"}
                    ,{field: 'info', title: 'info', width:"10%"}
                    ,{field: 'img', title: 'img', width:"10%",templet: '#titleTp3'}
                    ,{field: 'time', title: 'time', width:"10%"}
                    ,{field: 'author', title: 'author', width:"10%"}
                    ,{field: 'num', title: 'num', width:"10%"}
                    ,{field: 'content', title: 'content', width:"10%"}
                    ,{field: 'cid', title: 'cid', width:"10%"}
                    ,{title: '操作', width:"10%", templet: '#titleTp2'}
                ]]
                ,limit:2,
            });
        });
        window.xxx=function () {
            let name=$('input[name="name"]').val();
            $.ajax({
                url: 'action.php?type=add',
                type: "POST",
                data:{name:name},
                success:function (res) {
                    let data=JSON.parse(res);
                    if(data.code==200){
                        layer.msg(data.info,{icon:1});
                        table.reload('idTest', {
                            url: 'action.php?type=datas',
                            page: {
                                curr: 1
                            }
                        });
                        layer.closeAll();
                    }else{
                        layer.msg(data.info,{icon:2});
                        layer.closeAll();
                    }
                }
            })
        };
        window.del=function (obj,id) {
            layer.confirm('您确定要删除么？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                layer.msg('确定', {icon: 1});
                $.ajax({
                    url:"action.php?type=del",
                    method:"post",
                    data:{
                        id:id
                    },
                    success:function (res) {
                        let data=JSON.parse(res);
                        if(data.code==200){
                            layer.msg(data.info,{icon:1});
                            $(obj).parent().parent().parent().remove();
                        }else{
                            layer.msg(data.info,{icon:2});
                        }
                    }
                });
            }, function(){
                layer.close();
            });

        };
        window.xiugai=function (obj,id) {
            layer.open({
                type: 1,
                title: '修改信息',

                area: ['400px', '300px'], //宽高
                content:''
            });
        };

    })
</script>
<?php
include "../common/footer.php";
?>