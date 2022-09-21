<?php
$id='C1';
$host='localhost';
$dbname='bank';
$username='root';
$password='';
$pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$query=$pdo->query("SELECT * from mouvement where num_compte='$id'");
$query2=$pdo->query("SELECT nom from client where num_compte='$id'");
$resultat=$query->fetchALL(PDO::FETCH_ASSOC);
$resulta2=$query2->fetchALL(PDO::FETCH_ASSOC);
$nom= $resulta2[0]["nom"];

//var_dump($resulta2);
//return $resultat;
var_dump($resultat);

require_once "fpdf184/fpdf.php";


$pdf=new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial','B',12);
$pdf->Text(80,10,"Etat de Situation Bancaire" );
$pdf->Text(8,20,"Numero de Compte : $id ");
$pdf->Text(8,30,"Nom de Compte : $nom");

$pdf->SetDrawColor(183);
$pdf->SetFillColor(221);
$pdf->SetY(40);
$pdf->Cell(40,8,'Retrait',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(40,8,'Versement',1,0,'C',1);
$pdf->Cell(60,8,'Date de mouvement',1,0,'C',1);
$pdf->Cell(70,8,'Numero de  mouvement',1,0,'C',1);
foreach($resulta as $key){
    
}


$pdf->Output();

?>