<?php
class Clientes extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $direccion = null;
	private $contrasena = null;
    private $img = null;

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

	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setContrasena($value)
	{
		if ($this->validatePassword($value)) {
			$this->contrasena = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getContrasena()
	{
		return $this->contrasena;
	}

	public function setDireccion($value)
	{
		if ($this->validateAlphanumeric($value, 1 , 250)) {
			$this->direccion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDireccion()
	{
		return $this->direccion;
    }
    
    public function setImagen($value)
	{
		if ($this->validateAlphabetic($value, 1 , 100)) {
			$this->img = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getImagen()
	{
		return $this->img;
	}


	//Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario FROM usuarios ORDER BY apellidos_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuarios($value)
	{
		$sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario FROM usuarios WHERE apellidos_usuario LIKE ? OR nombres_usuario LIKE ? ORDER BY apellidos_usuario';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCliente()
	{
		$hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO cliente(nombreCliente, apellidoCliente, correo, contrasena, direccion) VALUES(?, ?, ?, ?, ?)';
		$params = array($this->nombres, $this->apellidos, $this->correo, $hash, $this->direccion );
		return Database::executeRow($sql, $params);
	}

	public function getUsuario()
	{
		$sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario FROM usuarios WHERE id_usuario = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE usuarios SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, alias_usuario = ? WHERE id_usuario = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM usuarios WHERE id_usuario = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
