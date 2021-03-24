 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>

    <?$aDeviner = 150 ?>

    <?php if (isset($_GET['chiffre'])): ?>
        <?php if ($_GET["chiffre"] > $aDeviner): ?>
            Votre chiffre est trop grand
        <?php elseif ($_GET["chiffre"] < $aDeviner): ?>
            le chiffre est trop petit
        <?php else: ?> 
        Bravo! Vous aveez deviné le chiffre <?= $aDeviner?>  
        <?php endif?>
    <?php endif?>
    <form action="" method="get">
    
    <input type="number" name="chiffre" placeholder="entre 0 et 1000" value="<?php if(isset($_GET['chiffre'])){  echo htmlentities($_GET["chiffre"]); }?>">
    <button type="submit">Deviner</button>
    </form>

 </body>
 </html>