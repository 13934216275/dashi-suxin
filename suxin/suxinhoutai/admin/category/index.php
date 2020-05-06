<?php
include "../../config/db.php";
include "../common/header.php";
include "../common/side.php";
?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>
<script src="../../config/jquery-3.3.1.min.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
<div class="layui-body">
    <div style="padding: 15px">
        <button class="layui-btn" onclick="add()">添加</button>
        <table id="demo" lay-filter="test"></table>
    </div>
</div>
<script type="text/html" id="titleTp2">
    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="compile(this,{{d.id}})">
        <i class="layui-icon">&#xe642;</i>
    </button>

    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="del(this,{{d.id}})">
        <i class="layui-icon">&#xe640;</i>
    </button>
</script>
<script>
    layui.use(['table','jquery'], function(){
        var table = layui.table;
        let $=layui.jquery;

        // 第一个实例
        table.render({
            elem: '#demo'
            // ,height: 312
            ,url: 'action.php?type=datas' //数据接口
            ,id:'tableone'
            // ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', sort: true}
                ,{field: 'name', title: '用户名'}
                ,{field: 'pid', title: '父名', sort: true}
                ,{title:'操作',sort:true,templet:'#titleTp2'}
            ]]
            ,toolbar: true,
            limit:50,
        });
        window.add=function () {
            layer.open({
                type: 1,
                skin: 'layui-layer-molv', //加上边框
                area: ['420px', '240px'], //宽高
                title:'添加分类',
                content: '<div class="layui-form"> ' +
                    '<div class="layui-form-item">\n' +
                    '    <label class="layui-form-label">分类名称:</label>\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <input type="text" name="name" required  lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">\n' +
                    '    </div>\n' +
                    '</div>' +
                    '<div class="layui-form-item">\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <button class="layui-btn" onclick="submits()">立即提交</button>\n' +
                    '      <button type="reset" class="layui-btn layui-btn-primary">重置</button>\n' +
                    '    </div>\n' +
                    '</div>' +
                    '</div>'
            });
        }
        window.submits=function () {
            let name1=$('input[name="name"]').val();
            $.ajax({
                type:'post',
                url:'action.php?type=insert',
                data:{
                    name:name1,
                },
                success:function (res) {
                    let data=JSON.parse(res);
                    if(data.code==200){
                        layer.msg(data.info,{icon:1,time:500});
                        layer.closeAll('page');
                        table.reload('tableone',{
                            url:'action.php?type=datas'
                            ,page:{
                                curr:1
                            }
                        })
                    }else{
                        layer.msg(data.info,{icon:2})
                    }

                }

            })
        }
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
                        let datas=JSON.parse(res);
                        if(datas.code==200){
                            layer.msg(datas.info,{icon:1});
                            $(obj).parent().parent().parent().remove();
                        }else{
                            layer.msg(datas.info,{icon:2});
                        }
                    }
                });
            }, function(){
                layer.close();
            });

        }
        window.compile=function (obj,id) {
            $.post("action.php?type=compile1",{id:id},function (abc) {
                let datas=JSON.parse(abc);
                $('input[name="name"]').val(datas.name);
                $('input[name="id"]').val(datas.id);
            })
            layer.open({
                type: 1,
                skin: 'layui-layer-molv', //加上边框
                area: ['420px', '240px'], //宽高
                title:'修改分类',
                content: '<div class="layui-form">' +
                    '<input type="hidden" name="id"> ' +
                    '<div class="layui-form-item">\n' +
                    '    <label class="layui-form-label">分类名称:</label>\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <input type="text" name="name" required  lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input">\n' +
                    '    </div>\n' +
                    '</div>' +
                    '<div class="layui-form-item">\n' +
                    '    <div class="layui-input-block">\n' +
                    '      <button class="layui-btn" onclick="submitss()">立即提交</button>\n' +
                    '      <button type="reset" class="layui-btn layui-btn-primary">重置</button>\n' +
                    '    </div>\n' +
                    '</div>' +
                    '</div>'
            });
        }
        window.submitss=function () {
            let name=$('input[name="name"]').val();
            let id=$('input[name="id"]').val();
            $.ajax({
                url:"action.php?type=compile2",
                type:"post",
                data:{
                    name:name,
                    id:id
                },
                success:function (res) {
                    let data=JSON.parse(res);
                    // console.log(data);
                    if(data.code==200){
                        layer.msg(data.info,{icon:1});
                        table.reload('tableone',{
                            url:'action.php?type=datas'
                            ,page:{
                                curr:1
                            }
                        })
                        layer.closeAll('page');
                    }else{
                        layer.msg(data.info,{icon:2});
                    }
                }
            })
        }
    });
</script>
<?php
include "../common/footer.php";
?>
