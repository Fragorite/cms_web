<?php include('includes/config.php'); // Configuration générale ?> 
<?php include('includes/header.php'); // Haut de page ?>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idSubject = intval($_GET['id']);
        $searchExist = $db->query('SELECT * FROM frm_subjects WHERE id = "'.$idSubject.'"');
        $subjectExist = $searchExist->rowCount();
        if($subjectExist == 1){
            $infosSubject = $searchExist->fetch(PDO::FETCH_ASSOC);
            $searchAnswers = $db->query('SELECT * FROM frm_answers WHERE id_subject = "'.$idSubject.'"');
            $answer = $searchAnswers->fetch(PDO::FETCH_ASSOC);
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

    <?php
        if($infosSite['template'] == 1) {
            $firstBlock = "rightBlock";
            $secondBlock = "leftBlock";
        }
        if($infosSite['template'] == 2){
            $firstBlock = "leftBlock";
            $secondBlock = "rightBlock";
        }
    ?>
    <!-- CONTENU GLOBAL -->
    <div class="<?= $firstBlock; ?>">
        <h1><?= $infosSubject['title']; ?></h1>
        <p><?= $infosSubject['content']; ?></p>

    </div>
    <!-- --------------------- -->
    <!-- MENU DROITE OU GAUCHE -->
    <div class="<?= $secondBlock ?>">

    </div>
</div>

<?php include('includes/footer.php'); // Pied de page ?> 