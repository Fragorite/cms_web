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
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">

        

    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        
    </div>
</div>


<?php include('includes/footer.php'); // Pied de page ?> 