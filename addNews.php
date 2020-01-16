<?php include('includes/header.php'); // Haut de page ?>

<?php
    if(!isset($userInfo['id'])){
        header('Location: connexion.php?accessDenied=1');
    }
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $searchNews = $db->query('SELECT * FROM news WHERE id = "'.$_GET['id'].'"');
        $countNews = $searchNews->rowCount();
        if($countNews == 1){
            $news = $searchNews->fetch(PDO::FETCH_ASSOC);
            if($news['id_user'] == $userInfo['id']){
                if(isset($_POST['formAddNews'])){
                    if(!empty($_POST['titleAdd']) && !empty($_POST['contentAdd'])){
                        if(strlen($_POST['titleAdd']) <= 80) {
                            $titleAdd = htmlspecialchars($_POST['titleAdd']);
                            $contentAdd = nl2br($_POST['contentAdd']);
                            $updateNews = $db->prepare('UPDATE news SET title = :title, content = :content WHERE id = "'.$news['id'].'"');
                            $updateNews->execute(array(
                                'title'     => $titleAdd,
                                'content'   => $contentAdd
                            ));
                            header('Location: news.php?id='.$news['id']);
                        } else {
                            $error = "Le titre ne doit pas dépasser 80 caractères.";
                        }
                    } else {
                        $error = "Veuillez renseigner tous les champs.";
                    }
                }
            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    } else {
        if(isset($_POST['formAddNews'])){
            if(!empty($_POST['titleAdd']) && !empty($_POST['contentAdd'])){
                $titleAdd = htmlspecialchars($_POST['titleAdd']);
                if(strlen($titleAdd) <= 80) {
                    $contentAdd = nl2br(htmlspecialchars($_POST['contentAdd']));
                    $dateTimeAdd = date('d/m/Y à H:i');
                    $insertNew = $db->prepare('INSERT INTO news(title, content, date_publication, id_user) VALUES(:title, :content, :date_publication, :id_user)');
                    $insertNew->execute(array(
                        'title'             => $titleAdd,
                        'content'           => $contentAdd,
                        'date_publication'  => $dateTimeAdd,
                        'id_user'           => $userInfo['id']
                    ));
                    $redirect = $db->query('SELECT id FROM news WHERE title = "'.$titleAdd.'"');
                    header('Location: news.php?id='.$redirect);
                } else {
                    $error = "Le titre ne doit pas dépasser 80 caractères.";
                }
            } else {
                $error = "Tous les champs doivent être renseignés.";
            }
        }
    }
?>
<title><?= $infosSite['websiteName']; ?> - Créer/Modifier une news</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">
        <form method="POST" action="">
            <input type="text" name="titleAdd" id="titleAdd" placeholder="Entrez le titre de l'article" value="<?php if(isset($news['title'])) { echo $news['title']; } ?>">
            <textarea class="areaWidth" rows="10" name="contentAdd" style="width: 100%;"><?php if(isset($_POST['contentAdd'])) { echo $_POST['contentAdd']; } if(isset($news['content'])) { $test = str_replace("<br />", '', $news['content']); echo $test; } ?></textarea>
            <input type="submit" name="formAddNews" value="Publier l'article">
        </form>
        <div class="error">
            <?php if(isset($error)){
                echo $error;
            }
            ?>
        </div>
    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        - Le titre doit faire 80 caractères MAXIMUM !<br />
        - Attention aux fautes d'orthographes !<br />
        - Pas de propos racistes ou insultants. <br />
        - Pas de message haineux ...<br />
        - .... <br />
    </div>
    <div class="btnAddNewsRetour">
        <a href="addNews.php">Retour</a>
    </div>
</div>


<?php include('includes/footer.php'); // Pied de page ?> 