<?php
include 'config.php';
// require_once 'login.php';

ob_start();
session_start();
?>

<?php
// print_r($_POST);
$time = new DateTime($timezone);
$d = $time->format('Y-m-d H:i:s');
// $d = date("Y/m/d",time());


$blog_title = $_POST['blog_title'];
$blog = $_POST['blog'];

$username = $_SESSION['username'];

if($_POST['blog_title']!="" and $_POST['blog']!=""){
    $sql = "INSERT INTO ".$_SESSION['username']." VALUES('".$blog_title."','".$blog."','".strval($d)."')";
    try{
        $pdo->query($sql);
    }
    catch(PDOException $e){
        echo $sql."<br>".$e->getMessage();
    }
    header("Location:https://php-slim-akppan123-1.c9users.io/project2/myblogs.php");
}

?>