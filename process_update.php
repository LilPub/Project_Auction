<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/update.css">
</head>
<body>
    <?php 
        $ItemID=$_GET["ItemID"];
        $db = mysqli_connect('localhost','root','','shop');
        if(!$db){
            die('Kết nối thất bại');
        }
        $sql = "SELECT * FROM item where ItemID='$ItemID'";
        $result = mysqli_query($db,$sql);
        $info = mysqli_fetch_array($result);

    ?>
    <div class="content d-flex">
        <i class="fas fa-edit fa-2x"></i>
        <h2>Chỉnh sửa thông tin</h2>
    </div>
    <form method="POST" action="" class="form">
        <div class="info">
            <label for="">
                <span>Tên sản phẩm: </span>
                <input type="text" value="<?php echo $info['ItemName']; ?>" name="ItemName">
            </label><br/>
            <label for="">
                <span>Giá khởi điểm: </span>
                <input type="text" value="<?php echo $info['StartingPrice']; ?>" name="StartingPrice">
            </label><br/>
            <label for="">
                <span>Giá mua đứt: </span>
                <input type="text" value="<?php echo $info['ExpectedPrice']; ?>" name="ExpectedPrice">
            </label><br/>
            <label for="">
                <span>Giá đấu giá: </span>
                <input type="text" value="<?php echo $info['CurrentPrice']; ?>" name="CurrentPrice">
            </label><br/>
            <label for="">
                <span >Thông tin: </span>
                <textarea type="text" name="Description" cols="40" rows="6"><?php echo $info['Description']; ?></textarea>
            </label><br/>
            <label for="">
                <span>Thời gian kết thúc: </span>
                <input type="datetime" value="<?php echo $info['EndTime']; ?>" name="EndTime">
            </label><br/>
            <input type="submit" value="Thay đổi" name="update-btn" class="update-btn">

            <?php
                if(isset($_POST['update-btn'])){
                    $ItemID = $_GET['ItemID'];
                    $ItemName = $_POST['ItemName'];
                    $StartingPrice = $_POST['StartingPrice'];
                    $ExpectedPrice = $_POST['ExpectedPrice'];
                    $CurrentPrice = $_POST['CurrentPrice'];
                    $Description = $_POST['Description'];
                    $EndTime = $_POST['EndTime'];
                    
                    $db = mysqli_connect('localhost','root','','shop');
                    if(!$db){
                        die('Kết nối thất bại');
                    }
                    $sql2 = "UPDATE `item` SET ItemName='$ItemName',StartingPrice = '$StartingPrice', ExpectedPrice='$ExpectedPrice', CurrentPrice='$CurrentPrice', Description='$Description', EndTime='$EndTime' WHERE ItemID='$ItemID'";
                    if(mysqli_query($db,$sql2)){
                        echo "Thay đổi thành công";
                    }else{
                        echo "Thay đổi thất bại";
                    }
                    mysqli_close($db);

                    header('location:userItems.php?CategoryID='.$info['CategoryID']);
                }

            ?>
        </div>
    </form>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
