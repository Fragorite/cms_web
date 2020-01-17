<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    $messagesPerPage = 20;
    if(isset($_POST['formMessageAdd'])){
        if(!empty($_POST['contentAdd'])){
            if(strlen($_POST['contentAdd']) < 255){
                $contentAdd = htmlspecialchars($_POST['contentAdd']);
                $userAdd = $userInfo['id'];
                $dateAdd = date('d/m/Y à H:i');
                $insert = $db->prepare('INSERT INTO chat_messages(content, date_publication, id_user) VALUES (:content, :date_publication, :id_user)');
                $insert->execute(array(
                    'content'           => $contentAdd,
                    'date_publication'  => $dateAdd,
                    'id_user'           => $userAdd
                ));
            } else {
                $error = "Votre message est trop long ! (255 caractères maximum)";
            }
        } else {
            $error = "Vous devez rentrer un message.";
        }
    }
    if(isset($_GET['delete']) && !empty($_GET['delete'])){
        $messageId = intval($_GET['delete']);
        $searchMessage = $db->query('SELECT * FROM chat_messages WHERE id = "'.$messageId.'"');
        $messageCount = $searchMessage->rowCount();
        if($messageCount == 1){
            $deleteMessage = $db->query('DELETE FROM chat_messages WHERE id = "'.$messageId.'"');
            header('Location: chat.php?deleted=1');
        }
    }
    $messagesPerPage = 10;
    $messagesAllsReq = $db->query('SELECT id FROM chat_messages');
    $messagesCount = $messagesAllsReq->rowCount();
    $totalPages = ceil($messagesCount/$messagesPerPage);
@ -14,23 +42,42 @@
    $launch = ($currentPage-1)*$messagesPerPage;
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#chat').load('chat.php #chat').fadeIn("slow");
}, 1000); // REFRESH (en millisecondes)
</script>

<header class="headerMenu">

    <?php include('includes/menu.php'); ?>
</header>

    <div class="container">
        <p><div class="success"><?php if(isset($_GET['deleted']) && !empty($_GET['deleted'])) { echo $deleteMessageSuccess; } ?></div></p>
        <p>
            <form method="POST">
                <input type="text" name="contentAdd" placeholder="Entrez votre message ..."/>
                <input type="submit" name="formMessageAdd" value="Envoyer"/>
            </form>
        </p>
        <div id="chat" class="firstBlock">
           
            <?php
                $searchMessages = $db->query('SELECT * FROM chat_messages ORDER BY id DESC LIMIT '.$launch.','.$messagesPerPage);
                while($messages = $searchMessages->fetch(PDO::FETCH_ASSOC)){
                    $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$messages['id_user'].'"');
                    $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
            ?>
                <p>
                <fieldset>
                    <legend>
                        <b><?= $messages['date_publication']; ?></b>
                        
                    </legend>
                    <b><?= $author['username']; ?> : </b><?= $messages['content']; ?> <a href="?delete=<?= $messages['id']; ?>"><i class="fas fa-times" style="color: red"></i></a>
                    <?php if($author['admin'] > 0) { echo '<b><div style="color: red; display: inline-block">[ADMIN]'.$author['username']; } ?> : <?= $messages['content']; ?></div></b> <a href="?delete=<?= $messages['id']; ?>"><i class="fas fa-times" style="color: red"></i></a>
                </fieldset>
                </p>
            <?php
                }
            ?>

                    }
                }
            ?>
        </p>
        </div>
    </div>
</header>
