<?php include('../includes/config.php'); // Configuration générale ?>

<?php
    $searchWebsiteConfig = $db->query('SELECT * FROM website');
    $websiteConfig = $searchWebsiteConfig->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['formTemplateChange'])){
        if(!empty($_POST['templateChoice'])){
            if(($websiteConfig['template'] == 1 && $_POST['templateChoice'] == "tmp1") || ($websiteConfig['template'] == 2 && $_POST['templateChoice'] == "tmp2")){
                $error = "Vous devez choisir un template différent de l'actuel.";
            } else {
                if($_POST['templateChoice'] == "tmp1"){
                    $tmp = 1;
                } else {
                    $tmp = 2;
                }
                $updateWebsiteConfig = $db->query('UPDATE website SET template = "'.$tmp.'"');
                header('Location: index.php?templateChoice=1');
            }
        } else {
            $error = "Vous devez sélectionner un template.";
        }
    }

?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        <h1>Changer le template</h1>
        <p>
            <form method="POST">
            <center>
                <div class="error"><?php if(isset($error)){ echo $error; } ?></div>
                <table>
                    <tr>
                        <td><b>TEMPLATE 1</b></td>
                        <td><b>TEMPLATE 2</b></td>
                    </tr>
                    <tr>
                        <td><img src="../img/template1.jpg" width="400px" height="350px"></td>
                        <td><img src="../img/template2.jpg" width="400px" height="350px"></td>
                    </tr>
                    <tr>

                        <td><input type="radio" name="templateChoice" value="tmp1"></td>
                        <td><input type="radio" name="templateChoice" value="tmp2"></td>
                    </tr>
                <table>
                <input type="submit" name="formTemplateChange" value="Mettre à jour">
            </form>
            </center>
        </p>
    </div>
</header>


