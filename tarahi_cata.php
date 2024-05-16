<?php
require_once 'header.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css_main.css">
    <script src="bootstrap/js/jquery3.js"></script>
    <title>صفحه اصلی</title>
</head>
<body>

<form action="" method="post" class="was-validated col-lg-4"
      style="position: absolute;right:33%;top:120px;direction: rtl;float: right !important;background-color:aquamarine;border-radius: 5px;padding: 20px ">
    <div class="form-group">
        <label  style="float: right;">نام کاربری یا ایمیل: </label>
        <input type="text" class="form-control" id="uname"
               name="username" required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <div class="form-group">
        <label  style="float: right;">رمز عبور:</label>
        <input type="password" class="form-control" id="pwd" name="password"
               required>
        <div class="valid-feedback">معتبر است.</div>
        <div class="invalid-feedback" style="text-align: right;margin-right: 20px;">لطفا فیلد مورد نظر را پر کنید.</div>
    </div>
    <button type="submit" class="btn btn-success" name="submit" style="float: right">ورود </button>
    <a href="index.php" class="btn btn-warning">خانه</a>

    <?php
    $database = new PDO('mysql:host=localhost;dbname=niusha',"root","");

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tarahcata WHERE (username=? or email=?) and password =?";
        $query = $database->prepare($sql);
        $query->execute([$username,$email,$password]);
        $result =  $query->fetchAll(PDO::FETCH_ASSOC);

        if ($database) {
            if ($result) {
                echo "<script>alert('اطلاعات با موفقیت ثبت شد')</script>";
                echo "<script>window.location.href='member.php'</script>";
            }
            else
            {
                echo "<script>alert('مجدد تلاش کنید، اطلاعات اشتباه است')</script>";
            }
        }
        else
        {
            echo 'cannot connect database';
        }
    }
    ?>
</form>
</body>
</html>
