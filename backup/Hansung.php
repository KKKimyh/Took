<?php 
    session_start();

    function login() {    

        if(!isset($_SESSION['login'])) {
            echo "<li class='page-scroll'>";
            echo "<a href='#login' class='portfolio-link' data-toggle='modal'>로그인</a>";
            echo "</li>";
            echo "<li class='page-scroll'>";
            echo "<a href='#register' class='portfolio-link' data-toggle='modal'>회원가입</a>";
            echo "</li>";
        } else {
            echo "<li class='page-scroll'>";
            echo "<a href='Logout.php' class='portfolio-link'>로그아웃</a>";
            echo "</li>";
            if($_SESSION['login']==master) {
                echo "<li class='page-scroll'>";
                echo "<a href='#item' class='portfolio-link' data-toggle='modal'>물품등록</a>";
                echo "</li>";
            }
        }   
    }
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
                echo "<a href='#".$num."' class='portfolio-link' data-toggle='modal'>";
                echo "<div class='caption'>";
                echo "<div class='caption-content'>";
                echo "<i class='fa fa-search-plus fa-3x'></i>";
                echo "</div>";
                echo "</div>";

                echo "<img src='img/".$image."' class='img-responsive' alt=''>";
                echo "</a>";
                echo "<p>".$title."현재수량:".$amount."개</p>";
                echo "</div>";
            }
        } else if($sort == "detail") {
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
                echo "<h2>".$title."</h2>";
                echo "<hr class='star-primary'>";
                echo "<img src='img/".$image."' class='img-responsive img-centered' alt=''>";
                echo "<p>".$content."</p>";
                echo "<ul class='list-inline item-details'>";
                echo "<li>현재수량:";
                echo "<strong>".$amount."개</a>";
                echo "</strong>";
                echo "</li>";
                echo "</ul>";
                echo "<h2>문의사항</h2>";
                echo "<div class='row'>";
                echo "<center>";
                echo "<table width='80%' >";
                echo "<tr class='list-inline item-details'>";
                echo "<td width='20%'' background-color=#00ccff>";
                echo "<p align=center><li>이 름 &nbsp;</li></p></td>";
                echo "<td width='60%'' background-color=#00ccff>";
                echo "<p align=center><li>문의내용 &nbsp;</li></p></td>";
                echo "<td width='20%'' background-color=#00ccff>";
                echo "<p align=center><li>날 짜 &nbsp;</li></p></td>";
                echo "</tr>";

                $con1 = mysqli_connect("localhost","sse1","se12bin134","sse1");
                mysqli_query($con1, 'set names utf8');
                $res1 = mysqli_query($con1,"SELECT * FROM Comment Where comment_num='$num'");
                while($row = mysqli_fetch_array($res1)) {
                    $name = $row['name'];
                    $comment = $row['comment'];
                    $date = $row['date'];

                    echo "<tr class='list-inline item-details'>";
                    echo "<td width='20%'' background-color=#00ccff>";
                    echo "<p align=center><li>".$name."</li></p></td>";
                    echo "<td width='60%'' background-color=#00ccff>";
                    echo "<p align=center><li>".$comment."</li></p></td>";
                    echo "<td width='20%'' background-color=#00ccff>";
                    echo "<p align=center><li>".$date."</li></p></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</center>";
                echo "</div>";
                echo "<form action='Comment.php' method='post'>";
                echo "<textarea name='comment' style='width:80%;height:50px;'></textarea><br>";
                echo "<input type='hidden' name='num' value=".$num.">";
                echo "<button type='submit' class='btn btn-default' name='submit' >문의등록</button>&nbsp;&nbsp;";
                echo "<button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";                
            }
        }
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
                    <?php login(); ?>
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
                        <span class="skills">본 사이트는 한성대학교 학생들을 대상으로 시행하는 대여 커뮤니티로 제공되는 물품에 대해 필요한 날짜와 시간을 등록하면 선착순으로 대여해주는 형식입니다.<br> 대여 시간은 대여한 다음날 13시까지이며 반납장소는 미래관사물함입니다.<br> 여러분의 공정하고 양심있다는 믿음에서 시작한 서비스로 분실 및  손실에 대해 신경써주시기 바랍니다.</span>
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
                        <h3>반납 장소</h3>
                        <p>한성대<br>미래관 454</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>대여 연락처</h3>
                        <p>이경우<br>카톡 : zzzzdj</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>대여 시간</h3>
                        <p>평일 10~18</p>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>로그인</h2>
                            <hr class="star-primary">
                            <form action="Login.php" method="post">
                                <center>                      
                                    <table cellspacing=0 style="width:95%" cellpadding=0 align=center>
                                    <tr>
                                    <td style="width:30%" background-color=#00ccff>
                                    <p align=right style="font-size:15pt">아 이 디 &nbsp;</p></td>
                                    <td style="width:65%" background-color=#ffccff>
                                    <p><font-size=2>&nbsp;&nbsp; <input type="text" name="id" style="width:90%" class="login-mb_id" placeholder="ID"></font> </p></td></tr>

                                    <tr>
                                    <td style="width:30%" background-color=#00ccff>
                                    <p align=right style="font-size:15pt">비밀번호 &nbsp;</p></td>
                                    <td style="width:65%" background-color=#ffccff>
                                    <p><font-size=2>&nbsp;&nbsp;<input type="password" name="password" style="width:90%"class="login-mb_id" placeholder="PASSWORD"></font></p></td></tr>
                                    </table>
                    
                                    <button type="submit" class="btn btn-default" name="submit" >로그인</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>닫기</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>회원가입</h2>
                            <hr class="star-primary">
                            <form action="SingUp.php" method="post" > <!-- 어떤 action 써야하는지-->
                                <center>                      
                                    <table class='list-inline item-details' cellspacing=0 style="width:95%" cellpadding=0 align=center>
										<tr>
										<td height=40 style = "width:35%" background-color=#00ccff>
										<p align=right><li>아 이 디 &nbsp;</li></p></td>
										<td style = "width:60%"height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=text name=id value='' style="width:90%"></font> </p></td></tr>

										<tr>
										<td style = "width:35%" height=40 background-color=#00ccff>
										<p align=right><li>비밀번호 &nbsp;</li></p></td>
										<td style = "width:60%"height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=password name=password value=''style="width:90%"></font></p></td></tr>

										<tr>
										<td style = "width:35%" height=40 background-color=#00ccff>
										<p align=right><li>비밀번호확인 &nbsp;</li></p></td>
										<td style = "width:60%" height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=password name=password2 value=''style="width:90%"></font></p></td></tr>

										<td style = "width:35%" height=5 background-color=#00ccff>
										<p align=right><li>이 름 &nbsp;</li></p></td>
										<td style = "width:60%" height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=text name=name value=''style="width:90%"></font></p></td></tr>
										
										<tr>
										<td style = "width:35%" height=5 background-color=#00ccff>
										<p align=right><li>학 번 &nbsp;</li></p></td>
										<td style = "width:60%" height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=number style="width:90%" name=studentnumber  value=''></font></p></td></tr>

										<tr>
										<td style = "width:35%" height=5 background-color=#00ccff>
										<p align=right><li>학 과 &nbsp;</li></p></td>
										<td style = "width:60%" height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;<input type=text name=studentmajor value=''style="width:90%"></font></p></td></tr>

										<td style = "width:35%" height=5 background-color=#00ccff>
										<p align=right><li>휴대폰 번호&nbsp;</li></p></td>
										<td style = "width:60%" height=40 background-color=#ffccff>
										<p><font-size=2>&nbsp;&nbsp;
										<input type=number pattern="\d*" name=tel1 value=''style="width:22%; font-size:10pt">-<input type=number pattern="\d*" name=tel2 value=''style="width:27%; font-size:10pt">-<input type=number pattern="\d*" name=tel3 value=''style="width:27%; font-size:10pt"></font></p></td></tr>

										<br>
                                    </table>
                                    
                                    <button type="submit" class="btn btn-default" name="submit" >획원가입</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>닫기</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="item" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>물품등록</h2>
                            <hr class="star-primary">
								<div class="row">
									<div class="col-lg-8 col-lg-offset-2">
										<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
										<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
										<form enctype="multipart/form-data" action="upload.php" method="post"id="contactForm" novalidate="">
											<div class="row control-group">
												<div
													class="form-group col-xs-12 floating-label-form-group controls">
													<label>물품명</label> <input type="text" class="form-control"
														placeholder="물품명" id="name" required="" name="title"
														data-validation-required-message="물품명을 입력하세요."
														aria-invalid="false">
													<p class="help-block text-danger"></p>
												</div>
											</div>
											
											
											<div class="row control-group">
												<div
													class="form-group col-xs-12 floating-label-form-group controls">
													<label>물품 수량</label> <input type="number" class="form-control"
														placeholder="물품 수량" id="phone" required=""name = "amount"
														data-validation-required-message="물품 수량을 입력하세요."
														aria-invalid="false">
													<p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row control-group">
												<div
													class="form-group col-xs-12 floating-label-form-group controls">
													<label>물품소개</label>
													<textarea rows="5" class="form-control" placeholder="물품소개를 입력하세요."
														id="message" required="" name = "content"
														data-validation-required-message="물품소개를 입력하세요."
														aria-invalid="false"></textarea>
													<p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row control-group">
												<div
													class="form-group col-xs-12 floating-label-form-group controls">
													<label></label> <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
													<!-- input의 name은 $_FILES 배열의 name을 결정합니다 -->
													<label>파일명</label><input name="userfile" type="file" />
													<p class="help-block text-danger"></p>
													
												</div>
											</div>
											<br>
											<div id="success"></div>
											<div class="row">
												<div class="form-group col-xs-12">
													<button type="submit" class="btn btn-success btn-lg">등록</button>
													<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

												</div>
											</div>
										</form>
									</div>
								</div>
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