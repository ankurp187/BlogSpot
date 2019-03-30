<?php

ob_start();
session_start();

session_unset();
session_destroy();

header("Location:https://php-slim-akppan123-1.c9users.io/project2/home.php");

?>