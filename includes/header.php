<?php include('includes/config.php'); ?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Page de connexion au super mortel CMS.">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/connexion.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600&display=swap" rel="stylesheet"> 
<?php
        if($infosSite['template'] == 1) {
?>
    <link rel="stylesheet" href="css/template.css">
<?php  
    }
    if($infosSite['template'] == 2){
?>
    <link rel="stylesheet" href="css/template2.css">
<?php
    }
?>

<div>
    <ul class="navigationHead">
        <li><a href="#"><?= $infosSite['websiteName']; ?></a></li>
        <li><a href="#">Articles</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">Tchat</a></li>
        <li><a href="#">Administration</a></li>
        <li><a href="#">Déconnexion</a></li>
    </ul>
</div>
