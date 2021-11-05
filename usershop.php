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
                                    <a href="#">Lịch sử khởi tạo đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử mua hàng </a>
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
                            $query2 = "SELECT * FROM item where SellerID='$userID'";
                            $result2 = mysqli_query($db, $query2);
                            $userResults = mysqli_fetch_array($result2);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tạo đấu giá</h1>
                            
                        </div>

                        <?php
                            while($userResults) { 
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>">
                                                    <img src="<?php echo $userResults['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>">
                                                    <img src="<?php echo $userResults['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>"><?php echo $userResults['ItemName'] ?></a></h3>
                                        <p align="center">Giá khởi điểm</p>
                                        <p class="price">Giá : <?php echo number_format($userResults['StartingPrice']);?></p>
                                        <p align="center">Giá thầu tối đa hiện tại</p>
                                        <p class="price">Giá : <?php echo number_format($userResults['CurrentPrice']);?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>" class="btn btn-default">Chi tiết</a>
                                            
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php $userResults = $result2->fetch_assoc();} ?>
                    </div>

                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query3 = "SELECT distinct * FROM bids as b,item as i where BidderID='$userID' and b.ItemID=i.ItemID";
                            $result3 = mysqli_query($db, $query3);
                            $userBids = mysqli_fetch_array($result3);
                        ?>
                        <div class="box">
                            <h1>Lịch sử đấu giá</h1>
                            
                        </div>

                        <?php
                            while($userBids) { 
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>">
                                                    <img src="<?php echo $userBids['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>">
                                                    <img src="<?php echo $userBids['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>"><?php echo $userBids['ItemName'] ?></a></h3>
                                        <p align="center">Giá thầu cuối cùng của bạn</p>
                                        <p class="price">Giá : <?php echo number_format($userBids['BidAmount']);?></p>
                                        <p align="center">Giá thầu tối đa hiện tại</p>
                                        <p class="price">Giá : <?php echo number_format($userBids['CurrentPrice']);?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>" class="btn btn-default">Chi tiết</a>
                                            
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php $userBids = $result3->fetch_assoc();} ?>
                    </div>


                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query4 = "SELECT distinct * FROM solditems,item where BuyerID='$userID' and solditems.ItemID=item.ItemID";
                            $result4 = mysqli_query($db, $query4);
                            $userBuys = mysqli_fetch_array($result4);
                        ?>
                        <div class="box">
                            <h1>Lịch sử mua hàng</h1>
                            
                        </div>

                        <?php
                            while($userBuys) { 
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>">
                                                    <img src="<?php echo $userBuys['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>">
                                                    <img src="<?php echo $userBuys['PhotosID'];?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>"><?php echo $userBuys['ItemName'] ?></a></h3>
                                        <p align="center">Giá mua sản phẩm</p>
                                        <p class="price">Giá : <?php echo number_format($userBuys['FinalValue']);?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>" class="btn btn-default">Chi tiết</a>
                                            
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php $userBuys = $result4->fetch_assoc();} ?>
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