<?php
    $age=null;

    if (!empty($_POST['birthday'])){
        setcookie('birthday',$_POST['birthday']);
        $_COOKIE['birthday'] = $_POST['birthday'];
    }

    if(!empty($_COOKIE['birthday'])){
        $birthday= (int)$_COOKIE['birthday'];
        $age = date ('Y')- $birthday;
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
    <?php if ($age && $age >= 18): ?>
        <h1>Du contenu réservé aux adultes</h1>
    <?php elseif ($age != null):?>
    <div class="alert alert-danger">Vous n'avez pas l'age requis pour voir le contenu</div>    
    <?php else: ?>   
    <form action="" method="post">
        <div class="form-group">
        <label for="">Section réservée pour les adultes, entrer votre  année de naisssance :</label>
            <select name="birthday" class="form-control">
            <?php for ($i = 2010; $i > 1919;$i--):?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
            </select>
        </div>
        <button type="submit">Envoyer</button>
    </form>
    <?php endif;?>;
</body>
</html>