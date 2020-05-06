<?php
$db_host="localhost";                                           //连接的服务器地址
$db_user="root";                                                  //连接数据库的用户名
$db_psw="";                                                  //连接数据库的密码
$db_name="suxin";                                           //连接的数据库名称
$mysqli=new mysqli($db_host,$db_user,$db_psw,$db_name);
// 检测连接
if ($mysqli->connect_error) {
    die("连接失败: " . $mysqli->connect_error);
}
$mysqli->query("set names utf8");
$sql="select * from admin";
$result=$mysqli->query($sql);
$data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data);
?>


<link rel="stylesheet" href="../../asset/admin/layui-v2.4.5/layui/css/layui.css">
<script src="../../asset/admin/layui-v2.4.5/layui/layui.js"></script>

<?php
include "../common/header.php";
include "../common/side.php";
?>

<table class="layui-table" style="width: 60%;margin-left: 280px;margin-top: 30px">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Status</th>
        <th>Time</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $k=>$v){
        echo "<tr>";
            echo "<td>$v[id]</td>
            <td>$v[username]</td>
            <td>$v[password]</td>
            <td>$v[status]</td>
            <td>$v[time]</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
include "../common/footer.php";
?>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<!--<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>-->

</body>
</html>
