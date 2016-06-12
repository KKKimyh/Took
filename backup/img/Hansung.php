<?php 
    session_start();

    function item($sort) {

        $con = mysqli_connect("localhost","sse1","se12bin134","sse1");
        mysqli_query($con, 'set names utf8');
        $res = mysqli_query($con,"SELECT * FROM Content");

        if($sort == "list") {
            while($row = mysqli_fetch_array($res)) {
                $num = $row['num'];
                $title = $row['title'];
                $content = $row['content'];
                $image = $row['image'];
                $amount = $row['amount'];
                
                echo "<div class='col-sm-4 portfolio-item'>";
                echo "<a href='".$num."' class='portfolio-link' data-toggle='modal'>";
                echo "<div class='caption'>";
                echo "<div class='caption-content'>";
                echo "<i class='fa fa-search-plus fa-3x'></i>";
                echo "</div>";
                echo "</div>";
                echo "<img src='img/".$image."' class='img-responsive' alt=''>";
                echo "<p>".$title."☞"."현재수량:".$amount."개</p>";
                echo "</a>";
                echo "</div>";
            }
        }else if($sort == "detail") {
            while($row = mysqli_fetch_array($res)) {
                $num = $row['num'];
                $title = $row['title'];
                $content = $row['content'];
                $image = $row['image'];
                $amount = $row['amount'];

                echo "<div class='portfolio-modal modal fade' id=".$num." tabindex='-1' role='dialog' aria-hidden='true'>";
                echo "<div class='modal-content'>";
                echo "<div class='close-modal' data-dismiss='modal'>";
                echo "<div class='lr'>";
                echo "<div class='rl'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<div class='col-lg-8 col-lg-offset-2'>";
                echo "<div class='modal-body'>";
                echo "<h2>우산 대여</h2>";
                echo "<hr class='star-primary'>";
                echo "<img src='img/".$image."' class='img-responsive img-centered' alt=''>";
                echo "<p>".$content."</p>";
                echo "<ul class='list-inline item-details'>";
                echo "<li>현재수량:";
                echo "<strong>".$amount."개</a>";
                echo "</strong>";
                echo "</li>";
                echo "</ul>";
                echo "<button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";                
        }

    }

    function item_detail(){


    }

?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>한성 대여</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">한성 대여</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">대여품목</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">대여안내</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#login" class="portfolio-link" data-toggle="modal">로그인</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#register" class="portfolio-link" data-toggle="modal">회원가입</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">한성 대여</span>
                        <hr class="star-light">
                        <span class="skills">합리적인 대여료로 필요한 물품을 빌리세요</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>대여품목</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php item("list"); ?>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <!-- Footer -->
    <footer class="text-center" id="about">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>대여 안내</h1><br>
                    </div>                
                    <div class="footer-col col-md-4">
                        <h3>대여 장소</h3>
                        <p>한성대<br>우촌관 지하</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>대여 연락처</h3>
                        <p>홍길동<br>카톡:hansung</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>대여 시간</h3>
                        <p>평일 00~00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2014
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <?php item("detail"); ?>
    <div class="portfolio-modal modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>로그인</h2>
                            <hr class="star-primary">

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>회원가입</h2>
                            <hr class="star-primary">

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
