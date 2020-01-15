<?php include('includes/header.php'); // Haut de page ?>
<?php 
    if(isset($userInfo['id'])){ 
?>
<title><?= $infosSite['websiteName']; ?> - Créer une news</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">

        

    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        - Attention aux fautes d'orthographes !<br />
        - Pas de propos racistes ou insultants. <br />
        - Pas de message haineux ...<br />
        - .... <br />
    </div>
</div>


<?php include('includes/footer.php'); // Pied de page ?> 
<?php 
    } else {
        header('Location: index.php');
    }
?>