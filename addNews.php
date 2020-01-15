<?php include('includes/header.php'); // Haut de page ?>

<?php
    if(isset($_POST['formAddNews'])){
        if(!empty($_POST['titleAdd']) && !empty($_POST['contentAdd'])){
            $titleAdd = $_POST['titleAdd'];
            $contentAdd = $_POST['contentAdd'];
            $dateTimeAdd = date('d/m/Y à H:i');
            $insertNew = $db->prepare('INSERT INTO news(title, content, date_publication, id_user) VALUES(:title, :content, :date_publication, :id_user)');
            $insertNew->execute(array(
                'title'             => $titleAdd,
                'content'           => $contentAdd,
                'date_publication'  => $dateTimeAdd,
                'id_user'           => $userInfo['id']
            ));
        } else {
            $error = "Tous les champs doivent être renseignés.";
        }
    }
?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<?php 
    if(isset($userInfo['id'])){ 
?>
<title><?= $infosSite['websiteName']; ?> - Créer une news</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">
        <form method="POST" action="">
            <input type="text" name="titleAdd" id="titleAdd" placeholder="Entrez le titre de l'article">
            <textarea rows="10" name="contentAdd" style="width: 100%;"></textarea>
            <input type="submit" name="formAddNews" value="Publier l'article">
        </form>
    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        - Attention aux fautes d'orthographes !<br />
        - Pas de propos racistes ou insultants. <br />
        - Pas de message haineux ...<br />
        - .... <br />
    </div>
</div>


<?php include('includes/footer.php'); // Pied de page ?> 
<?php 
    } else {
        header('Location: index.php');
    }
?>