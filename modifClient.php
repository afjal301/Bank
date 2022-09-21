<?php
require_once "function/client.php";
session_start();
$value=$_SESSION["modify"];
$resultat=select_clientByID($value);
$error=null;
if(isset($_GET["num"]) && $_GET["num"]!=="" && isset($_GET["nom"]) && $_GET["nom"]!=="" && isset($_GET["solde"]) && $_GET["solde"]!=="" && isset($_GET["addresse"]) && $_GET["addresse"]!=="" && intval($_GET["solde"])>=1000){
    $resultat=select_clientByID($_GET["num"]);
    if(!empty($resultat)){
        $nom=$_GET["nom"];
        $solde=$_GET["solde"];
        $addresse=$_GET["addresse"];
        $host='localhost';
        $dbname='bank';
        $username='root';
        $password='';
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $pdo->query("UPDATE client SET num_compte='$value',nom='$nom',solde='$solde',addresse='$addresse' WHERE num_compte='$value'");
        //var_dump($query);
        header("location:/rechercheClient.php");
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
    <?php if($error !==""):?>
        <h5 style="color:white"><?=$error?></h5>
    <?php else:?>
      <h5 style="color:red">Enregistrer</h5>
    <?php endif?>
    <form action="" class="form-group">
      <input type="text" name="num" placeholder="Numero client" class="form-control" min="1" value="<?=$resultat[0]["num_compte"]?>">
      <input type="text" name="addresse" placeholder="addresse" class="form-control" min="1" value="<?=$resultat[0]["addresse"]?>">
      <input type="text" name="nom" placeholder="Nom client" class="form-control" value="<?=$resultat[0]["nom"]?>">
      <input type="number" name="solde" placeholder="First solde" class="form-control" min="10000" value="<?=$resultat[0]["solde"]?>">
      <button type="submit" class="btn btn-danger" style="color: yellow;">Ajouter</button>
    </form>
     <a href="rechercheClient.php"><button class="btn btn-info">INFO</button></a>
    <a href="menu.php"><button class="btn btn-danger">MENU</button></a> 
  </div>
</body>
</html>