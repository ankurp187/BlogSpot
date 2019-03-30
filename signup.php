<?php


include 'config.php';


$fullname = $_POST['fname'];
$username = $_POST['uname'];
$password = $_POST['spwd'];
$email = $_POST['semail'];
$gender = $_POST['gender'];
$time = new DateTime($timezone);
$d = $time->format('Y-m-d H:i:s');
// $d = date("Y/m/d",time());
// print_r($d);


if(isset($_POST['uname']) and isset($_POST['fname']) and isset($_POST['semail']) and isset($_POST['spwd']) and isset($_POST['cpwd']) and isset($_POST['gender'])){
    $c=0;
    if ( preg_match('/\s/',$_POST['uname']) ){
        echo "username should not contain white spaces";
        $c=1;
    }
    if($_POST['spwd'] != $_POST['cpwd']){
        echo "Passwords not match";
        $c=1;
    }
    if($c==0){
        $sql = "use blogspots";
        // echo $sql;
        try{
            $pdo->query($sql);
        }
        catch(PDOException $e){
            echo $sql."<br>".$e->getMessage();
        }
        $sql = "CREATE TABLE IF NOT EXISTS users(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                fullname VARCHAR(50) NOT NULL,
                username VARCHAR(50) NOT NULL UNIQUE,
                email VARCHAR(50) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                gender VARCHAR(20),
                created_at DATETIME
                ) ";
        try{
            $pdo->query($sql);
        }
        catch(PDOException $e){
            echo $sql."<br>".$e->getMessage();
        }
        $sql = "INSERT INTO users VALUES('','".strval($fullname)."','".$username."','".$email."','".$password."','".$gender."','".strval($d)."')";
        try{
            $pdo->query($sql);
        }
        catch(PDOException $e){
            echo $sql."<br>".$e->getMessage();
        }
        header("Location:https://php-slim-akppan123-1.c9users.io/project2/home.php");
    }
}
else{
    echo "Enter full details";
}



?>