<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idNews = intval($_GET['id']);
        $searchNews = $db->query('SELECT * FROM news WHERE id = "'.$idNews.'"');
        $newsExist = $searchNews->rowCount();
        if($newsExist == 1){
            $news = $searchNews->fetch(PDO::FETCH_ASSOC);
            $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$news['id_user'].'"');
            $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
        } else {
            header('Location: news.php');
        }
        if(isset($_GET['delete']) && !empty($_GET['delete'])){
            $delete = $db->query('DELETE FROM news WHERE id = "'.$_GET['id'].'"');
            header('Location: news.php?deleteNews=1');
        }
    } else {

    }

?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        <?php 
            if(isset($_GET['id']) && !empty($_GET['id'])) { 
        ?>
            <div class="success"><?php if(isset($_GET['updateNews']) && $_GET['updateNews'] == 1) { echo $updateNewsSuccess; } ?></div>
            <h1><?= $news['title']; ?></h1>
            <p>
                <?= $news['content']; ?>
            </p>
            <br />
            <a href="updateNews.php?id=<?= $news['id']; ?>">Modifier</a> | <a href="?id=<?= $news['id']; ?>&delete=1">Supprimer</a>
            <br />
            <div class="author">Par <b><?= $author['username']; ?></b> le <b><?= $news['date_publication']; ?></b></div>
        <?php
            } else {
                $searchAllNews = $db->query('SELECT * FROM news ORDER BY id DESC');
        ?>
            <h1>Liste des news</h1>
            <div class="success"><?php if(isset($_GET['deleteNews']) && !empty($_GET['deleteNews'])) { echo $deleteNewsSuccess; } ?></div>
            <?php
                while($allNews = $searchAllNews->fetch(PDO::FETCH_ASSOC)){
                    $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$allNews['id_user'].'"');
                    $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
            ?>
            <fieldset>
                <legend>
                    <h3><?= $allNews['title']; ?></h3>
                </legend>
                <?php
                    if(strlen($allNews['content']) > 400){
                        $newContent = substr($allNews['content'], 0, 400);
                        echo $newContent.'... <a href="?id='.$allNews['id'].'">[Voir la suite]</a>';
                    } else {
                        echo $allNews['content'].' <a href="?id='.$allNews['id'].'">[Voir l\'article]</a>';
                    }
                ?>
                <div class="author">Par <b><?= $author['username']; ?></b> le <b><?= $allNews['date_publication']; ?></b></div>
            </fieldset>
        <?php
                }
            }
        ?>
    </div>
</header>


