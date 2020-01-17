<?php include('../includes/config.php'); // Configuration générale ?>

<?php

    $searchWebsiteConfig = $db->query('SELECT * FROM website');
    $websiteConfig = $searchWebsiteConfig->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['formNameUpdate'])){
        if(!empty($_POST['nameUpdate'])){
            if(strlen($_POST['nameUpdate']) < 50){
                $newName = htmlspecialchars($_POST['nameUpdate']);
                $update = $db->query('UPDATE website SET websiteName = "'.$newName.'"');
                header('Location: index.php?nameUpdate=1');
            } else {
                $error = "Le nom défini est trop long ! (50 caractères maximum)";
            }
        } else {
            $error = "Vous devez rentrer obligatoirement un nom !";
        }
    }

?>
<div class="chatAdmin">
<header class="headerMenu">
    <?php include('includes/menu.php'); ?>
</header>
    <div class="container adapteTaille">
        <h1>Changer le nom du site</h1>
        <?php if(isset($error)) { echo $error; } ?>
        <form method="POST">
            <input type="text" value="<?= $websiteConfig['websiteName']; ?>" name="nameUpdate" required=""/>
            <input type="submit" value="Mettre à jour" name="formNameUpdate"/>
        </form>
    </div>
</div>


