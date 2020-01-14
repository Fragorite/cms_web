<?php
    include('includes/config.php');
    if(isset($_POST['formConnect'])){
        if(!empty($_POST['userNameConnect']) && !empty($_POST['passWordConnect'])){
            $userNameConnect = $_POST['userNameConnect'];
            $passWordConnect = md5($_POST['passwordConnect']);
            $search = $db->query('SELECT * FROM users WHERE username = "'.$userNameConnect.'"');
            $userExist = $search->rowCount();
            if($userExist == 1){
                $user = $search->fecth(PDO::FETCH_ASSOC);
                if($user['password'] == $passWordConnect){
                    $_SESSION['id'] == $user['id'];
                    header('Location: index.php');
                } else {
                    $error = "Identifiants invalides.";
                }
            } else {
                $error = "Ce compte n'existe pas.";
            }
        } else {
            $error = "Vous devez remplir tout le formulaire";
        }
    }

    if(isset($_POST['formRegister'])){
        if(!empty($_POST['userNameRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['passWordRegister1']) && !empty($_POST['passWordRegister2'])){
            $userNameRegister = $_POST['userNameRegister'];
            $emailRegister = $_POST['emailRegister'];
            $passWordRegister1 = $_POST['passWordRegister1'];
            $passWordRegister2 = $_POST['passWordRegister2'];
            $searchMail = $db->query('SELECT * FROM users WHERE mail = "'.$emailRegister.'"');
            $mailExist = $searchMail->rowCount();
            if($mailExist == 0){
                $searchUserName = $db->query('SELECT * FROM users WHERE username = "'.$userNameRegister.'"');
                $userNameExist = $searchUserName->rowCount();
                if($userNameExist == 0){
                    if($passWordRegister1 == $passWordRegister2){
                        $crypt = md5($passWordRegister1);
                        $addUser = $db->prepare('INSERT INTO users(mail, username, password) VALUES(:mail, :username, :password)');
                        $addUser->execute(array(
                            'mail' => $emailRegister,
                            'username' => $userNameRegister,
                            'password' => $crypt
                        ));
                        header('Location: index.php');
                    } else {
                        $error = "Les mots de passes ne correspondent pas !";
                    }
                } else {
                    $error = "Ce nom d'utilisateur est déjà utilisé !";
                }
            } else {
                $error = "Cette adresse email est déjà utilisée.";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connexion</title>
        <meta name="description" content="Page de connexion au super mortel CMS.">
        <link rel="stylesheet" href="css/connexion.css">
         <link href="https://fonts.googleapis.com/css?family=Raleway:400,600&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="main">
            <?php
                if(!isset($_GET['registred'])){
            ?>
            <div class="container">
                <h1>Connexion</h1>
                <form action="" method="POST" class="connexion">
                    <div class="formConnexion">
                        <label for="userNameConnect" ></label>
                            <input type="text" name="userNameConnect" placeholder="Entrez votre nom" id="userNameConnect" required>
                    </div>
                    <div class="formPassWord">
                        <label for="passWord"></label>
                        <input type="password" name="passWordConnect" placeholder="Entrez votre mot de passe" id="passWord" required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="Envoyer" name="formConnect">
                    </div>
                </form>
            </div>
            <div class="form-example">
                <a href="?registred=0">Inscrivez-vous!</a>
            </div>
            <?php
                } else {
            ?>
            <div class="container">
                <h1>Inscription</h1>

                <form action="" method="POST" class="connexion">
                    <div class="formConnexion">
                        <label for="userNameConnect"></label>
                            <input type="text" name="userNameRegister" id="userNameConnect" placeholder="Entrez votre Nom" required>
                    </div>
                    <div class="formConnexion">
                        <label for="email"></label>
                            <input type="email" name="emailRegister" id="email" placeholder="Entrez votre Email" required>
                    </div>
                    <div class="formPassWord1">
                        <label for="passWord1"></label>
                        <input type="password" name="passWordRegister1" id="passWord1" placeholder="Entrez votre mot de passe" required>
                    </div>
                    <div class="formPassWord2">
                        <label for="passWord2"></label>
                        <input type="password" name="passWordRegister2" id="passWord2" placeholder="Vérifiez votre mot de passe"required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="Envoyer" name="formRegister">
                    </div>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
        <?php if(isset($error)) { echo $error; } ?>
    </body>
</html>