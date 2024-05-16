<?php
session_start();
require_once 'header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام مترجم</title>
</head>
<body>

<div class="alert alert-success text-center" style="margin: 10px 50px;">
    در این جا میتوانید به عنوان مترجم ثبت نام کنید
</div>

<form action="" method="post" class="was-validated col-lg-4" style="position: absolute;right:33%;direction: rtl;float: right !important;background-color: #ddfcb4;border-radius: 5px;padding: 20px ">
    <div class="form-group">
        <label for="name" style="float: right;">نام:</label>
        <input type="text" name ="name" class="form-control" placeholder="نام خود را به صورت لاتین وارد کنید">

    </div>
    <div class="form-group">
        <label for="f-name" style="float: right;">نام خانوادگی:</label>
        <input type="text" name ="lastname" class="form-control" placeholder="نام خانوادگی خود را به صورت لاتین وارد کنید">
       
    </div>
    <div class="form-group">
        <label for="username" style="float: right;">نام کاربری:</label>
        <input type="text" class="form-control"  placeholder="نام کاربری خود را وارد کنید" name="username" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <div class="form-group">
        <label  style="float: right;">رمز عبور:</label>
        <input type="password" class="form-control" placeholder="رمز عبور خود را وارد کنید" name="password" required>
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
       <label for="phonenumber" style="float: right;">تلفن همراه:</label>
       <input type="number" class="form-control" name="phone" required>
   </div>
   
    <div class="form-group">
        <label for="degree" style="float: right;">مدرک تحصیلی:</label>
        <div class="form-group">
            <select class="form-control" name="major">
                <option value="دیپلم"> دیپلم</option>
                <option value="فوق دیپلم"> فوق دیپلم</option>
                <option value="لیسانس"> لیسانس</option>
                <option value="فوق لیسانس"> فوق لیسانس</option>
                <option value="دکترا"> دکترا</option>
            </select>
        </div>
    </div>

  <div class="form-group">
        <label for="field" style="float: right;">زمینه ها</label>
        <div class="form-group">
        <select class="form-control" name="field">
            <option value="عمومی">عمومی</option>
            <option value="سیاسی">سیاسی</option>
            <option value="فلسفه">فلسفه</option>
            <option value="ادبیات و زبان شناسی">ادبیات و زبان شناسی</option>
            <option value="حقوق">حقوق</option>
            <option value="پزشکی">پزشکی</option>
            <option value="کامپیوتر">کامپیوتر</option>
            <option value="اقتصاد">اقتصاد</option>
        </select>
    </div>
</div>
    <div class="form-group form-check" style="float: right;margin-left: 70px">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" style="margin-right: -20px; " required> <a
                href="ghavanin.php" style="color: green;font-weight: bolder">قوانین</a> را قبول میکنم.
        </label>
    </div>
   
    <button type="submit" class="btn btn-success" name="submit" style="float: right">ثبت نام</button>

</form>
</body>
</html>
<?php

$database = new PDO('mysql:host=localhost;dbname=niusha',"root","");

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $lastname=$_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $major = $_POST['major'];
    $field = $_POST['field'];

    if (isset($_POST['submit'])) {
        $sql = "SELECT (email and username) from motarjem WHERE (email=? or username=?)";
        $query = $database->prepare($sql);
        $res = $query->execute([$email,$username]);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        if ($res) {
            echo"<script>alert('این ایمیل  یا یوزرنیم وجود دارد')</script>";
        } else {
            $sql2 = "INSERT INTO motarjem(name,lastname,username,password,email,phone,major,field) VALUES (? , ? , ? ,? , ? , ? ,?,?)";
            $query2 = $database->prepare($sql2);
            $result = $query2->execute([$name,$lastname,$username,$password,$email,$phone,$major,$field]);
            if ($result)
             {
                 echo "<script>alert('اطلاعات با موفقیت ثبت شد')</script>";
             }
              else
              {
                echo "<script>alert('خطا در ثبت اطلاعات ، مجدد تلاش کنید')</script>";
               }
        }
    }
}
?>