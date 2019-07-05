<?php
class Autores extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $pais = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setPais($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->pais = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPais()
	{
		return $this->pais;
	}

	public function insertBitacora($accion)
	{
		$sql = 'call insertBitacora ( ? , ?)';
		$params = array($_SESSION['idEmpleado'], $accion);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function readAutores()
	{
		$sql = 'SELECT idAutor, nombre, apellido, pais FROM autor ORDER BY idAutor';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createAutor()
	{
		$sql = 'INSERT INTO autor(nombre, apellido, pais) VALUES(?, ?, ?)';
		$params = array($this->nombres, $this->apellidos, $this->pais);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Ingreso un autor');
			return true;
		} else {
			return false;
		}
	}

	public function getAutor()
	{
		$sql = 'SELECT idAutor, nombre, apellido, pais FROM autor WHERE idAutor = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateAutor()
	{
		$sql = 'UPDATE autor SET nombre = ?, apellido = ?, pais = ? WHERE idAutor = ?';
		$params = array($this->nombres, $this->apellidos, $this->pais, $this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Modifico un autor');
			return true;
		} else {
			return false;
		}
	}

	public function deleteAutor()
	{
		$sql = 'DELETE FROM autor WHERE idAutor = ?';
		$params = array($this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Borro un autor');
			return true;
		} else {
			return false;
		}
	}

	public function getCountBooksByAuthor()
	{
		$sql = 'SELECT COUNT(libro.idLibro) AS Cantidad , concat_ws(" ", nombre ,apellido) AS Nombre from autor INNER JOIN libro on autor.idAutor = libro.idAutor GROUP By autor.nombre';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readBooksByAuthor()
	{
		$sql = "SELECT idLibro,  autor.nombre as 'nombreAutor', autor.apellido as 'apellidoAutor', NombreL,
		editorial.nombreEdit as 'editorial', ROUND( precio - ( precio * ( categoria.descuento / 100 ) ), 2) as 'precioFinal'
		FROM libro INNER JOIN autor ON libro.idAutor = autor.idAutor
		INNER JOIN categoria ON libro.idCat = categoria.idCategoria
		INNER JOIN editorial ON libro.idEditorial = editorial.idEditorial
		WHERE libro.idAutor = ? ORDER BY idLibro ";
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function readAuthorNames()
	{
		$sql = 'SELECT idAutor, nombre, apellido FROM autor ORDER BY idAutor';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getAuthorName()
	{
		$sql = 'SELECT nombre, apellido FROM autor WHERE idAutor = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
}
