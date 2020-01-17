<?php include('../includes/config.php'); // Configuration générale ?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        <div class="success"><?php if(isset($_GET['templateChoice']) && $_GET['templateChoice'] == 1) { echo $changeTemplateSuccess; } ?></div>
        <h1>Bienvenue sur le panel administrateur <div class="error"><?= $userInfo['username']; ?></div></h1>
        <p>
            Grâce à ce panel, vous pouvez :<br/>
            - Changer le template principal,<br />
            - Changer le nom de votre site,<br />
            - Gérer les articles (news),<br />
            - Gérer le chat (messages et utilisateurs),<br />
            - Gérer le forum.<br />
            <br />
            <b>Bonne visite !</b>
        </p>
    </div>
</header>


