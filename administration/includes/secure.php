<?php include('../includes/config.php'); ?>

<?php
    if(!isset($_SESSION['id']) || $userInfo['admin'] < 1){
        header('Location: ../index.php');
    }
?>