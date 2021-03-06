<?php include('includes/config.php'); ?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Page de connexion au super mortel CMS.">

<script src= »http://code.jquery.com/jquery-latest.js »></script>

<link rel="stylesheet" href="css/connexion.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/footer.css">
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
        <li><a href="index.php"><?= $infosSite['websiteName']; ?></a></li>
        <li><a href="forum.php">Forum</a></li>
        <?php if(isset($userInfo['id'])) { ?>
        <li><a href="chat.php">Tchat</a></li>
        <?php } ?>
        <?php if(isset($userInfo['id']) && $userInfo['admin'] > 0) { ?>
        <li><a href="administration/index.php">Administration</a></li>
        <?php } ?>
        <?php if(isset($userInfo['id'])){ ?>
        <li><a href="?disconnect=1">Déconnexion</a></li>
        <?php } else { ?>
        <li><a href="connexion.php">Connexion/Inscription</a></li>
        <?php } ?>
        
    </ul>
</div>
