<?php
require_once 'header.php';
?>
<div class="alert alert-success text-center" style="margin: 10px 50px;">
    جدیدترین سفارش های ترجمه
</div>
<h6 style="float: right;margin: 50px;">اطلاعات شما</h6>
<form action="" method="post" class="was-validated col-lg-4"
      style="direction: rtl;float: right !important;background-color: #c6fcf9;border-radius: 5px;display: block;margin: 30px;padding: 10px ">
    <div class="form-group">
        <!--        در این جا برای ین که اطلاعات همه افراد چاپ شود و اطلاعات به صورت متوالی دریافت شود از حلقه while استفاده شده است-->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kashan_db";

        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //بوسیله ی کد های بالا به دیتابیس وصل شده ایم و بوسیله شرط if بررسی کرده ایم که به دیتابیس وصل شده ایم یا نه
        $query = "SELECT * FROM order_tarjome";
        $t=$_SESSION['user'];
        $query2 = "SELECT * FROM typist_register WHERE username LIKE '%$t%'";
        $res = mysqli_query($conn, $query);
        $res2 = mysqli_query($conn, $query2);
        //بوسیله ی کد های بالا کوئری هایی نوششتیم برای دریافت اطلاعات از دیتابیس و آن ها را بوسیله تابع های اphp اجرا کرده و داخل متغیر ها رخته ایم

        while ($row2=mysqli_fetch_array($res2)){

        ?>
        <label for="uname" style="float: right;">نام کاربری:</label><br>
        <label style="float: left;"><?php echo $row2['username'] ?></label>
    </div>
    <div class="form-group">
        <label for="pwd" style="float: right;">رمز عبور:</label><br>
        <label style="float: left;"><?php echo $row2['password'] ?></label>

    </div>
    <div class="form-group">
        <label for="phonenumber" style="float: right;">شماره تلفن:</label><br>
        <label style="float: left;"><?php echo $row2['tell'] ?></label>

    </div>
    <div class="form-group">
        <label for="email" style="float: right;">ایمیل:</label><br>
        <label style="float: left;"><?php echo $row2['email'] ; }?></label>

    </div>
    <a href="edit_mot.php" class="btn btn-success" name="submit" style="float: right">ویرایش</a>
</form>

<form action="" method="post">
    <div class="container">
        <table class="table" style="direction: rtl;text-align: center;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">نام کاربر</th>
                <th scope="col"> تلفن</th>
                <th scope="col">دسته بندی ترجمه</th>
                <th scope="col"> فایل ترجمه</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($res)){

            $i = $row['file'];
            $id = $row['id'];
            $u = 'id' . $id;
            ?>

            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['tell']; ?></td>
                <td><?php echo $row['cat_tarjomeh']; ?></td>
                <td><?php echo "<a  href='$i' class='btn btn-outline-success ' name='id'  >دانلود</a>";
                    }?></td>

            </tr>
            </tbody>
        </table>

        <?php
        //با شرط زیر بررسی میکنیم ک آیا دکمه ثبت زده شده است یا نه،به عبارت دیگه بررسی میکنیم که اطلاعات برای ما پست شده اند یا نه
        if (isset($_POST['submit'])) {
            //بوسیله این شرط چک میکنیم که کاربر فایلی را انتخاب کرده است یاا نه
            if (empty(basename($_FILES['fileToUpload']['name']))) {
                echo "<br>هیچ فایلی انتخاب نشده است.";
                $uploadOk= 0;
            }
            else {
                //و بوسیله ی این شرط حجم فایل دریافتی را چک میکنیم
                if ($_FILES['fileToUpload']['size'] > 600000) {
                    echo "<br>اندازه فایل زیاد است. فایل کوچکتری انتخاب کنید.";
                    $uploadOk= 0;
                }
                if (file_exists($fileName)) {
                    echo "<br>فایل تکراری است.";
                    $uploadOk= 0;
                }
                $check= getimagesize($_FILES['fileToUpload']['tmp_name']);
            }
            if ($uploadOk !== 0) {
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileName)) {
                    echo "<br>فایل با موفقیت آپلود شد.";
                }
                else {
                    echo "<br>خطایی هنگام بارگذاری رخ داده است";
                    $uploadOk= 0;
                }
            }
        }


        ?>
    </div>
</form>
<?php
require_once 'footer.php';
?>
