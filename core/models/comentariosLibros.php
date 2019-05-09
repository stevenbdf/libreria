<?php
class Comentario extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $idLibro = null;
	private $idCliente = null;
	private $nombreL = null;
	private $comentario = null;
	private $fecha = null;
	private $nombreC = null;

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

	public function setIdLibro($value)
	{
		if ($this->validateId($value)) {
			$this->idLibro = $value;
			return true;
		} else {
			return false;
		}
	}

	public function setIdCliente($value)
	{
		if ($this->validateId($value)) {
			$this->idCliente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdLibro()
	{
		return $this->idLibro;
	}

	public function setNombreL($value)
	{
		if ($this->validateAlphabetic($value, 1, 40)) {
			$this->nombreL = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombreL()
	{
		return $this->nombreL;
	}

	public function setComentario($value)
	{
		$this->comentario = $value;
		return true;
	}

	public function getComentario()
	{
		return $this->comentario;
	}

	public function setFecha($value)
	{
		$this->fecha = $value;
		return true;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setNombreC($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombreC = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombreC()
	{
		return $this->nombreC;
	}

	//Metodos para manejar el CRUD
	public function insertBitacora($accion)
	{
		$sql = 'call insertBitacora ( ? , ?)';
		$params = array($_SESSION['idEmpleado'], $accion);
		return Database::executeRow($sql, $params);
	}
	
	public function readComentario()
	{
		$sql = 'SELECT idComent, nombreCliente, fecha, comentario, nombreL 
				FROM comentlibro 
				INNER JOIN cliente ON cliente.idCliente = comentlibro.idClient
				INNER JOIN libro ON libro.idLibro = comentlibro.idLibro ORDER BY idComent';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function readComentariosLibro()
	{
		$sql = 'SELECT idComent, comentLibro.idClient, nombreCliente, cliente.img, fecha, comentario, nombreL 
				FROM comentlibro 
				INNER JOIN cliente ON cliente.idCliente = comentlibro.idClient
				INNER JOIN libro ON libro.idLibro = comentlibro.idLibro WHERE comentLibro.idLibro = ?
				ORDER BY idComent DESC';
		$params = array($this->idLibro);
		return Database::getRows($sql, $params);
	}

	public function createComentariosLibro()
	{
		$sql = 'INSERT INTO comentlibro(idLibro, comentario, fecha, idClient)
				VALUES (?, ? ,(SELECT NOW()), ?)';
		$params = array($this->idLibro, $this->comentario, $this->idCliente);
		return Database::executeRow($sql, $params);
	}

	public function updateComentariosLibro()
	{
		$sql = 'UPDATE comentlibro SET comentario = ?, fecha = (SELECT NOW())
				WHERE idComent = ?';
		$params = array($this->comentario, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteComentario()
	{
		$sql = 'DELETE FROM comentlibro WHERE idComent = ?';
		$params = array($this->id);
		if (Database::executeRow($sql, $params)) {
			$this->insertBitacora('Borro un comentario de un libro');
			return true;
		} else {
			return false;
		}
	}
}
