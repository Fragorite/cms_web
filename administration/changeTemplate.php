<?php include('../includes/config.php'); // Configuration générale ?>

<header class="headerMenu">
    <?php include('includes/menu.php'); ?>

    <div class="container">
        <h1>Changer le template</h1>
        <p>
            <form method="POST">
            <center>
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


