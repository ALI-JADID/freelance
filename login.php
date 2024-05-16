<?php

require_once 'header.php';

$database = new PDO('mysql:host=localhost;dbname=niusha',"root","");

if (isset($_POST['submit']))
{
    $sql = "SELECT * from niusha WHERE email=? and password=?";
    
}

?>

<html>
<body>
<br>
<div class="container">
<form action="" method="post" class="was-validated col-lg-4" style="margin-bottom: 50px;position: absolute;right:33%;direction: rtl;float: right !important;background-color: #b3d7ff;border-radius: 5px;padding: 20px " enctype="multipart/form-data">
    <div class="form-group">
        <label for="email" style="float: right;">ایمیل</label>
        <input type="email" class="form-control" id="email" placeholder=" ایمیل خود را وارد کنید" name="email" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <div class="form-group">
        <label for="pass" style="float: right;">پسورد</label>
        <input type="password" class="form-control" id="pass" placeholder=" پسورد خود را وارد کنید" name="password" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>

<!--    <div class="form-group form-check" style="float: right;margin-left: 70px">-->
<!--        <label class="form-check-label">-->
<!--            <input class="form-check-input" type="checkbox" name="remember" style="margin-right: -20px; " required>-->
<!--            <p>مرا به خاطر بسپار</p>-->
<!--        </label>-->
<!--    </div>-->
    <div class="form-group form-check" style="float: right;margin-left: 100px">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" style="margin-right: -20px; " required> <a
                href="ghavanin.php" style="color: green;font-weight: bolder">قوانین</a> را قبول میکنم.
        </label>
    </div>

    <button type="submit" name="submit" class="btn btn-success" style="float: left"> ورود</button>
</form>
</div>
</body>
</html>
