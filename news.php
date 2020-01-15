<?php include('includes/header.php'); // Haut de page ?>

<?php

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idNews = intval($_GET['id']);
        $searchNews = $db->query('SELECT * FROM news WHERE id = "'.$idNews.'"');
        $article = $searchNews->fetch(PDO::FETCH_ASSOC);
        $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$article['id_user'].'"');
        $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: index.php');
    }

?>

<title><?= $infosSite['websiteName']; ?> - News</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">

        <h1><?= $article['title']; ?></h1>
        <p><?= $article['content']; ?></p>

    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        Publié le : <b><?= $article['date_publication']; ?></b><br />
        Par : <b><?= $author['username']; ?></b><br /><br />
        <?php
            if(isset($userInfo['id']) && ($userInfo['id'] == $author['id'])){
        ?>
            <a href="addNews.php?id=<?= $article['id']; ?>">Modifier l'article</a><br />
            <a href="#">Supprimer l'article</a>
        <?php
            }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 