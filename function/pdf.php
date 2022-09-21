<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
// Logo
//$this->Image('header.png',55,12,100);
// Saut de ligne
$this->Ln(30);
}

// Pied de page
function Footer()
{
// Positionnement à 1,5 cm du bas
$this->SetY(-15);
// Police Arial italique 10
$this->SetFont('Arial Black','I',10);
// Numéro de page
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation du PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Bloc 1
//$pdf->SetFont('Times','',12);
$pdf->SetFillColor(32,32,32);
$pdf->SetTextColor(255,255,255);
$txt1 = "Texte 1 en Times 12 aligné à gauche.";
$txt1 = utf8_decode($txt1);
//$pdf->Multicell(190,10,$txt1,0,'L', TRUE);

// Saut de lignes
$pdf->Ln(10);

// Bloc 2
$pdf->SetFont('Arial','',16);
$pdf->SetFillColor(192,192,192);
$pdf->SetTextColor(0,0,0);
$txt2 = "Texte 2 en Arial 16 aligné à droite.";
$txt2 = utf8_decode($txt2);
//$pdf->Multicell(190,10,$txt2,0,'R', TRUE);

// Saut de lignes
$pdf->Ln(10);

// Bloc 3
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(192,192,192);
$pdf->SetTextColor(0,0,0);
$txt3 = "Texte 3 en Times 12 centré.";
$txt3 = utf8_decode($txt3);
//$pdf->Multicell(190,10,$txt3,0,'C', TRUE);

// Création du PDF
$fichier ="fichier.pdf";
$pdf->Output($fichier,'F');

// Redirection vers le PDF
header('location:../fichier.pdf');
?> 