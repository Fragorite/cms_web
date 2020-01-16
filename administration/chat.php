<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    $messagesPerPage = 20;
    $messagesAllsReq = $db->query('SELECT id FROM chat_messages');
    $messagesCount = $messagesAllsReq->rowCount();
    $totalPages = ceil($messagesCount/$messagesPerPage);
    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
        $_GET['page'] = intval($_GET['page']);
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }
    $launch = ($currentPage-1)*$messagesPerPage;
?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        <?php
            $searchMessages = $db->query('SELECT * FROM chat_messages ORDER BY id DESC LIMIT '.$launch.','.$messagesPerPage);
            while($messages = $searchMessages->fetch(PDO::FETCH_ASSOC)){
                $searchAuthor = $db->query('SELECT * FROM users WHERE id = "'.$messages['id_user'].'"');
                $author = $searchAuthor->fetch(PDO::FETCH_ASSOC);
        ?>
            <fieldset>
                <legend>
                    <b><?= $messages['date_publication']; ?></b>
                </legend>
                <b><?= $author['username']; ?> : </b><?= $messages['content']; ?>
            </fieldset>
        <?php
            }
        ?>
        <?php
            for($i=1;$i<=$totalPages;$i++) {
                if($i == $currentPage) {
                    echo $i.' ';
                } else {
                    echo '<a href="chat.php?page='.$i.'">'.$i.'</a> ';
                }
            }
        ?>
    </div>
</header>


