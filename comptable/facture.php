<?php

require('fpdf17/fpdf.php');
include('dbcon.php');


$query=mysqli_query($con,"select * from paiement
	where Id = '".$_GET['Id']."'");
$item=mysqli_fetch_array($query);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$logo = "unilang.png";
$pdf->Cell(130, 15, $pdf->Image($logo, $pdf->GetX(), $pdf->GetY(), 33.78), 0,0);
$pdf->Cell(59	,15,'FACTURE',0,1);//end of line
//$pdf->Cell(130	,5,'Gemul Cars Co',0,0);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Adresse du centre de langues]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Ville, Pays, code ZIP]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,date('d-m-Y',strtotime($item['datePaiement'])),0,1);//end of line

$pdf->Cell(130	,5,'Tel [+212 545678012]',0,0);
$pdf->Cell(25	,5,'Facture #',0,0);
$pdf->Cell(34	,5,$item['Id'],0,1);//end of line

/*$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$invoice['clientID'],0,1);//end of line*/

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Client',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$item['nomClient'],0,1);

/*$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['company'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['phone'],0,1);*/

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Formation',1,0);
$pdf->Cell(25	,5,'Session',1,0);
$pdf->Cell(34	,5,'Prix',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
$query=mysqli_query($con,"select * from paiement where Id = '".$item['Id']."'");

while($fact=mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$fact['nomFormation'],1,0);
	$pdf->Cell(25	,5,$fact['session'],1,0);
	$pdf->Cell(34	,5,number_format($fact['prixFormation']),1,1,'R');//end of line
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Remise',0,0);
$pdf->Cell(12	,5,'MAD',1,0);
$pdf->Cell(22	,5,'0',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(12	,5,'MAD',1,0);
$pdf->Cell(22	,5,$item['prixPaye'],1,1,'R');//end of line



$pdf->Output();
?>
