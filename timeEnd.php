
<?php
    session_start();
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
    $sql = "SELECT * FROM item WHERE ItemID='$ItemNo'";
    $result = mysqli_query($db, $sql);
    $info = mysqli_fetch_array($result);
    $sqlPrice = "UPDATE item SET CurrentPrice=".$info['ExpectedPrice']." WHERE ItemID='$ItemNo'";
    mysqli_query($db, $sqlPrice);
    $userID=$_SESSION['userid'];
    $value = $info['ExpectedPrice'];
    $sql2="INSERT INTO bids (ItemID,BidderID,BidAmount)VALUES ('$ItemNo','$userID','$value') " ;
    mysqli_query($db, $sql2);
    header("Location:detail.php?ItemNo=$ItemNo");
?>
