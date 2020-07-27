<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增访问權限</title>
</head>
<body>
    <div>
        <table>
            <form action="" method="post">
            <caption>權限資訊</caption>
            <tr>
                <td>權限名:</td>
                <td><input type="text" name="title" style="width:400px"></td>
            </tr>
            <tr>
                <td>URLs:</td>
                <td>
                    <textarea style="margin-top:20px;width:400px;height:200px" name="urls"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="addaccess" value="添加">
                    <input type="button" value="返回首页" onclick="location.href='./index.php'">
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>

<?php
 
    if( isset($_POST['addaccess']) ){
        $title = $_POST['title'];
        $urls = json_encode( explode(",",$_POST['urls']) );
        $pdo = new PDO('mysql:host=localhost:8889;dbname=test0706;charset=utf8','root','root');
        $stmt = $pdo->prepare("insert into access (access_title,url) values ( :title, :urls )");
        $stmt->execute(array(":title"=>$title,":urls"=>$urls));
    }
 ?>