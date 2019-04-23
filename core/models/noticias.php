<?php
class Noticias extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $titulo = null;
	private $descripcion = null;
	private $imagen = null;
	private $empleadoId = null;
	private $fecha = null;
	private $ruta = '../../resources/img/news/';

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
		if ($this->validateAlphanumeric($value, 1, 100)) {
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

	public function setImagen($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 640, 480)) {
			$this->imagen = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getRuta()
	{
		return $this->ruta;
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function setEmpleadoId($value)
	{
		if($this->validateId($value)){
			$this->empleadoId = $value;
			return true;
		}else{
			return false;
		}
	}

	public function setFecha($value)
	{
		$this->fecha = $value;
		return true;
	}


	//Metodos para manejar el CRUD
	public function readNoticia()
	{
		$sql = 'SELECT idNoticia, nombreEmpleado, fecha, titulo, descripcion, noticia.img 
				FROM noticia INNER JOIN empleado ON empleado.idEmpleado=noticia.idEmpleado
				ORDER BY idNoticia';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createNoticia()
	{
		$sql = 'INSERT INTO noticia(idEmpleado, fecha, titulo, descripcion, img) VALUES(?, ?, ?, ?, ?)';
		$params = array($this->empleadoId, $this->fecha, $this->titulo,  $this->descripcion, $this->imagen);
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
		$params = array($this->titulo, $this->descripcion, $this->imagen, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteNoticia()
	{
		$sql = 'DELETE FROM noticia WHERE idNoticia = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
