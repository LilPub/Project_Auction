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

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

   <?php $db = mysqli_connect('localhost','root','','shop')
            or die('Kết nối thất bại'); 

            $query1 = "SELECT * FROM category ";
            $result1 = mysqli_query($db, $query1);
            $categories = mysqli_fetch_array($result1);


             include 'header.php';
             
             ?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li>Câu hỏi thường gặp</li>
                    </ul>

                </div>

                <div class="col-md-3">

                   <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Liên kết</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="index.php">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="contact.php">Kết nối với chúng tôi</a>
                                </li>
                                <li>
                                    <a href="faq.php">Câu hỏi thường gặp</a>
                                </li>

                            </ul>

                        </div>
                    </div>



                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>Các câu hỏi thường gặp</h1>

                        <p class="lead">Bạn có tò mò về điều gì đó không? Bạn có một số loại vấn đề với sản phẩm của chúng tôi?</p>
                        <p>Xin vui lòng liên hệ với chúng tôi, trung tâm dịch vụ khách hàng của chúng tôi đang làm việc 24/7.</p>

                        <hr>

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#faq1">

						1. Phải làm gì nếu tôi vẫn chưa nhận được đơn đặt hàng?

					    </a>

					</h4>
                                </div>
                                <div id="faq1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                            <li>Liên hệ trực tiếp với chúng tôi qua website.</li>
                                            <li>Phản hồi lại với chúng tôi qua Email.</li>
                                            <li>Liên hệ với tổng đài của website.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

						2. Giá vận chuyển sản phẩm qua bưu điện?

					    </a>

					</h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       Chúng tôi sẽ phụ thuộc vào quãng đường vận chuyển và một vài yếu tố về sản phẩm để quyết định giá vận chuyển cho bạn.
                                    </div>
                                </div>
                            </div>



                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

						3. Bạn có gửi ở nước ngoài không?

					    </a>

					</h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Chúng tôi hỗ trợ đầy đủ yêu cầu của bạn khi bạn muốn sở hữu sản phẩm của chúng tôi.
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>


                </div>

            </div>

        </div>


    <?php include 'footer.php';?>



    </div>



    


 
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>



</body>

</html>
