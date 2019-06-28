<?php
require('../../resources/libraries/fpdf.php');
require('../../core/helpers/database.php');
require('../../core/helpers/validator.php');

class PDF extends FPDF
{
private $titulo;

public function setTitulo($value){
	$this->titulo= $value;
}
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('../../resources/img/logo.png',20,10,56);
	// Arial bold 15
	$this->SetFont('Arial','',25);
	// Movernos a la derecha
	$this->Cell(80);
	// T�tulo
	$this->Cell(100,15,$this->titulo,0,0,'R');

	
	
	// Salto de l�nea
	$this->Ln(10);
	
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


?>
