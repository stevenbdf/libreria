<?php
class Noticias extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $titulo = null;
    private $descripcion = null;
    private $imagen = null;

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
		if ($this->validateAlphabetic($value, 1, 100)) {
			$this->titulo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setDescripcion($value)
	{
			$this->descripcion = $value;
			return true;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
    }
    
    public function setImagen($value)
	{
		$this->imagen=$value;
		return true;
	}

	public function getImagen()
	{
		return $this->imagen;
	}


	//Metodos para manejar el CRUD
	public function readNoticia()
	{
        $sql='SELECT idNoticia, nombreEmpleado, fecha, titulo, descripcion, noticia.img FROM noticia INNER JOIN empleado ON empleado.idEmpleado=noticia.idNoticia ORDER BY idNoticia';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createNoticia()
	{
		$sql = 'INSERT INTO noticia(titulo, descripcion, img) VALUES(?, ?, ?)';
		$params = array($this->titulo, $this->descripcion,$this->imagen);
		return Database::executeRow($sql, $params);
	}

	public function getNoticia()
	{
		$sql = 'SELECT idNoticia, titulo, descripcion, img FROM noticia WHERE idNoticia = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateNoticia()
	{
		$sql = 'UPDATE noticia SET titulo = ?, descripcion = ?, img = ? WHERE idNoticia = ?';
		$params = array($this->titulo, $this->descripcion,$this->imagen, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteNoticia()
	{
		$sql = 'DELETE FROM noticia WHERE idNoticia = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>
