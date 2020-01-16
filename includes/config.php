<?php
    if(!session_id())
    {
        session_start();
    }
    $userNameDb = "root";   // Nom d'utilisateur de la base de donnée
    $passWordDb = "";       // Mot de passe de la base de donnée

    try {
        $db = new PDO('mysql:host=localhost;dbname=cms_web', $userNameDb, $passWordDb);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    
    if(isset($_SESSION['id'])){
        $search = $db->query('SELECT * FROM users WHERE id = "'.$_SESSION['id'].'"');
        $userInfo = $search->fetch(PDO::FETCH_ASSOC);
    }

    $searchInfos = $db->query('SELECT * FROM website');
    $infosSite = $searchInfos->fetch(PDO::FETCH_ASSOC);

    if($infosSite['init'] == 0){
        header('Location: installation/index.php');
    }

    if(isset($_GET['disconnect']) && $_GET['disconnect'] == 1){
        session_destroy();
        header('Location: connexion.php');
    }

    // LES SUCCESS
    $deleteNewsSuccess = "L'article a bien été supprimé.";
    $updateNewsSuccess = "L'article a été mis à jour.";

    $deleteSubjectSuccess = "Le topic a bien été supprimé.";
    $updateSubjectSuccess = "Le topic a été mis à jour.";

    $createAccountValid = "Le compte a été créé. Vous pouvez désormais vous connecter.";

    $accessDenied = "Vous devez vous connecter pour accéder à cette fonctionnalité.";

    $forbidden = "Vous n'avez pas accès à cette page.";

    $answerAddSuccess = "Votre réponse a bien été ajoutée.";

    $functionDenied = "Vous n'avez pas accès à cette fonctionnalité.";
?>