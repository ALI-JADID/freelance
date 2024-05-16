<?php
session_start();
require_once 'headermember.php';

$database = new PDO("mysql:host=localhost;dbname=niusha","root","");
if($database)
{
    $sql = "SELECT FROM tarahlogo WHERE username";
    $query = $database->prepare($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo $_SESSION['user'];
}
?>