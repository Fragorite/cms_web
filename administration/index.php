<?php include('../includes/config.php'); // Configuration générale ?>

<div class="chatAdmin">
<header class="header">
    <?php include('includes/menu.php'); ?>
</header>
    <div class="container adapteTaille">
        <div class="success">  
                <?php if(isset($_GET['nameUpdate']) && $_GET['nameUpdate'] == 1) { echo $changeNameSuccess; } ?>
                <?php if(isset($_GET['templateChoice']) && $_GET['templateChoice'] == 1) { echo $changeTemplateSuccess; } ?>
            </div>
        <div class="firstBlock">
            
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
 </div>
   
</div>



