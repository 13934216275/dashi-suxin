
<?php
include "../../config/db.php";
include "../common/header.php";
include "../common/side.php";

?>
<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>

<script src="../../config/jquery-3.3.1.min.js"></script>
<div class="layui-body">
    <div style="padding: 15px">
        <table id="demo" lay-filter="test"></table>
    </div>
</div>
<script type="text/html" id="titleTp9">
    <img src="{{d.img}}" alt="">
</script>
<script type="text/html" id="titleTp5">
    <input type="number" name="sort" required  lay-verify="required"
           placeholder="请输入序号" autocomplete="off" class="layui-input"
           value="{{d.sort}}" onchange="sort(this,{{d.id}} ,value)">
</script>
<style>
    .layui-table-tr, .layui-table-cell{
        height: 100px;
        line-height: 100px;
    }
</style>
<script>
    layui.use('table', function(){
        var table = layui.table;
        //第一个实例
        table.render({
            elem: '#demo'
            // ,height: 355
            ,url: 'action.php?type=chazhao' //数据接口
            ,page: true //开启分页
            ,id: 'idTest'
            ,cols: [[ //表头
                {field: 'id', title: 'ID', width:150,height:300, sort: true} //fixed:'left'
                ,{field: 'name', title: '姓名',height:300, width:200}
                ,{field: 'img', title: '图片',height:300, width:350, sort: true,  templet:'#titleTp9'}
                ,{field: 'sort', title: 'sort', height:300,width:200,templet:'#titleTp5'}
                ,{title: '操作', width:200,height:300,templet:'#titleTp2'}
                   ]],toolbar: true,           //最上面右边的打印大牛和保存按钮
            limit:3,
            // toolbar: 'default'       //最上面的增加删除和右边的打印按钮
        });
        window.sort=function(obj,id,value) {
            $.get('action.php?type=sort',{id:id,value:value},function (res) {
                let $data=JSON.parse(res);
                if($data.code==200) {
                    // layer.msg(data.info,{icon:1});  全局刷新
                    // window.location.reload();
                    table.reload('idTest', {
                        url: 'action.php?type=chazhao',
                        page: {
                            curr: 1
                        }
                    })
                }
            })

            };

    })
</script>

<script type="text/html" id="titleTp2">
<a href="xiugai2.php?id={{d.id}}">
    <button class="layui-btn layui-btn-primary layui-btn-sm">
            <i class="layui-icon">&#xe642;</i>
        </button>
</a>
    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="sc(this,{{d.id}})">
        <i class="layui-icon">&#xe640;</i>
    </button>
</script>

<script>
    window.sc=function (obj1,id) {
        layer.confirm( '确定删除',{
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("action.php?type=del",{id:id},function(res) {
                let $data = JSON.parse(res);
                   // console.log($data);
                if($data.code==200){
                    layer.msg($data.info, {icon: 1});
                    $(obj1).parent().parent().parent().remove();
                }else {
                    layer.msg($data.info, {icon: 2});
                }
            })
        }, function(){
            layer.clear;
        });
    }
</script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<style>
    .layui-form-label{
        margin-left:-30px;
    }
</style>
<script>
    layui.use(['open','jquery'], function(){
        let open = layui.open;
        let $= layui.jquery;
    });
 //window.xiugai = function (obj,id) {
 //layer.open({
 //type: 1,
 //title: '修改信息',
 //area: ['400px', '300px'], //宽高
 //content: ' <div class="layui-form">\n' +
 //    '            <input type="hidden" name="id" value="<?php //echo $data['id']?>//">\n'+
 //   '            <input type="hidden" name="oldImg" value="<?php //echo $data['img']?>//">\n'+
 //   '            <div class="layui-form-item">\n'+
 //   '                <label class="layui-form-label">name</label>\n'+
 //   '                <div class="layui-input-block">\n'+
 //   '                    <input type="text" name="name"  value="<?php //echo $data['name']?>//" required  lay-verify="username" placeholder="请输入账号" autocomplete="off" class="layui-input" value="<?php //echo $data['name']?>//">\n'+
 //   '                </div>\n'+
 //   '            </div>\n'+
 //   '            <button type="button" class="layui-btn" id="test1" style="margin-left:130px;"><i class="layui             -icon">&#xe67c;</i>上传图片</button>\n'+
 //   '            <label class="layui-form-label">图片：</label>\n'+
 //   '            <blockquote class="layui-elem-quote layui-quote-nm" style="height: 300px;margin-left: 100px">\n'+
 //   '                <img src="<?php //echo $data['img']?>//" alt="" id="zxc" name="img" style="width: 200px;height: 200px">\n'+
 //   '            </blockquote>\n'+
 //   '            <input type="hidden" name="img" id="mnb" value="<?php //echo $data['img']?>//">\n'+
 //   '            <div class="layui-form-item">\n'+
 //   '                <label class="layui-form-label">sort</label>\n'+
 //   '                <div class="layui-input-block">\n'+
 //   '                    <input type="sort" name="sort" required value="<?php //echo                                     $data['sort']?>//" lay-verify="required|pass" placeholder="请再次输                              入密码" autocomplete="off" class="layui-input">\n'+
 //   '                </div>\n'+
 //   '            </div>\n'+
 //   '            <div class="layui-form-item">\n'+
 //   '                <div class="layui-input-block">\n'+
 //   '                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交                       </button>\n'+
 //   '                </div>\n'+
 //   '            </div>\n'+
 //   '        </div>'
 //         });
 //         }

    </script>
  <?php
 include "../common/footer.php";
 ?>
