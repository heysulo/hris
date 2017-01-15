<?php

require_once('../../templates/path.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once($publicPath.'/fpdf/fpdf.php');
$indexno = $_POST['index'];
$IScourse = array("IS1001");
$CScourse = array("SCS1101","SCS1102","SCS1103","SCS1104","SCS1105","SCS1106","ENH1101","SCS1107","SCS1108","SCS1109","SCS1110","SCS1111","SCS1112","SCS1113","ENH1102");


$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('ucsc_logo.png',90,15,22.5);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(84,110,122);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(0,10,"Undergraduate Transcript",0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Arial","B","20");
$pdf->Cell(0,10,"UNIVERSITY OF COLOMBO SCHOOL OF COMPUTING",'C');
$pdf->Ln();
$pdf->Line(0,68,500,68);
$pdf->SetFont("Arial","","9");
$pdf->Cell(0,10,"35, Ried Avenue, Colombo 007000, Sri lanka.",0,0,'C');
$pdf->Ln();
$pdf->SetFont("Arial","B","10");
$pdf->Cell(0,10,"ACADEMIC TRANSCRIPT AS OF 12/05/2016",0,0,'L');
$pdf->Cell(0,10,"DATE ISSUED : ".date("d/m/Y"),0,0,'R');
$pdf->Ln();
$pdf->SetFont("Arial","B","11");
$pdf->Cell(0,10,"Name  : ".$_POST['name'],0,0,'L');
$pdf->Ln();
$pdf->Cell(0,10,"Index no  : ".$_POST['index'],0,0,'L');
$pdf->Cell(0,10,"Registration no  : ".$_POST['regno'],0,0,'R');
$pdf->Ln();
$pdf->Cell(0,10,"Year  : ".$_POST['year']);
$pdf->Ln();
$pdf->Cell(0,10,"GPA  : 3.7541");
$pdf->Ln();
$pdf->Line(0,110,500,110);
$pdf->Ln();

$pdf->SetFont("Arial","B","10");
$pdf->Cell(65,10,"Course Name",0,0,'L');
$pdf->Cell(40,10,"Result",0,0,'C');
$pdf->Ln();

foreach ($IScourse as $value) {

    $result1 = mysqli_query($conn,"SELECT title FROM course WHERE course_code = '$value'");
    $result2 = mysqli_query($conn,"SELECT result FROM $value WHERE index_num = $indexno");

    $course = mysqli_fetch_row($result1);
    $result = mysqli_fetch_row($result2);
    $pdf->SetFont("Arial","B","10");
    $pdf->Cell(65,10,$course[0],0,0,'L');
    $pdf->Cell(40,10,$result[0],0,0,'C');

}

/*
$i=2;
$tbname = array("y2s1","y2s2");
for($x=0;$x<$i;$x++)
{


	$result = $db_handle->runQuery("SELECT * FROM $tbname[$x] WHERE `IndexNo`=$indexno");
	$header = $db_handle->runQuery("SELECT `COLUMN_NAME`
	FROM `INFORMATION_SCHEMA`.`COLUMNS`
	WHERE `TABLE_SCHEMA`='trans_db'
	AND `TABLE_NAME`='$tbname[$x]'");
	$pdf->SetFont("Arial","B","14");
	$pdf->SetTextColor(84,110,122);
	$pdf->Cell(0,10,"Year 2 Semester ".($x+1));
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B',9);
	$pdf->SetTextColor(0,0,0);


	foreach($header as $heading)
	{
		foreach($heading as $column_heading)
		{
			if($column_heading=="IndexNo")
			{
				continue;
			}
			else
			{
				$pdf->Cell(19.5,9,$column_heading,1,0,'C');
			}
		}

	}


	foreach($result as $row)
	 {
		$pdf->SetFont('Arial','',9);
		$pdf->Ln();
		foreach($row as $column)
		{
			if($column==$indexno)
			{
				continue;
			}
			else
			{
				$pdf->Cell(19.5,10,$column,1,0,'C');
			}
		}


	}




	$pdf->Ln();
	$pdf->Ln();

}

*/

$pdf->Output();

?>