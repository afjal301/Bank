<?php
require_once "function/bilananuel.php";
$verserA=null;
$retraitA=null;
if(isset($_GET["search"]) && $_GET["search"]!==""){
    $verserA=mouvement_verserA($_GET["search"]);
    $retraitA=mouvment_retraitA($_GET["search"]);
}
$host='localhost';
$dbname='bank';
$username='root';
$password='';
$pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$query2=$pdo->query("SELECT SUM(solde) FROM client");
$resultat=$query2->fetchALL(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat e situation BANCAIRE</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="situation1">
        <h1>Situation BANCAIRE</h1>
        <a href="menu.php" > <button class="btn btn-danger" style="margin-left: -8cm;margin-right: 4cm;width: 4cm;">TO MENU</button></a>
        <a href="rechercheClient.php"> <button class="btn btn-primary" style="margin-left: -8cm;margin-right: 4cm;margin-top: 3cm;width: 4cm;">Retour</button></a>
        <form action="" class="form-group">
            <input type="number" name="search" id="" class="form-control" placeholder="Entrer une anneé">
            <button type="submit" class="btn btn-primary" style="margin-top:0.5cm;margin-bottom: 1cm;">Recherche</button>
            <h5 style="color:white">Total versement  annuel :<?=$verserA[0] ["SUM(versement)"]?></h5>
        <h5 style="color:white">Total retrait annuel :<?=$retraitA[0]["SUM(retrait)"]?></h5>
        <h5 style="color:white">Total de solde  :<?=$resultat[0]["SUM(solde)"]?></h5>
        </form>
        
    </div>
</body>
</html>