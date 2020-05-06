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
    <form class="layui-form" action="action.php?type=add1" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">名字</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入名字" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <input type="text" name="info" required  lay-verify="required" placeholder="请输入简介" autocomplete="off" class="layui-input">
            </div>
        </div>
            <button type="button" class="layui-btn" id="test1" style="margin-left:130px;"><i class="layui-icon">&#xe67c;</i>上传图片</button>
            <label class="layui-form-label">预览图：</label>
            <blockquote class="layui-elem-quote layui-quote-nm" style="height: 100px;margin-left: 100px">
                <img src="" alt="" name="img" id="zxc" style="width: 200px;height: 200px">
            </blockquote>
            <input type="hidden" name="img" id="mnb">
        <div class="layui-form-item">
            <label class="layui-form-label">分类：</label>
            <div class="layui-input-inline">
                <select name="cid" lay-verify="required">
<!--                    <option value=""></option>-->
<!--                    <option value="0">北京</option>-->
<!--                    <option value="1">上海</option>-->
<!--                    <option value="2">广州</option>-->
<!--                    <option value="3">深圳</option>-->
<!--                    <option value="4">杭州</option>-->
                </select>
            </div>
            <label class="layui-form-label">作者：</label>
            <div class="layui-input-inline">
                <input type="text" name="author" required  lay-verify="required" placeholder="请输入作者" autocomplete="off" class="layui-input">
            </div>
            <label class="layui-form-label">浏览量：</label>
            <div class="layui-input-inline">
                <input type="number" name="num" required  lay-verify="required" placeholder="请输入浏览量" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea id="demo" name="content" style="display: none;"></textarea>
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


    <script>
        layui.use(['element','jquery','layer','form','layedit','upload'], function() {
            let element = layui.element;
            let $ = layui.jquery;
            let layer = layui.layer;
            let form = layui.form;
            let layedit = layui.layedit;
            let upload = layui.upload;
            layedit.build('demo'); //建立编辑器
                let uploadInst = upload.render({
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
            $.ajax({
                url:'action.php?type=query',
                mathod:'GET',
                success:function (res) {
                    let $data=JSON.parse(res);
                    let str='<option value=""></option>';
                    if ($data.code==200){
                        $data.data.forEach(function (ele,index) {
                            str+=`<option value="${ele.id}">${ele.name}></option>`
                        });
                        $('select').html(str);
                        form.render('select');
                    }else{
                        layer.msg='失败';
                    }
                }
            })
        })
    </script>






<?php
include "../common/footer.php";
?>