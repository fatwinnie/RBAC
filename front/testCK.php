<?php
session_start();

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error());
}

$uid= $_POST['uid'];
$pwd= $_POST['pwd'];
echo $uid.'<br>'.$pwd.'<br>';


// 查詢資料庫
$sql = mysqli_query($connect,"SELECT * FROM user where userName='$uid'");
$row = mysqli_fetch_assoc($sql);

if($row['pwd']==$pwd && $pwd!=null){

    $_SESSION["userName"] = $uid;
    header("location:main.php");
}
else
{
    echo "登录失败";
}


?>