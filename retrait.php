<?php
require_once "function/retrait.php";
require_once "function/mouvement.php";
$error=null;
$date=new Datetime();
$date=$date->format('Y-m-d');
$solde=null;
  if(isset($_GET["num_compte"]) && $_GET["num_compte"]!=="" && isset($_GET["montant_retrait"]) && $_GET["montant_retrait"]!=="" && isset($_GET["num_cheque"]) && $_GET["num_cheque"]!=="" ){
    $host='localhost';
    $num=$_GET["num_compte"];
    $dbname='bank';
    $username='root';
    $password='';
    $montant=$_GET["montant_retrait"];
    $num_compte=$_GET["num_compte"];
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT solde FROM client where num_compte='$num_compte' ");
    $resultat=$query->fetchALL();
    $solde1=intval($resultat[0][0]);
    $solde=intval($resultat[0][0])-10000;
    if($solde>$montant){
      $new_montant=$solde1-$montant;
      $query=$pdo->query("UPDATE client SET solde='$new_montant' where num_compte='$num'");
      add_retrait($_GET["num_cheque"],$_GET["montant_retrait"],$date,$_GET["num_compte"]);
      mouvement_retrait($_GET["num_compte"],$date,$_GET["montant_retrait"]);
    
    }
      
    //$eureur=retrait($_GET["num_compte"],intval($_GET["montant_retrait"]));
    
}
else{
    $error="Veuillez remplissez bien le champ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RETRAIT</title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
  <script src="boostrap/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
  <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
  <div class="retrait">
    <img src="img/retire.jpg" alt="" width="300" height="300">
    <form action="" class="form-group">
      <h3>RETRAIT BANCAIRE</h3>
      <input type="text" name="num_compte" class="form-control" placeholder="Numero du compte">
      <input type="text" name="num_cheque" class="form-control" placeholder="Numero cheque">
      <input type="number" name="montant_retrait" class="form-control" placeholder="Montant retrait">
      <button type="submit" class="btn btn-danger" style="color: yellow;">Ajouter</button>
      <button class="btn btn-info" type="reset">Actualiser</button>
    </form>
    <a href="menu.php"><button class="btn btn-danger">TO MENU</button></a> 
    <a href="rechercheClient.php"> <button class="btn btn-info">INFO CLIENT</button></a>
  </div>
</body>
</html>