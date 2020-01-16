<?php include('includes/header.php'); // Haut de page ?>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idSubject = intval($_GET['id']);
        $searchExist = $db->query('SELECT * FROM frm_subjects WHERE id = "'.$idSubject.'"');
        $subjectExist = $searchExist->rowCount();
        if($subjectExist == 1){
            $infosSubject = $searchExist->fetch(PDO::FETCH_ASSOC);
            $searchAnswers = $db->query('SELECT * FROM frm_answers WHERE id_subject = "'.$idSubject.'" ORDER BY id ASC');
            $countAnswers = $searchAnswers->rowCount();
        } else {
            header('Location: ?id=1');
        }
    } else {
        header('Location: ?id=1');
    }
    $searchSubject = $db->query('SELECT * FROM frm_subjects');
    $subjects = $searchSubject->fetch(PDO::FETCH_ASSOC);

?>

<title><?= $infosSite['websiteName']; ?> - Forum</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">
        <h1>Sujet</h1>
        <h3><?= $infosSubject['title']; ?></h3>
        <p><?= $infosSubject['content']; ?></p><br />
        <hr>
        <h2>Réponses</h2>
        <?php
            if($countAnswers == 0){
                echo "Encore aucune réponse pour le moment ...<br/>Soyez le premier à répondre à ce topic !";
            } else {
                while($answer = $searchAnswers->fetch(PDO::FETCH_ASSOC)){
                    $authorAnswer = $db->query('SELECT username FROM users WHERE id = "'.$answer['id_user'].'"');
        ?>
            <fieldset>
                <?= $answer['content']; ?>
                <br />
                <div class="author">Réponse de <b><?= $authorAnswer['username']; ?></b> le <b><?= $answer['date_publication']; ?></b></div>
            </fieldset>
        <?php
                }
            }
        ?>

    </div>
    <!-- --------------------- -->

    <!-- CONTENU SECONDARE -->
    <div class="secondBlock">

    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 