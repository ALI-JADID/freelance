<?php
require_once 'header.php';
?>

<html>
<body>

<div class="alert alert-primary text-center" style="margin: 10px 50px;">
<h4 style="text-align: center;margin: 40px">لوگو</h4>
</div>
<form action="" method="post" class="was-validated col-lg-4" style="margin-bottom: 50px;position: absolute;right:33%;direction: rtl;float: right !important;background-color:lightblue;border-radius: 5px;padding: 20px " enctype="multipart/form-data">
<div class="form-group">
<label  style="float: right;">نام کاربری:</label>
<input type="text" class="form-control" placeholder="نام کاربری خود را به صورت لاتین وارد کنید" name="username" required>
<div class="valid-feedback">معتبر است.</div>
<div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
</div>
    <div class="form-group">
        <label for="email" style="float: right;">ایمیل:</label>
        <input type="email" class="form-control" id="email" placeholder="لطفا ایمیل معتبر وارد کنید" name="email" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
<div class="form-group">
<label for="phonenumber" style="float: right;">شماره تلفن:</label>
<input type="number" class="form-control" id="phonenumber" placeholder="شماره موبایل خود را وارد کنید" name="phone" required>
<div class="valid-feedback">معتبر است.</div>
<div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
</div>
    <div class="form-group">
        <label for="code" style="float: right;">کد متخصص</label>
        <input type="text" class="form-control" name="code" required>
    </div>
<div class="form-group">
<label for="file" style="float: right;">فایل:</label>
<input type="file" class="form-control" id="fileToUpload" name="fileToUpload" >

<div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فایل مورد نظر را آپلود کنید.</div>
</div>

<div class="form-group">
<label for="to" style="float: right;">توضیحات:</label>
<textarea class="form-control" id="to" name="content" style="resize: none;"></textarea>

</div>

<button type="submit" name="submit" class="btn btn-success" style="float: right">ثبت سفارش</button>


<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $code = $_POST['code'];
    $content = $_POST['content'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email,FILTER_VALIDATE_EMAIL);
    $database  = new PDO("mysql:host=localhost;dbname=niusha", "root", "");
    $sql  = ("INSERT INTO `logo` (`username`,`email`,`phone`,`code`,`content`) VALUES  (?,?,?,?,?)");
    $query = $database->prepare($sql);
    $result = $query->execute([$username,$email,$phone,$code,$content]);
    if ($database) {
        if ($result) {
            echo "<script>alert('اطلاعات با موفقیت ثبت شد')</script>";
        } else {
            echo "<script>alert('خطا در ثبت اطلاعات ، مجدد تلاش کنید')</script>";
        }
    } else {
        echo "cannot connect database";
    }
}
?>
</form>
</body>
</html>