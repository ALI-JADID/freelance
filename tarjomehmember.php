<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css_main.css">
    <script src="bootstrap/js/jquery3.js"></script>
    <style>
    body{
        background-color:darkgray ;
    }
    * {
    direction: rtl;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: right!important;
}

th,
thead,
table,
td,
tr {
    font-size: 13px!important;
}

.font-16 {
    font-size: 15px!important;
}
    </style>
</head>

<body>
    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="p-3 pt-5">علی جدیدالاسلام</h3>
                <hr/>
              <!--  <a href="insert-top.php"><button class="btn btn-primary font-16 m-3">وارد کردن رکورد</button></a>
              -->
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>نام کاربری</th>
                            <th>ایمیل</th>
                            <th> تلفن</th>
                            <th>کد متخصص</th>
                            <th>اولویت</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                        <?php
                        $database = new PDO('mysql:host=localhost;dbname=niusha',"root","");
                        $sql = "SELECT * FROM tarjomeh" ;
                        $query = $database->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                        
                        if ($query->rowCount() >0)
                        {
                            foreach ($result as $results)
                            {

                        ?>
                            <tr>
                                <td>
                                    <?php echo htmlentities($results->username)?>
                                </td>
                                <td>
                                    <?php echo htmlentities($results->email) ?>
                                </td>
                                <td>
                                <?php echo htmlentities($results->phone) ?>
                                </td>
                                <td>
                                <?php echo htmlentities($results->codeuser) ?>
                                </td>
                            
                                <td>
                                <?php echo htmlentities($results->olaviat) ?>
                                </td>
                            
                                <td><a href="tarjomehmember.php?del="<?php echo htmlentities($results->username)?>><button class="btn btn-danger" onClick="return confirm('آیا حذف انجام شود');"><span class="glyphicon glyphicon-remove-circle"></span></button></a></td>
                            </tr>
                        <?php                              
                        }}
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>