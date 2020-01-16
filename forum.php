<?php include('includes/header.php'); // Haut de page ?>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idSubject = intval($_GET['id']);
        $searchExist = $db->query('SELECT * FROM frm_subjects WHERE id = "'.$idSubject.'"');
        $subjectExist = $searchExist->rowCount();
        if($subjectExist == 1){
            $infosSubject = $searchExist->fetch(PDO::FETCH_ASSOC);
            $searchAnswers = $db->query('SELECT * FROM frm_answers WHERE id_subject = "'.$idSubject.'"');
            $searchAuthorSubject = $db->query('SELECT * FROM users WHERE id = "'.$infosSubject['id_user'].'"');
            $authorSubject = $searchAuthorSubject->fetch(PDO::FETCH_ASSOC);
            $countAnswers = $searchAnswers->rowCount();
            if(isset($_POST['formAnswerAdd'])){
                if(!empty($_POST['contentAnswerAdd'])){
                    $contentAnswer = nl2br(htmlspecialchars($_POST['contentAnswerAdd']));
                    $dateTimeAdd = date('d/m/Y à H:i');
                    $userAdd = $userInfo['id'];
                    $insertDB = $db->prepare('INSERT INTO frm_answers(content, date_publication, id_user, id_subject) VALUES (:content, :date_publication, :id_user, :id_subject)');
                    $insertDB->execute(array(
                        'content'           => $contentAnswer,
                        'date_publication'  => $dateTimeAdd,
                        'id_user'           => $userAdd,
                        'id_subject'        => $idSubject
                    ));
                    header('Location: forum.php?id='.$idSubject.'&answerAddSuccess=1');
                } else {
                    $error = "Vous devez remplir tous les champs.";
                }
            }
            if(isset($_GET['delete']) && !empty($_GET['delete'])){
                if($userInfo['id'] == $authorSubject['id']){
                    $deleteSubject = $db->query('DELETE FROM frm_subjects WHERE id = "'.$idSubject.'"');
                    $deleteAnswers = $db->query('DELETE FROM frm_answers WHERE id_subject = "'.$idSubject.'"');
                    header('Location: forum.php?id=1&delete=1');
                } else {
                    header('Location: ?id='.$idSubject.'&functionDenied=1');
                }
            }
            if(isset($_GET['answerDeleteId']) && !empty($_GET['answerDeleteId'])){
                $answerId = intval($_GET['answerDeleteId']);
                $select = $db->query('SELECT * FROM frm_answers WHERE id = "'.$answerId.'"');
                $selectFetch = $select->fetch(PDO::FETCH_ASSOC);
                if($userInfo['id'] == $selectFetch['id_user']){
                    $deleteAnswers = $db->query('DELETE FROM frm_answers WHERE id = "'.$answerId.'"');
                    header('Location: forum.php?id=1&deleteAnswer=1');
                } else {
                    header('Location: ?id='.$idSubject.'&functionDenied=1');
                }
            }
        }
    }
    $searchSubject = $db->query('SELECT * FROM frm_subjects');

?>

<title><?= $infosSite['websiteName']; ?> - Forum</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">
        <div class="error"><?php if(isset($_GET['functionDenied']) && $_GET['functionDenied'] == 1) { echo $functionDenied; } ?></div>
        <div class="success">
            <?php if(isset($_GET['answerAddSuccess']) && $_GET['answerAddSuccess'] == 1) { echo $answerAddSuccess; } ?>
            <?php if(isset($_GET['deleteAnswer']) && $_GET['deleteAnswer'] == 1) { echo $deleteAnswerSuccess; } ?>
            <?php if(isset($_GET['delete']) && $_GET['delete'] == 1) { echo $deleteSubjectSuccess; } ?>
            <?php if(isset($_GET['update']) && $_GET['update'] == 1) { echo $updateSubjectSuccess; } ?>
        </div>
        <?php if(isset($_GET['id'])){ ?>
        <h1>Sujet</h1>
        <h3><?= $infosSubject['title']; ?></h3>
        <p><?= $infosSubject['content']; ?></p><br />
        <div class="author">
            <?php
            if(isset($userInfo['id']) && $userInfo['id'] == $authorSubject['id']){
            ?>
            <a href="addSubject.php?id=<?= $idSubject; ?>">Modifier</a> | <a href="?id=<?= $idSubject; ?>&delete=1">Supprimer</a>
            <br />
            <?php } ?>
            <br/>
            Rédigé par <b><?= $authorSubject['username']; ?></b> le <b><?= $infosSubject['date_publication']; ?></b>
        </div>
        <hr>
        <h2>Réponses</h2>
        <?php
            if($countAnswers == 0){
                echo "Encore aucune réponse pour le moment ...<br/>Soyez le premier à répondre à ce topic !";
            } else {
                while($answer = $searchAnswers->fetch(PDO::FETCH_ASSOC)){
                    $searchAuthorAnswer = $db->query('SELECT * FROM users WHERE id = "'.$answer['id_user'].'"');
                    $authorAnswer = $searchAuthorAnswer->fetch(PDO::FETCH_ASSOC);
        ?>
            <fieldset>
                <?= $answer['content']; ?>
                <br />
                <div class="author">
                    <?php 
                        if(isset($userInfo['id']) && $userInfo['id'] == $authorAnswer['id']){
                    ?>
                    <a href="#">Modifier</a> | <a href="forum.php?id=<?= $idSubject; ?>&answerDeleteId=<?= $answer['id']; ?>">Supprimer</a><br />
                    <?php
                        }
                    ?>
                    Réponse de <b><?= $authorAnswer['username']; ?></b> le <b><?= $answer['date_publication']; ?></b>
                </div>
            </fieldset>
            <br />
        <?php
                }
            }
        ?>
        <br />
        <?php
            if(isset($userInfo['id'])){
        ?>
        <hr>
        <h2>Répondre à ce topic</h>
        <form method="POST">
            <textarea rows="10" name="contentAnswerAdd" style="width: 100%;"></textarea>
            <input type="submit" value="Répondre" name="formAnswerAdd">
        </form>
        <?php
            }
        ?>
        <?php } else { ?>
            Aucun sujet n'a encore été créé ... <br />
            <b>Soyez le premier à en créer un !</b><br />
            <a href="addSubject.php">Créer un article</a>
        <?php } ?>
    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDARE -->
    <div class="secondBlock">
        
        
        <div class="btnAddTopic">
            <?php
            while($subjects = $searchSubject->fetch(PDO::FETCH_ASSOC)){
        ?>
            <a class="btnAddTopic" href="?id=<?= $subjects['id']; ?>" ><?= $subjects['title']; ?></a><br />
        <?php
            }
        ?>
        <hr>
            <a href="">Créer un sujet</a><br/>
        
            <a href="index.php">Retour</a>
        </div>
    </div>
   
</div>

<?php include('includes/footer.php'); // Pied de page ?> 