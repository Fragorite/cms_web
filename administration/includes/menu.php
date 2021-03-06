
<?php include('includes/secure.php'); ?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../css/connexion.css">
<link rel="stylesheet" href="../css/menu.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/66ccac3552.js" crossorigin="anonymous"></script>
<title><?= $infosSite['websiteName']; ?> - Administration</title>

<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="news.php">Article</a></li>
    <li><a href="">Tchat</a>
      <ul class="submenu">
        <li><a href="chat.php">Afficher</a></li>
      </ul></li>
    <li><a href="forum.php">Forum</a>
    </li>
    <li><a href="">Gestion du site</a>
      <ul class="submenu">
        <li><a href="changeTemplate.php">Template</a></li>
        <li><a href="changeName.php">Nom du site</a></li>
      </ul></li>
    <li><a href="../index.php">Retour</a></li>
  </ul>
</nav>