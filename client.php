<?php
require_once "function/client.php";
$error=null;
if(isset($_GET["num"]) && $_GET["num"]!=="" && isset($_GET["nom"]) && $_GET["nom"]!=="" && isset($_GET["solde"]) && $_GET["solde"]!=="" && isset($_GET["addresse"]) && $_GET["addresse"]!=="" && intval($_GET["solde"])>=1000){
  $resultat=select_clientByID($_GET["num"]);
  if(empty($resultat)){
    ajouter($_GET["num"],$_GET["nom"],$_GET["solde"],$_GET["addresse"]);
    header("location:/rechercheClient.php");
    pdf($_GET["num"]);
  }
}
else{

  $error="Veuillez verifier Bien Cette Champ";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout CLIENT</title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
  <script src="boostrap/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
  <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
  <div class="client">
    <img src="img/cli.jpg" alt="" width="300" height="300">
    <?php if($error!==""):?>
        <?=$error?>
    <?php else:?>
      <h5>Enregistrer</h5>
    <?php endif?>
    <form action="" class="form-group">
      <input type="text" name="num" placeholder="Numero client" class="form-control" min="1">
      <input type="text" name="addresse" placeholder="addresse" class="form-control" min="1">
      <input type="text" name="nom" placeholder="Nom client" class="form-control">
      <input type="number" name="solde" placeholder="First solde" class="form-control" min="10000">
      <button type="submit" class="btn btn-danger" style="color: yellow;">Ajouter</button>
    </form>
     <a href="rechercheClient.php"><button class="btn btn-info">INFO</button></a>
    <a href="menu.php"><button class="btn btn-danger">MENU</button></a> 
  </div>
</body>
</html>