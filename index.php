<?php include('includes/header.php'); // Haut de page ?>

<?php

    $searchNews = $db->query('SELECT * FROM news');

?>

<title><?= $infosSite['websiteName']; ?> - Accueil</title>

<div class="indexContainer">
    <!-- CONTENU GLOBAL -->
    <div class="newArticle"><a href="addNews.php">Créez un article</a></div>
    <div class="indexBlock">
        <div class="error"><?php if(isset($_GET['forbidden']) && $_GET['forbidden'] == 1){ echo $forbidden; } ?></div>
        <div class="success"><?php if(isset($_GET['deleteNews']) && $_GET['deleteNews'] == 1){ echo $deleteNewsSuccess; } ?></div>
        <?php
            while($news = $searchNews->fetch(PDO::FETCH_ASSOC)){
                $searchUser = $db->query('SELECT * FROM users WHERE id = "'.$news['id_user'].'"');
                $userCheck = $searchUser->fetch(PDO::FETCH_ASSOC);     
        ?>
        <fieldset>
            <legend><h2><?= $news['title']; ?></h2></legend>
            <p>
                <?php
                    if(strlen($news['content']) > 200){
                        $content = substr($news['content'], 0, 200);
                        echo $content."...<a href='news.php?id=".$news['id']."'> Voir la suite </a>";
                    } else {
                        echo $news['content']." | <a href='news.php?id=".$news['id']."'>[Voir l'article] </a> ";
                    }
                ?>
                <div class="author">Publié le <b><?= $news['date_publication']; ?></b> par <b><?= $userCheck['username']; ?></b></div>
            </p>
        </fieldset>
        <?php
            }
        ?>
    </div>    
</div>

<?php include('includes/footer.php'); // Pied de page ?> 