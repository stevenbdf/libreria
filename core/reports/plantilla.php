<?php
require('../../resources/libraries/fpdf.php');
require('../../core/helpers/database.php');
require('../../core/helpers/validator.php');

class PDF extends FPDF
{
	//Variable que almacena titulo del reporte
	private $titulo;
	private $mostrarAutor = false;

	/**
	 * Función que establece valor a titulo
	 * @param {String} Titulo 
	 */
	public function setTitulo($value)
	{
		$this->titulo = $value;
	}

	/**
	 * Función que establece valor a mostrar autor
	 */
	public function mostrarAutor()
	{
		$this->mostrarAutor = true;
	}

	// Cabecera de p�gina
	function Header()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		ini_set('date.timezone', 'America/El_Salvador');
		//Se especifica 10 mm de margenes, osea 1cm
		$this->SetMargins(10, 10, 10);
		//Se imprime el logo
		$this->Image('../../resources/img/logo.png', 10, 10, 56);
		//Definimos fuente, tipo, y tamaño para titulos
		$this->SetFont('Arial', 'B', 20);
		// Movernos a la derecha
		$this->Cell(80);
		//Se escribe el titulo del reporte, proviene de una variable
		$this->Cell(115, 15, $this->titulo, 0, 0, 'R');
		//Salto de linea
		$this->Ln();
		//Definimos la fuente, tipo, y tamaño para información de encabezado
		$this->SetFont('Arial', 'I', 14);
		//Información de en cabezado, autor y fecha del reporte, autor proviene de session
		($this->mostrarAutor) ? ($this->Cell(75, 15, 'Hecho por: ' . $_SESSION['correoUsuario'], 0, 0, 'C'))
			: ($this->Cell(70, 15, 'Cliente: ' . $_SESSION['correoCliente'], 0, 0, 'C'));
		$this->Cell(120, 15, 'Generado el: ' . date('d-m-Y H:i:s'), 0, 1, 'R');
		//Salto de linea
		$this->Ln(1);
	}

	//Pie de página
	function Footer()
	{
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		//Número de página
		$this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}
