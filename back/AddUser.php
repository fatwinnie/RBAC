<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>增加使用者</title>
</head>
<body>
    <div>
        <table>
            <form action="" method="post">
            <caption>使用者訊息</caption>
            <tr>
                <td>使用者名稱:</td>
                <td><input type="text" name="UserName" style="width:400px"></td>
            </tr>
            <tr>
                <td>使用者email:</td>
                <td><input type="text" name="user_email" style="width:400px"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="adduser" value="添加">
                    <input type="button" value="返回首页" onclick="location.href='./index.php'">
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>

<?php
    if(isset($_POST['adduser'])){
        $user_name = $_POST['UserName'];
        $user_email = $_POST['user_email'];

        $pdo = new PDO('mysql:host=localhost:8889;dbname=test0706;charset=utf8','root','root');
        $stmt = $pdo->prepare("insert into user (userName,userEmail) values ( :UserName, :user_email )");
        $stmt->execute(array(":UserName"=>$user_name ,":user_email"=>$user_email));

        
    }

?>