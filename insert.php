<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>增加记录</title>
</head>

<body>
    <h1>新增公式</h1>
    <form action="" method="post">
        <!-- <input type="text" name="formula">
        <!-- <input type="file" name="file" id="" > -->
        <!-- <input type="file" id="files"  >
        <input type="button" id="fileImport" value="导入">

        <input type="submit" value=""> --> -->
        <input type="text" id="textfield" /><br/>
<a class="a-upload">
  <input type="file" name="file" id="fileField" onchange="document.getElementById('textfield').value=document.getElementById('fileField').value">点击这里上传文件
</a>

<a class="file">选择文件
  <input type="file" name="file" id="fileField1" onchange="document.getElementById('textfield').value=document.getElementById('fileField1').value">
</a>
    </form>
    
</body>
<script src="./js/jquery-3.5.1.min.js"></script>


<script>
        
    </script>
    
    </html>
<?php
    $f=$_POST["file"];
    echo $f;
?>