<?php include('includes/header.php'); // Haut de page ?>

<?php

    if(!isset($userInfo['id'])){
        header('Location: connexion.php?accessDenied=1');
    }

?>

<title><?= $infosSite['websiteName']; ?> - Chat</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">

        <fieldset>
            <legend>

            </legend>
        </fieldset>

    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        
    </div>
</div>


<?php include('includes/footer.php'); // Pied de page ?> 