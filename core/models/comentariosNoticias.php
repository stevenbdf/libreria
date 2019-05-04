<?php
class Comentario extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $idNoticia = null;
	private $comentario = null;
	private $fecha = null;
	private $idCliente = null;

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

	public function setIdNoticia($value)
	{
		if ($this->validateId($value)) {
			$this->idNoticia = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdNoticia()
	{
		return $this->idNoticia;
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

	public function setIdCliente($value)
	{
		if ($this->validateId($value)) {
			$this->idCliente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdCliente()
	{
		return $this->idCliente;
	}

	//Metodos para manejar el CRUD
	public function readComentario()
	{
		$sql = 'SELECT idComentN, titulo, comentnoticia.idNoticia,comentnoticia.fecha ,cliente.img as img, comentario,comentnoticia.idClient, nombreCliente 
						FROM comentnoticia 
						INNER JOIN cliente ON cliente.idCliente = comentnoticia.idClient 
						INNER JOIN noticia ON noticia.idNoticia = comentnoticia.idNoticia 
						ORDER BY idComentN DESC';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createComentario()
	{
		$sql = 'INSERT INTO comentnoticia(idNoticia, comentario, fecha, idClient)
						VALUES (?, ? ,(SELECT NOW()), ?)';
		$params = array($this->idNoticia, $this->comentario,$this->idCliente );
		return Database::executeRow($sql, $params);
	}

	public function updateComentario()
	{
		$sql = 'UPDATE comentnoticia SET comentario = ?, fecha = (SELECT NOW())
				WHERE idComentN = ?';
		$params = array($this->comentario, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteComentario()
	{
		$sql = 'DELETE FROM comentnoticia WHERE idComentN = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
