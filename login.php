<?php

include 'config.php';

ob_start();
session_start();


$password = $_POST['lpwd'];
$email = $_POST['lemail'];

print_r($_POST);

if(isset($_POST['lpwd']) and isset($_POST['lemail'])){
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND password=?');
    try{
        $stmt->execute([$email,$password]);
    }
    catch(PDOException $e){
        echo $sql."<br>".$e->getMessage();
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount()==1){
        // print_r($user);
        $username = $user['username'];
        // print_r($username);
        
        $stmt = $pdo->prepare('CREATE TABLE IF NOT EXISTS '.$username.'(blog_title VARCHAR(20) NOT NULL,
                                blog TINYTEXT NOT NULL,
                                created_at DATETIME
                                )');
        try{
            $stmt->execute();
        }catch(PDOException $e){
            echo $sql."<br>".$e->getMessage();
        }
                                
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = 1000;
        $_SESSION['username'] = $username;
        $_SESSION['LAST_ACTIVITY'] = time();
        if($_POST['rem']==1){
            $_SESSION['timeout'] = 15;
        }
        header("Location:https://php-slim-akppan123-1.c9users.io/project2/main.php");
    }
    else{
        header("Location:https://php-slim-akppan123-1.c9users.io/project2/home.php");
    }
    
}
else{
    echo "Enter details";
}

?>