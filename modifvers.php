<?php
require_once "function/versement.php";
require_once "function/client.php";
$date=new Datetime();
$date_day=$date->format("Ymd");
$error=null;
        if(isset($_GET["num"]) && $_GET["num"]!=="" && $_GET["montant"]!=="" && isset($_GET["montant"]) && isset($_GET["date"]) && $_GET["date"]!==""){
            $date_verse=new Datetime($_GET["date"]);
            $date_verse=$date_verse->format("Ymd");
            $date=strtotime($date_verse)-strtotime($date_day);
            if(!empty(select_clientByID($_GET["num"])) && $date >=0){
                Add_versement($_GET["num"],$_GET["montant"],$_GET["date"]);
               montant($_GET["num"],$_GET["montant"]);
               header("location:/listevers.php");
                //mouvemement_versement($_GET["num"],$_GET["date"],$_GET["montant"]);

            }
            else{
                $error="Cette compte n'existe pas";
            }
        }else{
            $error="cette compte n'existe pas";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VERSEMENT</title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
  <script src="boostrap/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
  <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="versement">
        <img src="img/vers.jpg" alt="" width="300" height="300">
        <form action="" class="from-group">
            <h1>VERSEMENT</h1>
            <?php if($error!==""):?>
                <h5 style="color:red"><?=$error?></h5>
            <?php else:?>
                <h5 style="color:white">Enregistrer</h5>
            <?php endif?>
            <input type="text" class="form-control" name="num" placeholder="Numero du compte" >
            <input type="number" class="form-control" placeholder="Montant versement"  name="montant" >
            <input type="date" class="form-control" placeholder="Date de versement" name="date" >
            <button type="submit" class="btn btn-danger" style="color: yellow;">Ajouter</button>
            <button type="reset" class="btn btn-info">Actualiser</button>
        </form>
        <a href="transfert.php"> <button class="btn btn-info">Effectuer un transfert</button></a>
        <a href="menu.php"><button class="btn btn-danger">TO MENU</button></a> 
    </div>
</body>
</html>