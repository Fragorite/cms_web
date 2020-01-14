<?php include('includes/config.php'); // Configuration générale ?> 
<?php include('includes/header.php'); // Haut de page ?>

<?php

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idNews = intval($_GET['id']);
        $searchNews = $db->query('SELECT * FROM news WHERE id = "'.$idNews.'"');
        $news = $searchNews->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
    }

?>

<title><?= $infosSite['websiteName']; ?> - News</title>

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

<?php include('includes/footer.php'); // Pied de page ?> 