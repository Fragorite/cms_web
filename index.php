<?php include('includes/config.php'); // Configuration générale ?> 
<?php include('includes/header.php'); // Haut de page ?>

<?php

    $searchNews = $db->query('SELECT * FROM news');

?>

<title><?= $infosSite['websiteName']; ?> - Accueil</title>

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
        <?php
            while($news = $searchNews->fetch(PDO::FETCH_ASSOC)){
        ?>
            <h1><?= $news['title']; ?></h1>
            <p>
                <?php
                    if(strlen($news['content']) > 200){
                        $content = substr($news['content'], 0, 200);
                        echo $content."...<a href='news.php?id=".$news['id']."'> Voir la suite </a>";
                    } else {
                        echo $news['content']."<a href='news.php?id=".$news['id']."'  [Voir l'article] </a> ";
                    }
                ?>
            </p>
        <?php
            }
        ?>
    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        
    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 