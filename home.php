<?php

include 'config.php';

ob_start();
session_start();

?>

<html>
    <head>
        <title>Home page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
            <a class="nav-link" href="#"> Blogs </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#Signup">SignUp</a>
          </li>
        </ul>
      </div>
        <form class="navbar-collapse form-inline justify-content-end mr-auto" action="">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </nav>
    </div>
    <!-- Login Modal -->
    <div class="modal" id="login">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Login Form</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="lemail">Email address:</label>
                <input type="email" name="lemail" class="form-control" id="lemail">
              </div>
              <div class="form-group">
                <label for="lpwd">Password:</label>
                <input type="password" name="lpwd" class="form-control" id="lpwd">
              </div>
              <div class="form-group form-check">
                <label class="form-check-label">
                  <input class="form-check-input" name="rem" value="1" type="checkbox"> Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!-- Signup Modal -->
    <div class="modal  modal-dialog-scrollable" id="Signup">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">SignUp Form</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="signup.php" method="post">
              <div class="form-group">
                <label for="fname">Full Name:</label>
                <input type="text" name="fname" class="form-control" id="fname">
              </div>
              <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" name="uname" class="form-control">
              </div>
              <!--<div id="unamef" class="alert alert-danger" role="alert">-->
                
              <!--</div>-->
              <div class="form-group">
                <label for="semail">Email address:</label>
                <input type="email" name="semail" class="form-control" id="semail">
              </div>
              <div class="form-group">
                <label for="spwd">Password:</label>
                <input type="password" name="spwd" class="form-control" id="spwd">
              </div>
              <div class="form-group">
                <label for="cpwd">Confirm Password:</label>
                <input type="password" name="cpwd" class="form-control" id="cpwd">
              </div>
              <div class="form-group custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="Male" name="gender" value="male">
                <label class="custom-control-label" for="Male">Male</label>
              </div>
              <div class="form-group custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="Female" name="gender" value="female">
                <label class="custom-control-label" for="Female">Female</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    
    
    <?php
    
    $sql = "SHOW TABLES";
    try{
        $stmt = $pdo->query($sql);
    }
    catch(PDOException $e){
      echo $sql."<br>".$e->getMessage();
    }
    while ($tables = $stmt->fetch())
    {
      // print_r($tables[0]);
      if(strval($tables[0])!='users'){
        $sql1 = "SELECT * FROM ".$tables[0];
        // print_r($sql1);
        try{
          $stmt1 = $pdo->query($sql1);
        }
        catch(PDOException $e){
          echo $sql1."<br>".$e->getMessage();
        }
        // print_r($stmt1->rowCount());
        if($stmt1->rowCount()>0){
        while ($blogs = $stmt1->fetch())
          {
          
          ?>
          <div class="container" style="text-align:center;margin-top:10px;margin-bottom:10px;">
          <div class="card"style="width: 60rem; display:inline-block;">
            <div class="card-header bg-info" style="text-transform:uppercase"><?php print_r($blogs[blog_title]); ?></div>
            <div class="card-body bg-light"><?php print_r($blogs[blog]); ?></div>
            <div class="card-footer bg-info"><?php if($_SESSION['valid']==true){echo $tables[0];} else{ echo "Log in to see the details"; } ?><i class="glyphicon glyphicon-heart-empty"></i></div>
          </div>
          </div>
            <?php
          }
      }
      }
    }
    ?>
    
    
    <!--<div class="container" style="text-align:center;margin-top:10px;margin-bottom:10px;">-->
    <!--  <div class="card"style="width: 60rem; display:inline-block;">-->
    <!--    <div class="card-header bg-info">Lorem-ipsum1</div>-->
    <!--    <div class="card-body bg-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>-->
    <!--    <div class="card-footer bg-info">Ankur Pandey 1<i class="glyphicon glyphicon-heart-empty"></i></div>-->
    <!--  </div>-->
    <!--  <div class="card" style="width: 60rem; display:inline-block;margin-top:10px;margin-bottom:10px;">-->
    <!--    <div class="card-header bg-info">Lorem-ipsum1</div>-->
    <!--    <div class="card-body bg-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>-->
    <!--    <div class="card-footer bg-info">Ankur Pandey 2<i class="glyphicon glyphicon-heart-empty"></i></div>-->
    <!--  </div>-->
    <!--  <div class="card" style="width: 60rem; display:inline-block;margin-top:10px;margin-bottom:10px;">-->
    <!--    <div class="card-header bg-info">Lorem-ipsum1</div>-->
    <!--    <div class="card-body bg-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>-->
    <!--    <div class="card-footer bg-info">Ankur Pandey 1<i class="glyphicon glyphicon-heart-empty"></i></div>-->
    <!--  </div>-->
    <!--  <div class="card" style="width: 60rem; display:inline-block;margin-top:10px;margin-bottom:10px;">-->
    <!--    <div class="card-header bg-info">Lorem-ipsum1</div>-->
    <!--    <div class="card-body bg-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>-->
    <!--    <div class="card-footer bg-info">Ankur Pandey 3<i class="glyphicon glyphicon-heart-empty"></i></div>-->
    <!--  </div>-->
    <!--</div>-->
        <!-- <nav class = "navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Blogs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SignUp</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name=""/>
                    </div>
                    <button type="submit" value="Submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </nav> -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="script.js"></script>
  </body>
</html>
