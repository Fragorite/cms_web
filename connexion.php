<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connexion</title>
        <meta name="description" content="Page de connexion au super mortel CMS.">
        <link rel="stylesheet" href="connexion.css">
         
    </head>
    <body>
        <div class="container">
            <h1>Connexion</h1>
                <form action="" method="get" class="connexion">
                    <div class="formConnexion">
                        <label for="userNameConnect">Entrez votre nom: </label>
                            <input type="text" name="userNameConnect" id="userNameConnect" required>
                    </div>
                    <div class="formPassWord">
                        <label for="passWord">Entrez votre mot de passe :</label>
                        <input type="password" name="passWordConnect" id="passWord" required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="Envoyer" name="formConnect">
                    </div>
                </form>
            </div>
            <div>
            <h1>Inscription</h1>
                <form action="" method="get" class="connexion">
                    <div class="formConnexion">
                        <label for="userNameConnect">Entrez votre nom: </label>
                            <input type="text" name="userNameConnect" id="userNameConnect" required>
                    </div>
                    <div class="formConnexion">
                        <label for="email">Entrez votre email: </label>
                            <input type="email" name="emailRegister" id="email" required>
                    </div>
                    <div class="formPassWord1">
                        <label for="passWord1">Entrez votre mot de passe :</label>
                        <input type="password" name="passWordRegister1" id="passWord1" required>
                    </div>
                    <div class="formPassWord2">
                        <label for="passWord2">Vérifiez votre mot de passe :</label>
                        <input type="password" name="passWordRegister2" id="passWord2" required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="Envoyer" name="formRegister">
                    </div>
                </form>
            </div>
    </body>