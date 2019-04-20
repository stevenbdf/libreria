<?php
class Comentario extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $titulo = null;
    private $comentario = null;
    private $fecha=null;
    private $nombreC=null;

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

	public function setTitulo($value)
	{
			$this->titulo = $value;
			return true;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setComentario($value)
	{
		$this->comentario=$value;
		return true;
	}

	public function getComentario()
	{
		return $this->comentario;
  }

    public function setFecha($value)
	{
		$this->fecha=$value;
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
	public function readComentario()
	{
		$sql ='SELECT idComentN, titulo, comentnoticia.fecha  , comentario, nombreCliente FROM comentnoticia INNER JOIN cliente ON cliente.idCliente = comentnoticia.idComentN INNER JOIN noticia ON noticia.idNoticia=comentnoticia.idComentN ORDER BY idComentN';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function deleteComentario()
	{
		$sql = 'DELETE FROM comentnoticia WHERE idComentN = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>
