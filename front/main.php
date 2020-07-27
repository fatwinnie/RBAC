<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
 . list { width:100px; height:35px; border:1px solid # 0CF; 
    margin:0px 2px 0px 2px; text -align:center; vertical-align:middle; line-height: 35px;}
</style>
</head>

<body>
<h1>主頁面</h1>
<?php
session_start();
$uid="";

if(empty($_SESSION["uid"]))//防止不经过登录直接打开主页面
{
    header("location:testlogin.php");
    exit;
}

$uid = $_SESSION["userName"];//用session存登录名

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error());
}

$sql = mysqli_query($connect,"SELECT * FROM user_role where role_id in (SELECT access_id FROM role_access in (SELECT role_id FROM user_role where user_id='{ $uid }'))");
$row = mysqli_fetch_assoc($sql);
foreach ( $row  as  $v ){
    echo "<div code='{$v [0]}' class='list'>{ $v [1]}</div>" ;
}
?>


</body>
</html>