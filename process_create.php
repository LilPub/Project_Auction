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
    <div class="content d-flex">
    <i class="fas fa-plus-square fa-2x"></i>
        <h2>Tạo mới sản phẩm</h2>
    </div>
    <form method="POST" action="" class="form">
        <div class="info">
            <label for="">
                <span>Tên sản phẩm: </span>
                <input type="text" name="ItemName">
            </label><br/>
            <label for="">
                <span>Giá khởi điểm: </span>
                <input type="text" name="StartingPrice">
            </label><br/>
            <label for="">
                <span>Giá mua đứt: </span>
                <input type="text" name="ExpectedPrice">
            </label><br/>
            <label for="">
                <span>Giá đấu giá: </span>
                <input type="text" name="CurrentPrice">
            </label><br/>
            <label for="">
                <span>Ảnh sản phẩm: </span>
                <input type="text" name="PhotosID" placeholder="eg: img/phone6.jpg">
            </label><br/>
            <label for="">
                <span >Thông tin: </span>
                <textarea type="text" name="Description" cols="40" rows="6"></textarea>
            </label><br/>
            <label for="">
                <span>Thể loại: </span>
                <select name="CategoryID" id="">
                    <?php
                        $db = mysqli_connect('localhost','root','','shop');
                        if(!$db){
                            die('Kết nối thất bại');
                        }
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($db, $sql);
                        while($info = mysqli_fetch_array($result)){
                            echo '<option value="'.$info['CategoryID'].'">'.$info['Category'].'</option>';
                        }
                    ?>
                </select>
            </label><br/>
            <label for="">
                <span>Thời gian kết thúc: </span>
                <input type="datetime" name="EndTime" placeholder="eg: 2021-10-04 00:00:00">
            </label><br/>
            <input type="submit" value="Tạo mới" name="create-btn" class="update-btn">

            <?php
                if(isset($_POST['create-btn'])){
                    $ItemName = $_POST['ItemName'];
                    $StartingPrice = $_POST['StartingPrice'];
                    $ExpectedPrice = $_POST['ExpectedPrice'];
                    $CurrentPrice = $_POST['CurrentPrice'];
                    $PhotosID = $_POST['PhotosID'];
                    $Description = $_POST['Description'];
                    $CategoryID = $_POST['CategoryID'];
                    $EndTime = $_POST['EndTime'];

                    $sql2 = "INSERT INTO item ( ItemName, StartingPrice, ExpectedPrice, CurrentPrice, PhotosID, Description, CategoryID, EndTime) VALUES
                    ('$ItemName', '$StartingPrice', '$ExpectedPrice', '$CurrentPrice', '$PhotosID', '$Description', '$CategoryID', '$EndTime')";

                    if(mysqli_query($db, $sql2)){
                        echo "Thêm thành công";
                    }else{
                        echo "Thêm thất bại";
                    }

                    mysqli_close($db);

                    header("location:userItems.php?CategoryID='$CategoryID'");
                }

            ?>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>