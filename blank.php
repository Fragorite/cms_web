<?php include('includes/config.php'); // Configuration générale ?> 
<?php include('includes/header.php'); // Haut de page ?>

<title><?= $infosSite['websiteName']; ?> - Blank page</title>

<div class="container">

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
    <!-- MENU DROITE OU GAUCHE -->
    <div class="firstBlock">

        

    </div>
    <!-- --------------------- -->

    <!-- CONTENU GLOBAL -->
    <div class="secondBlock">
        
    </div>
    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 