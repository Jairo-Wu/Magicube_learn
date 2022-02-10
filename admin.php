<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">

    <title>后台管理</title>
</head>
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
                <div>
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
                        echo "<h2>".$cfop[$turn-1]."</h2>
                        <form action=\"insert.php\" method=\"post\">
                        <input type=\"submit\" name=\"insert\" value=\"添加".$cfop[$turn-1]."\" >
                        </form>
                        <table border=\"1px\"  cellspacing=\"opx\" >
                        <tr><th>情况</th><th>公式</th><th>操作</th></tr>";                                                 
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
                            echo "<tr>
                                <td><img src=\"./upload/$turn/i ($x).png\" width=\"50px\" height=\"50px\"></td><td>$formula</td>
                                <td><input type=\"submit\" name=\"del_".$turn."_".$id[0]."\" value=\"删除\"></td>
                                </tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                    <input type="submit" name="">
                   
                </div>
            </li>
            
        </ul>
    </div>

    
    <!-- <form action="" method="post">
        <p>账号<input type="text" id="" name="admin" placeholder="enter admin"></p>
        <p>密码<input type="password" id="" name="password" placeholder="enter password"></p>

        <input type="submit" name="" id="" value="登录">
        <!-- 点击按钮整个表单提交 -->

    </form> -->
</body>
</html>
<?php
    if(empty($_COOKIE))
    {
        echo '<script>window.alert("请重新登录");window.location.href="login.php"</script>';
    }
    print_r($_COOKIE) ;

?>