<?php
require_once 'header.php';
?>

<html>
<body>
<div class="alert alert-success text-center" style="margin: 10px 50px;">
    <h4 style="text-align: center;margin: 40px">تایپ</h4>
</div>

<form action="" method="post" class="was-validated col-lg-4" style="margin-bottom: 50px;position: absolute;right:33%;direction: rtl;float: right !important;background-color: #ddfcb4;border-radius: 5px;padding: 20px " enctype="multipart/form-data">
    <div class="form-group">
        <label style="float: right;">نام کاربری:</label>
        <input type="text" class="form-control"  placeholder="نام کاربری خود را به صورت لاتین وارد کنید" name="username" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <div class="form-group">
        <label  style="float: right;">شماره تلفن:</label>
        <input type="number" class="form-control"  placeholder="شماره موبایل خود را وارد کنید" name="phone" required>
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
        <label for="sel1" style="float: right;">اولویت تایپ :</label>
        <div class="form-group">
            <select class="form-control" id="sel1" name="olaviat">
                <option value="اولویت زیاد"> اولویت زیاد</option>
                <option value="اولویت متوسط"> اولویت متوسط</option>
                <option value="اولویت کم"> اولویت کم</option>
                <option value="اولویت بسیار کم"> اولویت بسیار کم</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="file" style="float: right;">فایل:</label>
        <input type="file" class="form-control" id="fileToUpload"  name="file" >
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فایل مورد نظر را آپلود کنید.</div>
    </div>

    <div class="form-group">
    <label for="code" style="float: right;">کد متخصص</label>
    <input type="text" class="form-control" name="code" required>
    </div>
    <button type="submit" name="submit" class="btn btn-success" style="float: right">ثبت سفارش</button>
</form>
</body>
</html>
<?php

$database = new PDO('mysql:host=localhost;dbname=niusha',"root","");

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $olaviat = $_POST['olaviat'];
    $code = $_POST['code'];
    $sql = "INSERT INTO typ(username,phone,email,olaviat,code) VALUES (?,?,?,?,?)";

    $query = $database->prepare($sql);

    $result = $query->execute([$username,$phone,$email,$olaviat,$code]);

    if ($result)
    {
        echo "<script>alert('اطلاعات با موفقیت ثبت شد')</script>";
    }
    else
    {
        echo "<script>alert('خطا ، مجدد تلاش کنید')</script>";
    }
}
?>


