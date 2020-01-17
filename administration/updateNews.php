<?php include('../includes/config.php'); // Configuration générale ?>

<?php 
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idNews = intval($_GET['id']);
        $searchNews = $db->query('SELECT * FROM news WHERE id = "'.$idNews.'"');
        $newsExist = $searchNews->rowCount();
        if($newsExist == 1){
            $news = $searchNews->fetch(PDO::FETCH_ASSOC);
            if(isset($_POST['formUpdateNews'])){
                if(!empty($_POST['contentAdd']) && !empty($_POST['titleAdd'])){
                    $titleAdd = htmlspecialchars($_POST['titleAdd']);
                    if(strlen($titleAdd) < 100){
                        $contentAdd = nl2br(htmlspecialchars($_POST['contentAdd']));
                        $update = $db->prepare('UPDATE news SET title = :title, content = :content WHERE id = :id');
                        $update->execute(array(
                            'title'         => $titleAdd,
                            'content'       => $contentAdd,
                            'id'            => $idNews
                        ));
                        header('Location: news.php?id='.$idNews.'&updateNews=1');
                    } else {
                        $error = "Le titre est trop long ! (100 caractères maximum)";
                    }
                } else {
                    $error = "Vous devez remplir tous les champs.";
                }
            }
        } else {
            header('Location: news.php');
        }
    } else {
        header('Location: news.php');
    }

?>
<div class="chatAdmin">
<header class="headerMenu">
    <?php include('includes/menu.php'); ?>
</header>
    <div class="container adapteTaille">
        <h1>Modifier une news</h1>
        <form method="POST">
            <input type="text" name="titleAdd" value="<?= $news['title']; ?>" placeholder="Entrez le titre">
            <textarea class="areaWidth" rows="10" name="contentAdd" style="width: 100%;"><?php if(isset($_POST['contentAdd'])) { echo $_POST['contentAdd']; } if(isset($news['content'])) { $content = str_replace("<br />", '', $news['content']); echo $content; } ?></textarea>
            <input type="submit" value="Modifier" name="formUpdateNews">
        </form>
    </div>
</div>


