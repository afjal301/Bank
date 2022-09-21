<?php
require_once "function/versement.php";
$resultat=null;
if(isset($_GET["search"]) && $_GET["search"]!==""){
    $resultat=search_vers($_GET["search"]);
}else{
    $resultat=tous_versement();
}

/*
if(isset($_GET["action"]) && $_GET["action"]==="supprimer" && isset($_GET["name"])){
    delete($_GET["name"]);
}
//var_dump($_GET["name"]);

if(isset($_GET["action"]) && $_GET["action"]==="modifier"  && isset($_GET["name"])){
    session_start();
    $value=$_GET["name"];
    $_SESSION["modify"]=$value;
    header("location:/versement.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info client</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="rechercheCli">
        <header>
            <h1>INFO CLIENT</h1>
            <form action="" class="form-group">
                <input type="text" name="search" placeholder="Recherche taper un nom ou un addresse ou numero de compte" class="form-control">
                <button type="submit" class="btn btn-primary">Recherche</button>
            </form>
            <a href="menu.php"> <button type="submit" class="btn btn-primary">To menu</button></a>
            <a href="etatSituation.php"> <button type="submit" class="btn btn-primary">Situation Client</button></a>
            <a href="etatBancaire.php"> <button type="submit" class="btn btn-primary">Situation BANCAIRE</button></a>
        </header>
        <table class="table">
            <tr>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">NOM</td>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">Numero de Compte</td>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">Solde</td>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">Date</td>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">Check</td>
                <td style="background-color: rgb(12, 112, 158);color: white;font-size: 1.2em;">Modification</td>
            </tr>
            <?php foreach($resultat as $key):?>
            <tr>
                 <?php foreach($key as $k):?>
                <td><?=$k?></td>
                <?php endforeach?>
                <td>
                <a href="rechercheClient.php?name=<?=$key["num_compte"]?>&&action=supprimer"><button class="btn btn-danger">Delete</button></a>
                    
                </td>
                <td>
                <a href="rechercheClient.php?name=<?=$key["num_compte"]?>&&action=modifier"><button class="btn btn-primary">Modify</button></a>
                </td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
</body>