<?php include('includes/config.php'); // Configuration générale ?> 
<?php include('includes/header.php'); // Haut de page ?>

<title><?= $infosSite['websiteName']; ?> - Blank page</title>

<div class="container">

    <?php
        if($infosSite['template'] == 1) {
            $firstBlock = "rightBlock";
            $secondBlock = "leftBlock";
        }
        if($infosSite['template'] == 2){
            $firstBlock = "leftBlock";
            $secondBlock = "rightBlock";
        }
    ?>
    <!-- CONTENU GLOBAL -->
    <div class="<?= $firstBlock; ?>">

        

    </div>
    <!-- --------------------- -->
    <!-- MENU DROITE OU GAUCHE -->
    <div class="<?= $secondBlock ?>">
        
    </div>
    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 