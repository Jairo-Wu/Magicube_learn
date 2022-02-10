<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理登录</title>
</head>
<body>
    <h2>登录</h2>
    <form action="" method="post">
        <p>账号<input type="text" id="" name="admin" placeholder="enter admin"></p>
        <p>密码<input type="password" id="" name="password" placeholder="enter password"></p>

        <input type="submit" name="" id="" value="登录">
        <!-- 点击按钮整个表单提交 -->

    </form>
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
                echo "请输入账号";
                return;
            }
            else if(empty($password))
            {
                echo "请输入密码";
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