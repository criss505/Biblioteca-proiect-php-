<?php
require('./fpdf/fpdf.php');


class PDF extends FPDF
{
    // Page header
    function Header()
    {
        global $title;

        $this->SetFillColor(10,130,220);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        $this->setXY(0,0);
        // Title
        $this->Cell(210,20,'Raport Imprumut Carte',1,0,'C',1);
        // Line break
        $this->Ln(20);
        // Colors of frame, background and text
    }

    // Page footer
    function Footer()
    {
        $this->SetFillColor(20,130,220);
        // Arial italic 8
        $this->SetFont('Arial','U',8);
        // Position at 1.5 cm from bottom
        $this->SetXY(0,-14);

        // Page number
        $this->Cell(210,14,'mai multe carti aici',1,0,'C',1,'$http://localhost/bib++/books.php');
        // Logo - la final ca sa stea deasupra
        $this->Image('resurse/images/logo-cerc.png',195,285,10);
    }

    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial','',12);
        // Background color
        $this->SetFillColor(200,220,255);
        // Title
        $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
        // Line break
        $this->Ln(4);
    }
    function PrintChapter($num, $title, $file)
    {
        $this->AddPage();
        $this->ChapterTitle($num,$title);
        $this->ChapterBody($file);
    }
    // Simple table
    // function BasicTable($header, $data)
    // {
    //     // Header
    //     foreach($header as $col)
    //         $this->Cell(40,7,$col,1);
    //     $this->Ln();
    //     // Data
    //     foreach($data as $row)
    //     {
    //         foreach($row as $col)
    //             $this->Cell(40,6,$col,1);
    //         $this->Ln();
    //     }
    // }
    
}

//Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->SetFont('Times','',12); 
// for($i=1;$i<=40;$i++)
// 	$pdf->Cell(0,10,'Printing line number '.$i,0,1);
    
//invoice contents
$pdf->SetTextColor(50,50,50);
$pdf->SetFont('Arial','',40); 
$pdf->Cell(50,40,'INVOICE',0,1,'L');

//adresa
$pdf->SetFont('Arial','',20); 
$pdf->Cell(30,10,'adresa',1,1,'L');

//contact
$pdf->SetFont('Arial','',20);
$pdf->Cell(60,-10,'contact',1,1,'R');
$pdf->Ln(20);

//bill to
$pdf->SetFont('Arial','',20);
$pdf->Cell(30,10,'bill to',1,1,'L');

//line number contents
$pdf->SetFont('Arial','',12);
for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Printing line number '.$i,0,1);

$pdf->Output();

?>