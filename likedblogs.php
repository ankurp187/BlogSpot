<?php
include 'config.php';
// require_once 'login.php';

ob_start();
session_start();
?>

<html>
    <head>
        <title>Blog Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" />
        
    </head>
    <body>
      <div class="container">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
        <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        <div class="navbar-collapse collapse" >
        <ul class="navbar-nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="main.php"> Blogs </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myblog.php">My blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="likedblogs.php">Liked Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
        <form class="navbar-collapse form-inline justify-content-end mr-auto" action="">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </nav>
    </div>
    <?php
        $username = $_SESSION['username'];
        if($_SERVER['REQUEST_TIME']- $_SESSION['LAST_ACTIVITY'] >$_SESSION['timeout']){
            header("Location:https://php-slim-akppan123-1.c9users.io/project2/logout.php");
        }
        if($_SESSION['username']==""){
            header("Location:https://php-slim-akppan123-1.c9users.io/project2/logout.php");
        }
    ?>
    <div class="container">
        
        <div class="blog-con">
            <?php
            
            // $sql = "SELECT * FROM ".$username;
            // $stmt = $pdo->exec($sql);
            // $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // print_r($stmt);
            // print_r($blogs);
            ?>
        </div>
    </div>
    
            
            
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="script.js"></script>
  </body>
</html>
