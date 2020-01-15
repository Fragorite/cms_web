<?php session_start();
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
?>