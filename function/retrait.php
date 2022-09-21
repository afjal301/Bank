<?php
function add_retrait($num_cheque,$montant_retrait,$date,$num_compte){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("INSERT INTO retrai(num_cheque ,montant_retrait ,date_retrait,num_compte ) VALUES ('$num_cheque','$montant_retrait','$date','$num_compte')");
}
function retrait(string $num_compte,int $montant):string{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT solde FROM client where num_compte='$num_compte' ");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    $erreur="echec";
    $solde=intval($resultat[0])-10000;
    
    if($solde>=$montant){
        $new_solde=$solde-$montant;
        $query=$pdo->query("UPDATE client SET solde='$new_solde' where num_compte='$num'");
        $erreur="Votre retrait et success";
    }
    else{
        $erreur="Votre solde est insuffisant";
    }
   return $erreur;
}
?>