<?php
$nom= null;
if(!empty($_GET['action']) && $_GET ['action'] == 'déconnecter'){
   unset($_COOKIE['utilisateur']);
   setcookie('utilisateur','',time()-10);
}
if (!empty($_COOKIE['utilisateur'])){
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])){
    setcookie('utilisateur',$_POST['nom']);
    $nom = $_POST['nom'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>

<?php if($nom): ?>
    <h1>Bonjour <?= htmlentities($nom)?></h1>
    <a href="profil.php?action=deconnecter">se déconnecter</a>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" name="nom" placeholder="entrer votre nom">
        </div>
        <button class="btn btn-primary"> se connecter</button>
    </form>
<?php endif; ?>  

<!-- LIEN AVEC LE FICHIER INDEXBIS.PHP -->
</body>
</html>