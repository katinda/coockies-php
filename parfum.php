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
    <?php
    
    //Checkbox
        $parfums = [
            'Fraise' => 4,
            'Chocolat' => 5,
            'Vanille' => 3
        ];
        //Radio
        $cornets = [
            "Pot" => 2,
            "Cornet" =>3,
        ];
        //Checkbox
        $supplements=[
            "Pépite de chocolat" => 1,
            'Chantilly' => 0.5
        ];

        $title ="Composer votre glace";
        $ingrédients = [];
        $total = 0;
        if(isset($_GET['parfum'])){
            foreach($_GET['parfum'] as $parfum){
                if(isset($parfums[$parfum])){
                    $ingrédients[]= $parfum;
                    $total += $parfums[$parfum];
                }
            }
        }
        if(isset($_GET['supplement'])){
            foreach($_GET['supplement'] as $supplement){
                if(isset($supplements[$supplement])){
                    $ingrédients[]= $supplement;
                    $total += $supplements[$supplement];
                }
            }
        }
        if(isset($_GET['cornet'])){
            $cornet = $_GET['cornet'];
                if(isset($cornets[$cornet])){
                    $ingrédients[]= $cornet;
                    $total += $cornets[$cornet];
                }
            }
        

    ?>
    
    <h1>Composer votre glace</h1>

    <div class="row">
    <div class="col-md-4">
    <div class="card">
       <div class="card-body">
            <h5 class="card-title">Votre glace</h5>
            <ul>
                <?php foreach($ingrédients as $ingrédient): ?>
                    <li><?= $ingrédient?></li>
                <?php endforeach; ?>
            </ul>
            <p>
                <strong>Prix: </strong> <?= $total?>€   
            </p>
       </div> 
    </div>
    </div>
        <div class="col-md-8">
            <form action="" method="get">
                <h2>Choisissez vos parfums</h2>
                <?php foreach($parfums as $parfum =>$prix):?>    
                <div class="checkbox">
                <label>
                    <?= checkbox('pafum',$parfum,$_GET ) ?>
                    <?= $parfum?> - <?= $prix ?> €

                </label>    
                </div>    

                <?php endforeach;?>
                <h2>Choisissez votre cornet</h2>
                <?php foreach($cornets as $cornet =>$prix):?>    
                <div class="checkbox">
                <label>
                    <?= radio('cornet',$cornet,$_GET ) ?>
                    <?= $cornet?> - <?= $prix ?> €

                </label>    
                </div>    

                <?php endforeach;?>
                <h2>Choisissez vos supplements</h2>
                <?php foreach($supplements as $supplement =>$prix):?>    
                <div class="checkbox">
                <label>
                    <?= checkbox('supplement',$supplement,$_GET ) ?>
                    <?= $supplement?> - <?= $prix ?> €

                </label>    
                </div>    

                <?php endforeach;?>
                <button type="submit" class="btn btn-primary">Composer ma glace</button> 
                
                <!-- <div class="form-group">
                
                    <input type="checkbox" name="parfum[]" value="Fraise"> Fraise <br>
                    <input type="checkbox" name="parfum[]" value="Vanille">Vanille <br>
                    <input type="checkbox" name="parfum[]" value="Chocolat">Chocolat<br>
                </div>
                    <button type="submit" class="btn btn-primary">Deviner</button> -->

                
            </form>

        </div>
    </div>

    
    <!-- -------------------------------------------------------------------- -->

    <?php

        function checkbox (string $name, string $value, array $data ): string 
        {   
            $attributes = '';
            if(isset($data[$name]) && in_array($value,$data[$data])){
                $attributes .='checked';
            }
            return <<< HTML
            <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
        HTML;
        }

        function radio (string $name, string $value, array $data ): string 
        {   
            $attributes = '';
            if(isset($data[$name]) && $value === $data[$data]){
                $attributes .='checked';
            }
            return <<< HTML
            <input type="radio" name="{$name}" value="$value" $attributes> 
        HTML;
        }
    ?>

        
</body>
</html>