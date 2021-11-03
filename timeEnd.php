
<?php
    $db = mysqli_connect('localhost','root','','shop')
    or die('Kết nối thất bại.'); 
    $ItemNo = $_GET['ItemNo'];
    $time1 = time();
    $time = $time1+(7*60*60);
    $timeEnd = date("Y-m-d",$time);
    $sqlDL = "UPDATE item SET EndTime='$timeEnd' WHERE ItemID='$ItemNo'";
    if(mysqli_query($db, $sqlDL)){
        echo 'Thành công';
    }else{
        echo 'Thất bại';
    }
    header("Location:detail.php?ItemNo=$ItemNo");
?>
