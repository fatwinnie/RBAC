<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){die('Could not connect:'.mysqli_error());
}
      
$name = $_POST['id'];
$pw = $_POST['pw'];

// 查詢資料庫
$result = mysqli_query($connect,"SELECT * FROM user where userName='$name'");
$row = mysqli_fetch_assoc($result);
//print_r($row);
if($name!=null && $pw!=null && $row['userName']==$name && $row['password']==$pw){
    session_start();
    $_SESSION['isLogined']= 1;
    $_SESSION['userName']= $row['userName'];
    $_SESSION['userID']= $row['user_id'];
    
   
    echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
    //$_SESSION['member']['list']=1;
    

    }
   
    
 
else{
    echo '登入失敗';
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}

?>