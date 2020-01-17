<?php include('includes/header.php'); // Haut de page ?>

<?php

    if(!isset($userInfo['id'])){
        header('Location: connexion.php?accessDenied=1');
    }
    if(isset($_POST['formAddMessage'])){
        if(!empty($_POST['contentAdd'])){
            if(strlen($_POST['contentAdd']) < 255){

            } else {
                $error = "Votre message est trop long !";
            }
            $contentAdd = htmlspecialchars($_POST['contentAdd']);
            $dateAdd = date('d/m/Y à H:i');
            $userAdd = $userInfo['id'];
            $insert = $db->prepare('INSERT INTO chat_messages(content, date_publication, id_user) VALUES (:content, :date_publication, :id_user)');
            $insert->execute(array(
                'content'           => $contentAdd,
                'date_publication'  => $dateAdd,
                'id_user'           => $userAdd
            ));
        }
    }

?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#chat').load('chat.php #chat').fadeIn("slow");
}, 1000); // REFRESH (en millisecondes)

var auto_refresh = setInterval(
function ()
{
$('#usersConnected').load('chat.php #usersConnected').fadeIn("slow");
}, 1000); // REFRESH (en millisecondes)
</script>

<title><?= $infosSite['websiteName']; ?> - Chat</title>

<div class="container">
    <!-- CONTENU GLOBAL -->
    <div class="firstBlock">
        <div class="error"><?php if(isset($error)) { echo $error; } ?></div>
        <form method="POST">
            <input type="text" name="contentAdd" placeholder="Votre message ici ..">
            <input type="submit" name="formAddMessage" value="Envoyer">
        </form>
        <hr>
        <div id="chat" class="firstBlock">
        
            <?php
                $searchChatMessages = $db->query('SELECT * FROM chat_messages ORDER BY id DESC');
                while($chatMessage = $searchChatMessages->fetch(PDO::FETCH_ASSOC)){
                    $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$chatMessage['id_user'].'"');
                    $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
            ?>
            <fieldset class="monTest">
                <legend>
                    <b><?= $chatMessage['date_publication']; ?></b>
                </legend>
                <?php if($author['admin'] > 0) { echo '<b><div style="color:red; display: inline-block">[ADMIN] '.$author['username']; } else { echo '<b>'.$author['username'].'</b>'; } ?> : <?= $chatMessage['content']; ?></b>
            </fieldset>
            <?php
                }
            ?>
        </div></div>
   
    <!-- --------------------- -->

    <!-- CONTENU SECONDAIRE -->
    <div class="secondBlock">
        <div id="usersConnected">
            <b><u>Utilisateurs connectés :</u></b><br/>
            <?php
                $searchUsers = $db->query('SELECT * FROM users WHERE connected = 1 ORDER BY username');
                while($userConnected = $searchUsers->fetch(PDO::FETCH_ASSOC)){
                    if($userConnected['admin'] != 0) {
                        echo '<b><font color=red>[ADMIN] '.$userConnected['username'].'</font></b><br/>';
                    } else {
                        echo '<b>'.$userConnected['username'].'</b><br/>';
                    }
                }
            ?>
        </div>
    </div>
</div>
 

<?php include('includes/footer.php'); // Pied de page ?> 