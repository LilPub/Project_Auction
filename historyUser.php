<?php 
session_start(); 

if(!isset($_SESSION['userid'])){
    header('Location: index.php');
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Đấu giá TLU
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

<?php include 'header.php';?>

    

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li>Kho người dùng</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                   <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Thể loại</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                    
                                <li class="tab-li">
                                    <a href="#">Lịch sử tham gia đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử mua sản phẩm </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử tạo đấu giá </a>
                                </li>
                            

                            </ul>

                        </div>
                    </div>


                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-info active">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query2 = "SELECT * FROM item,bids,user where item.ItemID=bids.ItemID and user.UserID=bids.BidderID";
                            $result2 = mysqli_query($db, $query2);
                            $userBids = mysqli_fetch_array($result2);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tham gia đấu giá</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Tiền đấu giá</th>
                                    <th scope="col">Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userBids){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userBids['FName']; ?> </td>
                                    <td><?php echo $userBids['LName']; ?> </td>
                                    <td><?php echo $userBids['ItemName']; ?> </td>
                                    <td><?php echo $userBids['BidAmount']; ?> </td>
                                    <td><?php echo $userBids['Contact_No']; ?> </td>
                                </tr>
                                <?php
                                    $userBids = mysqli_fetch_array($result2);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query3 = "SELECT * FROM item,user,solditems where item.ItemID=solditems.ItemID and user.UserID=solditems.BuyerID";
                            $result3 = mysqli_query($db, $query3);
                            $userBuy = mysqli_fetch_array($result3);
                        ?>
                        <div class="box">
                            <h1>Lịch sử mua sản phẩm</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Tiền mua sản phẩm</th>
                                    <th scope="col">Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userBuy){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userBuy['FName']; ?> </td>
                                    <td><?php echo $userBuy['LName']; ?> </td>
                                    <td><?php echo $userBuy['ItemName']; ?> </td>
                                    <td><?php echo $userBuy['FinalValue']; ?> </td>
                                    <td><?php echo $userBuy['Contact_No']; ?> </td>
                                </tr>
                                <?php
                                    $userBuy = mysqli_fetch_array($result3);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>


                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query4 = "SELECT * FROM item,user where item.SellerID=user.UserID";
                            $result4 = mysqli_query($db, $query4);
                            $userCreate = mysqli_fetch_array($result4);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tạo đấu giá</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá khởi điểm</th>
                                    <th scope="col">Giá Đấu giá</th>
                                    <th scope="col">Giá Mua đứt</th>
                                    <th scope="col">Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userCreate){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userCreate['FName']; ?> </td>
                                    <td><?php echo $userCreate['LName']; ?> </td>
                                    <td><?php echo $userCreate['ItemName']; ?> </td>
                                    <td><?php echo $userCreate['StartingPrice']; ?> </td>
                                    <td><?php echo $userCreate['CurrentPrice']; ?> </td>
                                    <td><?php echo $userCreate['ExpectedPrice']; ?> </td>
                                    <td><?php echo $userCreate['Contact_No']; ?> </td>
                                </tr>
                                <?php
                                    $userCreate = mysqli_fetch_array($result4);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>

                </div>
                <!-- /.col-md-9 -->
                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php include 'footer.php';?>
    

    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/userbuy.js"></script>





</body>

</html>