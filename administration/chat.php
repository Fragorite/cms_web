<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    $messagesPerPage = 20;
    $messagesAllsReq = $bdd->query('SELECT id FROM chat_messages');
    $messagesCount = $messagesAllsReq->rowCount();
    $totalPages = ceil($messagesCount/$messagesPerPage);
    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
    $_GET['page'] = intval($_GET['page']);
    $currentPage = $_GET['page'];
    } else {
    $currentPage = 1;
    }
    $depart = ($currentPage-1)*$messagesPerPage;
?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        
    </div>
</header>


