<?php session_start();

if(!isset($_SESSION['isLogined']) or $_SESSION['isLogined']!=1){
    echo '登入失敗';
    
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}
    

//include('common.php');//共用表單
//$_SESSION['member']['list']=1;
//if(!isset($_SESSION['member']['list']) or $_SESSION['member']['list']!=1){
  //權限不足
  //導向至登入後的首頁
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
</head>
<body>
    <h2> Welcome, <?php echo $_SESSION['userName'];?> </h2>
    
</body>
</html>
