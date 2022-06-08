<?php
session_start();
// unset($_SESSION['email']);
unset($_SESSION['id']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
    echo "<script>alert('You have been logged out!')</script>";
 echo "<script>window.location.href = 'index.php'</script>";
 ?>
