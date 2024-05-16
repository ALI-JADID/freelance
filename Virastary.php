<?php
require_once 'header.php';
?>

<html>
<body>
<div class="alert alert-warning text-center" style="margin: 10px 50px;">
    <h4 style="text-align: center;margin: 40px">ویراستاری</h4>

</div>

<form action="" method="post" class="was-validated col-lg-4" style="margin-bottom: 50px;position: absolute;right:33%;direction: rtl;float: right !important;background-color: #f3f7d8;border-radius: 5px;padding: 20px " enctype="multipart/form-data">
    <div class="form-group">
        <label style="float: right;">نام کاربری:</label>
        <input type="text" class="form-control"  placeholder="نام کاربری خود را به صورت لاتین وارد کنید" name="username" required>
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
        <input type="number" class="form-control" placeholder="شماره موبایل خود را وارد کنید" name="phone" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <div class="form-group">
        <label for="code" style="float: right;">کد متخصص</label>
        <input type="text" class="form-control" name="code" required>
    </div>
    <div class="form-group">
        <label for="sel1" style="float: right;">دسته بندی ویراستاری:</label>
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
        <input type="file" class="form-control" id="fileToUpload"  name="fileToUpload">
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فایل مورد نظر را آپلود کنید.</div>
    </div>

    <button type="submit" name="submit" class="btn btn-success" style="float: right">ثبت سفارش</button>

    <?php


    $database = new PDO('mysql:host=localhost;dbname=niusha',"root","");

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $code = $_POST['code'];
        $olaviat = $_POST['olaviat'];
        $sql = "INSERT INTO virastary(username,email,phone,code,olaviat) VALUES (? , ? , ? ,?,?)";
        $query = $database->prepare($sql);
        $result = $query->execute([$username,$email,$phone,$code,$olaviat]);

        if ($result)
        {
            echo "<script>alert('اطلاعات با موفقیت ثبت شد')</script>";
        }
        else
        {
            echo "<script>alert('خطا در ثبت اطلاعات ، مجدد تلاش کنید')</script>";
        }
    }
        $rand=rand(1451,15452);

    echo "شماره سفارش : ".$rand;
//        $fileDir= "img/";
//        $fileName= $fileDir. $_FILES['fileToUpload']['name'];
//        $uploadOk= 1;
//        $fileType= pathinfo($fileName, PATHINFO_EXTENSION);
//        if (isset($_POST['submit'])) {
//            if (empty(basename($_FILES['fileToUpload']['name']))) {
//                echo "<br>هیچ فایلی انتخاب نشده است.";
//                $uploadOk= 0;
//            }
//            else {
//                if ($_FILES['fileToUpload']['size'] > 600000) {
//                    echo "<br>اندازه فایل زیاد است. فایل کوچکتری انتخاب کنید.";
//                    $uploadOk= 0;
//                }
//                if (file_exists($fileName)) {
//                    echo "<br>فایل تکراری است.";
//                    $uploadOk= 0;
//                }
//                $check= getimagesize($_FILES['fileToUpload']['tmp_name']);
//            }
//            if ($uploadOk !== 0) {
//                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileName)) {
//                    echo "<br>فایل با موفقیت آپلود شد.";
//                }
//                else {
//                    echo "<br>خطایی هنگام بارگذاری رخ داده است";
//                    $uploadOk= 0;
//                }
//            }
//        }
    ?>
</form>
</body>
</html>
