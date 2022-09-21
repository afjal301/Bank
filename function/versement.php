<?php
function Add_versement(string $num,int $montant, $date){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("INSERT INTO verser(num_compte,montant_versement,date_versement 	) VALUES ('$num','$montant','$date')");
}
function montant(string $num,int $montant){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT solde FROM client where num_compte='$num' ");
    $resultat=$query->fetch();
    $solde=intval($resultat["solde"]);
    $new_solde=$montant+$solde;
    $query=$pdo->query("UPDATE client SET solde='$new_solde' where num_compte='$num'");
}
function tous_versement(){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT * FROM verser");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function search_vers($key):int{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT * FROM verser where num_compte='$key' or date_versement='$key'");
    
    return $query;
}
?>