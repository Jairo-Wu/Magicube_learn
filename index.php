<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="CFOP,魔方,速拧">
    <meta name="description" content="魔方速拧学习网站、CFOP">    
    <title>Magicube_Study</title>

    <link rel="shortcut icon" href="./img/cube_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body class="back">
    <?php
    header("Content-type:text/html;charset=utf-8");  
    $link=mysqli_connect('localhost','root','password','magicube_study','3306');
        if(!$link){
            exit('失败');
        }
        else{
            mysqli_query($link,'SET NAMES UTF8');
        }
    ?>
    <!-- 头部 -->
    <div class="head"> 
        <div class="head_icon">
            <div>
                <img src="./img/cube_icon.png" alt="" width="80px" height="80px">
            </div>
            <div>
                <h4 >Magicube</h4>
                <h4 >Study</h4>
            </div>
        </div>
        <div>
           <ul>               
                <li ><a href="#">CROSS</a></li>
                <li ><a href="#">F2L</a></li>
                <li ><a href="#">OLL</a></li>
                <li ><a href="#">PLL</a></li>
            </ul>  
        </div>
    </div>
    <!-- main -->
    
        <div class="border"></div>
        <div class="side">
        <?php
            for($turn=1;$turn<=4;$turn++)
            {
                echo "<div class=\"sidein\">";
                echo "<ul class=\"ul$turn\">";
                $sql="select count(*) FROM t$turn";
                $res=mysqli_query($link,$sql);
                $arr = mysqli_fetch_array($res);
                $count=$arr['count(*)'];
                for ($x=1; $x<=$count; $x++) 
                {
                    $sql="select formula from t$turn where id=$x";
                    $res=mysqli_query($link,$sql);
                    $arr = mysqli_fetch_array($res);
                    $formula=$arr['formula'];
                     echo "<li>
                            <img src=\"./upload/$turn/i ($x).png\" class=\"situation\">
                            <a ></a>
                            <div>";
                            echo "<p>";

                                for($i=0;$arr['formula'][$i];$i++)
                                {                                    
                                    $ch=$arr['formula'][$i];
                                    $ch1=$arr['formula'][$i+1];
                                    $ch2=$arr['formula'][$i+2];
                                    if((('a'<= $ch) &&('z'>= $ch))||(('A'<=$ch)&&('Z'>=$ch)))
                                    {
                                        if(strcmp($ch1,"2")==0)
                                        {
                                            if(strcmp($ch2,"'")==0)
                                            {
                                                echo "<img src=\"./upload/formula/$ch"."_$ch1.png\" class=\"formula\">";
                                                $i+=2;
                                            }
                                            else
                                            {
                                                echo "<img src=\"./upload/formula/$ch"."2.png\" class=\"formula\">";
                                                $i++;
                                            }
                                        }
                                        else if(strcmp($ch1,"'")==0)
                                        {
                                            echo "<img src=\"./upload/formula/$ch"."_.png\" class=\"formula\">";
                                            $i++;
                                        }
                                        else
                                            echo "<img src=\"./upload/formula/$ch.png\" class=\"formula\">";                                                                                
                                    }
                                    else if($ch=='('||$ch==')'||$ch==' ')
                                    {
                                        echo "$ch";
                                    }
                                    else 
                                    {
                                        echo "$ch$ch1$ch2";
                                        $i+=2;                                        
                                    }                                                
                                }
                                echo "</p>";
                                
                    echo " </div>
                            </li>";
                }
                echo "</ul>";
                echo "</div>";
            }            
            mysqli_close($link);
        ?>
        </div>     
    <!-- 魔方 -->
    <div class="cube">
        <div class="cube_close" ></div>
        <iframe src="./cube/index.html" frameborder="0" class="cube_html"  scrolling="no"> </iframe>
        <img src="./img/fresh.svg" alt="刷新" class="fresh" title="刷新">
    </div>
    <!-- 说明书 -->
    <div class="intr">
        <div class="intr_close" ></div>
        <ul>
            <li><img src="./upload/intr/notation1.gif" alt="" ></li>
            <li><img src="./upload/intr/notation2.gif" alt="" ></li>
            <li><img src="./upload/intr/notation3.gif" alt="" ></li>
            <li><img src="./upload/intr/notation4.gif" alt="" ></li>
        </ul>
    </div>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/style.js"></script>
</body>
</html>