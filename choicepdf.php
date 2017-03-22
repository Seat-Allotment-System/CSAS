<?php
include('fpdf.php');
session_start();

$firstchoice = $_SESSION['firstchoice'];
$secondchoice = $_SESSION['secondchoice'];
$thirdchoice  =  $_SESSION['thirdchoice'];
$fourthchoice  =  $_SESSION['fourthchoice'];
$fifthchoice  =  $_SESSION['fifthchoice'];
$rollno = $_SESSION['rollno'];

$pdfobj = new FPDF();
$pdfobj->AddPage();
$pdfobj->SetFont("Arial","B",12);
$pdfobj->Cell(0,10,"NATIONAL INSTITIUTE OF TECHNOLOGY",0,1,'C');

$pdfobj->Cell(50,10,"",0,1,'C');
$pdfobj->SetFont("Arial","B",9);
$pdfobj->Cell(0,10,"Roll No                             $rollno",0,1,'C');
//$pdfobj->Cell(50,10,"Roll No : ",0,0,'C');
//$pdfobj->Cell(50,10,"$rollno",0,1,'C');

if(strcmp($firstchoice,""))
{
$pdfobj->Cell(0,10,"First Choice                             $firstchoice",0,1,'C');
//$pdfobj->Cell(50,10,"First Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$firstchoice",0,1,'C');
}

if(strcmp($secondchoice,""))
{
$pdfobj->Cell(0,10,"Second Choice                             $secondchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Second Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$secondchoice",0,1,'C');
}

if(strcmp($thirdchoice,""))
{
$pdfobj->Cell(0,10,"Third Choice                             $thirdchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Third Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$thirdchoice",0,1,'C');
}

if(strcmp($fourthchoice,""))
{
$pdfobj->Cell(0,10,"Fourth Choice                            $fourthchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Fourth Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$fourthchoice",0,1,'C');
}

if(strcmp($fifthchoice,""))
{
$pdfobj->Cell(0,10,"Fifth Choice                            $fifthchoice",0,1,'C');
//$pdfobj->Cell(50,10,"Fifth Choice : ",0,0,'C');
//$pdfobj->Cell(50,10,"$fifthchoice",0,1,'C');
}
$pdfobj->output(); 

?>