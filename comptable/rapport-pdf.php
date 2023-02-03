<?php

require('fpdf17/fpdf.php');
include('dbcon.php');


$query=mysqli_query($con,"select * from paiement where status='2'");
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
$pdf->Cell(130, 15, $pdf->Image($logo, $pdf->GetX(), $pdf->GetY(), 33.78), 0,1);
$pdf->Cell(185	,15,'Rapport des paiements',0,1,'C');//end of line
//$pdf->Cell(130	,5,'Gemul Cars Co',0,0);


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);



/*$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$invoice['clientID'],0,1);//end of line*/

//make a dummy empty cell as a vertical spacer
//$pdf->Cell(189	,10,'',0,1);//end of line

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

$pdf->Cell(7	,5,'#',1,0);
$pdf->Cell(21	,5,'Client No.',1,0);
$pdf->Cell(34	,5,'Nom Client',1,0);
$pdf->Cell(34	,5,'Formation No.',1,0);
$pdf->Cell(30	,5,'Date',1,0);
$pdf->Cell(34	,5,'Mode Paiement',1,0);
$pdf->Cell(34	,5,'Montant',1,1);

$pdf->SetFont('Arial','',12);


$query=mysqli_query($con,"select * from paiement where status='2'");
$i=1;
$total=0;
while($fact=mysqli_fetch_array($query)){
    $pdf->Cell(7	,5,$i,1,0);
	$pdf->Cell(21	,5,$fact['idClient'],1,0);
	$pdf->Cell(34	,5,$fact['nomClient'],1,0);
    $pdf->Cell(34	,5,$fact['idFormation'],1,0);
    $pdf->Cell(30	,5,date('d-m-Y',strtotime($fact['datePaiement'])),1,0);
    $pdf->Cell(34	,5,$fact['modePaiement'],1,0);
	$pdf->Cell(34	,5,number_format($fact['prixPaye']),1,1,'R');//end of line
    $total+=$fact['prixPaye'];
    $i++;
}

$pdf->Cell(126	,5,'',0,0);
$pdf->Cell(34	,5,'Total',0,0);
$pdf->Cell(12	,5,'MAD',1,0);
$pdf->Cell(22	,5,$total,1,1,'R');//end of line



$pdf->Output();
?>
