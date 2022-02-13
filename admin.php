<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="shortcut icon" href="./img/manage.png" type="image/x-icon">
    <title>后台管理</title>
</head>
<?php
    if(empty($_COOKIE['admin']))
    {
        echo '<script>window.alert("请重新登录");window.location.href="login.php"</script>';
    }
?>
<body>
    <div class="head">
        <img src="./img/cube_icon.png" alt="" width="80px" height="80px">
        <p >你好，
            <?php
            echo $_COOKIE['admin'];
            ?>
        </p>
    </div>
    <div class="side">
        <ul>
            <li>                
                <p>公式管理</p>
                <div class="panel">
                    <?php
                    $link=mysqli_connect('localhost','root','password','magicube_study','3306');
                        if(!$link){
                            exit('数据库连接失败');
                        }
                        else{
                            mysqli_query($link,'SET NAMES UTF8');
                        }
                    $cfop=array('cross','f2l','oll','pll');
                    for($turn=1;$turn<=4;$turn++)
                    {
                        // 取消
                        if(!empty($_POST["cancel"]))
                        {
                            echo '<script>location.href="admin.php"</script>';
                        }
                        // 输出表头
                        echo "<div class=\"spanel\">";
                        echo "<h2>".$cfop[$turn-1]."</h2>
                        <form action=\"\" method=\"post\">
                        <input type=\"submit\" name=\"insert_".$cfop[$turn-1]."\" value=\"添加".$cfop[$turn-1]."\" >
                        </form>
                        <form action=\"admin.php\" method=\"post\">
                        <table border=\"1px\"  cellspacing=\"opx\" width=\"300px\">
                        <tr><th>情况</th><th>公式</th><th>操作</th></tr>";
                        // 添加
                        if(!empty($_POST["insert_".$cfop[$turn-1]]))
                        {
                            echo '<tr>';
                            echo "<td></td>
                                <td><input type=\"text\" name=\"addformula\" value=\"\"></td>
                                <td>
                                    <input type=\"submit\" class=\"conaddbt\" name=\"confirmadd_".$cfop[$turn-1]."\" value=\"确定添加\">
                                    <input type=\"submit\" class=\"canbt\" name=\"cancel\" value=\"取消\">
                                </td>";
                            echo '</tr>';
                        }
                        // 确定添加
                        if(!empty($_POST["confirmadd_".$cfop[$turn-1]]))
                        {
                            $add=$_POST["addformula"];
                            $sql="INSERT INTO t$turn (formula) VALUES ($add);";         
                            mysqli_query($link,$sql);
                        }
                        // 获取个数
                        $sql="select count(*) FROM t$turn";
                        $res=mysqli_query($link,$sql);
                        $arr = mysqli_fetch_array($res);
                        $count=$arr['count(*)'];
                        // 获取id
                        $sql="select id FROM t$turn";
                        $ida=mysqli_query($link,$sql);
                        for ($x=1; $x<=$count; $x++)
                        {
                            $id=mysqli_fetch_array($ida);
                            $sql="select * from t$turn where id=".$id[0];
                            $res=mysqli_query($link,$sql);                    
                            $arr = mysqli_fetch_array($res);
                            $formula=$arr['formula'];
                            // 输出表内容
                            echo "
                                <tr>
                                <td><img src=\"./upload/$turn/i ($x).png\" width=\"50px\" height=\"50px\"></td><td>$formula</td>
                                <td>                                    
                                    <input type=\"submit\" class=\"modbt\" name=\"mod_".$turn."_".$id[0]."\" value=\"修改\">
                                    <input type=\"submit\" class=\"delbt\" name=\"del_".$turn."_".$id[0]."\" value=\"删除\">
                                </td>                                
                                </tr>";
                            echo "</form>";
                            //删除   
                            if(!empty($_POST["del_".$turn."_".$id[0]]))
                            {                                
                                // header('location:#');
                                // echo "<script>
                                // console.log(\"$sql\")
                                // if(window.confirm('你确定要删除吗？')){
                                //     //alert(\"确定\");
                                //  }else{
                                //     //alert(\"取消\");
                                //     location.href=\"admin.php\";                                    
                                // }</script>";
                                $sql="delete from t$turn where id=".$id[0];                                
                                mysqli_query($link,$sql);
                                echo '<script>window.alert("已删除");location.href="admin.php"                                
                                    </script>';
                            }
                            // 修改
                            if(!empty($_POST["mod_".$turn."_".$id[0]]))
                            {
                                echo '<tr>';
                                echo "<td></td>
                                     <td><input type=\"text\" name=\"modformula\" value=\"$formula\"></td>
                                     <td>
                                        <input type=\"submit\" class=\"conmodbt\" name=\"confirmmod_".$turn."_".$id[0]."\" value=\"确定修改\">
                                        <input type=\"submit\" class=\"canbt\" name=\"cancel\" value=\"取消\">
                                     </td>";
                                echo '</tr>';
                            }
                            // 确定修改
                            if(!empty($_POST["confirmmod_".$turn."_".$id[0]]))
                            {
                                $mod=$_POST["modformula"];
                                $sql="update t$turn set formula=\"$mod\" where id=".$id[0];                              
                                mysqli_query($link,$sql);
                                echo '<script>window.alert("已修改");location.href="admin.php"
                                    </script>';
                            }                            
                        }                        
                        echo "</table>";
                        echo "</div>";
                    }
                    ?>                   
                </div>
            </li>
            <li>
                <p>账号管理</p>
                <div class="panel">
                </div>
            </li>
            
        </ul>
    </div>
    
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/admin.js"></script>
</body>

</html>