<?php 
include 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css_main.css">
    <script src="bootstrap/js/jquery3.js"></script>
    <title>خانه</title>
</head>
<body>
<!-- <img src="IMG_32922AE584E3-1.jpeg" alt="قاصدک" style="height:40%;width:50%;margin-left: 20%;">
-->

<!--     یعنی کل عرض صفحه را بگیر(مربوط به بوت استرپ) col-lg-12  -->
<div class="main col-lg-12" style="margin-top: 100px;display: block !important;">
    <div class="row">
<!-- بکس رنگی صفحه اصلی در این بخش تعریف شده است-->
        <div class="col-lg-3">
            <a href="tabligh.php">
            <div class="card-deck">
                <div class="card bg-primary">
                    <div class="card-body text-center">
                        <p class="card-text text-nowrap text-center">بخش تبلیغات</p>
                    </div>
                </div>
            </div></a>
    </div>
        <div class="col-lg-3">
           <a href="Virastar.php">
            <div class="card-deck">
                <div class="card bg-warning">
                    <div class="card-body text-center">
                        <p class="card-text text-nowrap text-center">بخش ویراستاری</p>
                    </div>
                </div>
            </div></a>
    </div>
        <div class="col-lg-3">
           <a href="typemember.php">
            <div class="card-deck">
                <div class="card bg-success">
                    <div class="card-body text-center" >
                        <p class="card-text text-nowrap text-center">بخش تایپ</p>
                    </div>
                </div>
            </div></a>
    </div>
        <div class="col-lg-3">
          <a href="tarjomehmember.php">
            <div class="card-deck">
                <div class="card bg-danger">
                    <div class="card-body text-center">
                        <p class="card-text text-nowrap text-center">بخش ترجمه</p>
                    </div>
                </div>
            </div></a>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-lg-3" style="margin-left: 13%">
            <a href="logomember.php">
            <div class="card-deck" >
                <div class="card bg-dark" >
                    <div class="card-body text-center" >
                        <p class="card-text text-nowrap text-center" style="color:white ;">طراحی لوگو</p>
                    </div>
                </div>
            </div></a>
    </div>
    <div class="col-lg-3">
           <a href="postermember.php">
            <div class="card-deck">
                <div class="card bg-danger">
                    <div class="card-body text-center">
                        <p class="card-text text-nowrap text-center">طراحی پوستر</p>
                    </div>
                </div>
            </div></a>

    </div>
    <div class="col-lg-3" >
            <a href="catalogmember.php">
            <div class="card-deck">
                <div class="card bg-info">
                    <div class="card-body text-center">
                        <p class="card-text text-nowrap text-center">طراحی کاتالوگ</p>
                    </div>
                </div>
            </div></a>
    </div>
    </div>
</div>
</body>
</html>