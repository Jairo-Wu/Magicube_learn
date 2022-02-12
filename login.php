<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./img/root.png" type="image/x-icon">
    <title>后台管理登录</title>
</head>
<body>
    <div class="dowebok">
        <div class="logo"></div>
        <form action="" method="post">
            <div class="form-item">
                <input id="username" type="text"  name="admin" autocomplete="off" placeholder="账号">
            </div>
            <div class="form-item">
                <input id="password" type="password" name="password" autocomplete="off" placeholder="密码">
            </div>
            <div class="form-item"><input type="submit" class="button" name="" id="" value="登录"></div>
        </form>
    </div> 
</body>
</html>
<?php
    header("Content-type:text/html;charset=utf-8");  
    $link=mysqli_connect('localhost','root','password','magicube_study','3306');
        if(!$link){
            exit('数据库连接失败');
        }
        else{
            mysqli_query($link,'SET NAMES UTF8');
        }
        
        $admin=$_POST['admin'];//传参数
        $password=$_POST['password'];   
        if(!empty($_POST))
        {  
            if(empty($admin)) 
            {
                echo '<script>window.alert("请输入账号");</script>';
                return;
            }
            else if(empty($password))
            {
                echo '<script>window.alert("请输入密码")</script>';
                return;
            }
            $sql="select id FROM admin where account='$admin' and password='$password'";
            $res=mysqli_query($link,$sql);
            $arr = mysqli_fetch_array($res,MYSQLI_ASSOC);
            $id=$arr['id'];
            if($id=='1'){
                echo '<script>window.alert("登录成功");window.location.href="admin.php";</script>';
            }
            else{
                echo '<script>window.alert("账号不存在");history.back();</script>';

            }
        }
        setcookie('admin',$admin);  
        setcookie('password',$password);  

?>