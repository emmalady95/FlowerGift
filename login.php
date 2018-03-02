<?php
/**
 * Created by PhpStorm.
 * User: Liz Nguyen
 * Date: 01/03/2018
 * Time: 09:43
 */
?>
<?php
require('assets/connect-db.php');
mysql_query("SET NAMES 'utf8'");
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Heart Flower Shop - For your life, for your love</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Design By Emma Nguyen" />
    <meta name="keywords" content="Flower, Gift, Shop" />
    <meta name="author" content="Emma Nguyen" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="images/favico.png">

    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--        <link href="css/owl.transitions.css" rel="stylesheet">-->

</head>

<body>
<div id="fh5co-container">
    <?php
        include('assets/home.php');
    ?>
    <section id="form" >
        <div class="container">

            <div id="fh5co-menus" data-section="menu">
                <div class="container">
                    <div class="row text-center fh5co-heading row-padded">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="heading to-animate">Tài Khoản</h2>
                            <p class="sub-heading to-animate">Đăng nhập hoặc đăng ký</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2 style = "color: #000;text-transform: uppercase;">Đăng nhập vào tài khoản</h2>
                        <form action = "checklogin.php" method="POST">
                            <input type="email" id = "login" placeholder="Email đăng nhập" name = "uuser" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <input type="password" id = "password" placeholder="Mật khẩu" name = "upass" style="border-radius: 20px; background: #CfCfCf;color: #000;" />

                            <center><button type="submit" class="btn btn-default">Đăng nhập</button></center>
                        </form>
                    </div>
                </div>

                <div class="col-sm-1">
                    <h2 class="or">HOẶC</h2>
                </div>

                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2 style = "color: #000;text-transform: uppercase;">Đăng ký tài khoản mới</h2>
                        <form action="register-account.php" method="POST">
                            <input type="email" placeholder="Nhập địa chỉ email(*)" name = "reuser" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <input type="password" placeholder="Password(*)" name = "repass" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <input type="text" placeholder="Nhập lại mật khẩu" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <input type="text" placeholder="Họ và tên(*)" name = "rename" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <input type="phone" placeholder="Số điện thoại(*)" name = "rephone" style="border-radius: 20px; background: #CfCfCf;color: #000;"/>
                            <span style = "color: #fff;font-weight: bold;">CÁC TRƯỜNG (*) LÀ BẮT BUỘC</span>
                            <center><button type="submit" class="btn btn-default" style = "margin-top: 20px;height: 40px;">Đăng ký</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('assets/footer.php');
?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap DateTimePicker -->
<script src="js/moment.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>

<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<script>
    $(function () {
        $('#date').datetimepicker();
    });
</script>
<!-- Main JS -->
<script src="js/main.js"></script>

</body>
</html>
