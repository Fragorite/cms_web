<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idSubject = intval($_GET['id']);
        $searchSubjectInfos = $db->query('SELECT * FROM frm_subjects WHERE id = "'.$idSubject.'"');
        $subjectExist = $searchSubjectInfos->rowCount();
        if($subjectExist == 1){
            $subject = $searchSubjectInfos->fetch(PDO::FETCH_ASSOC);
            $searchAnswers = $db->query('SELECT * FROM frm_answers WHERE id_subject = "'.$idSubject.'"');
            $countAnswers = $searchAnswers->rowCount();
            $searchSubjectAuthor = $db->query('SELECT * FROM users WHERE id = "'.$subject['id_user'].'"');
            $authorSubject = $searchSubjectAuthor->fetch(PDO::FETCH_ASSOC);
            if(isset($_POST['formAnswerAdd'])){
                if(!empty($_POST['contentAnswerAdd'])){
                    $contentAdd = htmlspecialchars($_POST['contentAnswerAdd']);
                    $dateAdd = date('d/m/Y à H:i');
                    $userAdd = $userInfo['id'];
                    $insertAnswer = $db->prepare('INSERT INTO frm_answers(content,date_publication,id_user,id_subject) VALUES (:content,:date_publication,:id_user,:id_subject)');
                    $insertAnswer->execute(array(
                        'content'               => $contentAdd,
                        'date_publication'      => $dateAdd,
                        'id_user'               => $userAdd,
                        'id_subject'            => $idSubject
                    ));
                    header('Location: ?id='.$idSubject.'&answerAddSuccess=1');
                } else {
                    $error = "Vous devez remplir le champs pour poster une réponses !";
                }
            }
        } else {
            header('Location: forum.php');
        }
    } else {
        $allSubjects = $db->query('SELECT * FROM frm_subjects');
    }
?>
<div class="chatAdmin">

<header class="header">
    <?php include('includes/menu.php'); ?>
</header>
    <div class="container adapteTaille">
        <?php 
            if(isset($_GET['id']) && !empty($_GET['id'])){
        ?>
            <div class="success">
                <?php if(isset($_GET['answerAddSuccess']) && $_GET['answerAddSuccess'] == 1) { echo $answerAddSuccess; } ?>
            </div>
            <h1>Sujet</h1>
            <h3><?= $subject['title']; ?></h3>
            <p><?= $subject['content']; ?></p><br />
            <div class="author">
                <?php
                if(isset($userInfo['id']) && $userInfo['id'] == $authorSubject['id']){
                ?>
                <a href="#">Modifier</a> | <a href="?id=<?= $idSubject; ?>&delete=1">Supprimer</a>
                <br />
                <?php } ?>
                <br/>
                Rédigé par <b><?= $authorSubject['username']; ?></b> le <b><?= $subject['date_publication']; ?></b>
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
                        <a href="forum.php?id=<?= $idSubject; ?>&answerDeleteId=<?= $answer['id']; ?>">Supprimer</a><br />
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

            } else {
                while($subjectsFetch = $allSubjects->fetch(PDO::FETCH_ASSOC)){
                    $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$subjectsFetch['id_user'].'"');
                    $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
        ?>
            <fieldset>
                <legend>
                    Auteur : <b><?= $author['username']; ?></b>
                </legend>
                <a href="?id=<?= $subjectsFetch['id']; ?>"><?= $subjectsFetch['title']; ?></a>
            </fieldset>
        <?php
                }
            }
        ?>
    </div>



