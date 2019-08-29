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
    private $ruta = '../../resources/img/clients/';
    private $autenticacion = null;

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
        /*if ($this->validateAlphanumeric($value, 1 , 250)) {
			$this->direccion = $value;
			return true;
		} else {
			return false;
		}*/
        $this->direccion = $value;
        return true;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setImagen($file, $name)
    {
        if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
            $this->img = $this->getImageName();
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
        return $this->img;
    }

    public function setAutenticacion($valorJSON)
	{
		$this->autenticacion = $valorJSON;
	}


    //Metodos para manejar el CRUD

    public function insertBitacora($accion)
    {
        $sql = 'call insertBitacora ( ? , ?)';
        $params = array($_SESSION['idEmpleado'], $accion);
        return Database::executeRow($sql, $params);
    }

    public function createCliente()
    {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente(nombreCliente, apellidoCliente, correo, contrasena, direccion, img)
						VALUES(?, ?, ?, ?, ?, ?)';
        $params = array(
            $this->nombres, $this->apellidos, $this->correo, $hash, $this->direccion,
            $this->img
        );
        return Database::executeRow($sql, $params);
    }

    public function readClientes()
    {
        $sql = 'SELECT idCliente, estado, nombreCliente, apellidoCliente, correo, direccion, img 
						FROM cliente ORDER BY idCliente';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function checkEstado()
    {
        $sql = 'SELECT estado FROM cliente WHERE correo = ?';
        $params = array($this->correo);
        $data = Database::getRow($sql, $params);
        if ((int)$data['estado'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkCorreo()
    {
        $sql = 'SELECT idCliente FROM cliente WHERE correo = ?';
        $params = array($this->correo);
        $data = Database::getRow($sql, $params);
        if ($data) {
            $this->id = $data['idCliente'];
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword()
    {
        $sql = 'SELECT contrasena FROM cliente WHERE idCliente = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($this->contrasena, $data['contrasena'])) {
            return true;
        } else {
            return false;
        }
    }


    public function deshabilitarCliente()
    {
        $sql = 'UPDATE cliente SET estado = 0 WHERE idCliente = ?';
        $params = array($this->id);
        if (Database::executeRow($sql, $params)) {
            $this->insertBitacora('Deshabilito un cliente');
            return true;
        } else {
            return false;
        }
    }

    public function habilitarCliente()
    {
        $sql = 'UPDATE cliente SET estado = 1 WHERE idCliente = ?';
        $params = array($this->id);
        if (Database::executeRow($sql, $params)) {
            $this->insertBitacora('Habilito un cliente');
            return true;
        } else {
            return false;
        }
    }


    public function getCliente()
    {
        $sql = 'SELECT idCliente, estado, nombreCliente, apellidoCliente, correo, direccion, img 
						FROM cliente WHERE idCliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function getNombreCliente()
    {
        $sql = 'SELECT nombreCliente, apellidoCliente, direccion 
        FROM cliente WHERE correo = ?';
        $params = array($this->correo);
        return Database::getRow($sql, $params);
    }

    public function updateCliente()
    {
        $sql = 'UPDATE cliente SET nombreCliente = ?, apellidoCliente = ?, correo = ?,
						direccion = ?, img = ? WHERE idCliente = ?';
        $params = array(
            $this->nombres, $this->apellidos, $this->correo, $this->direccion,
            $this->img, $_SESSION['idCliente']
        );
        return Database::executeRow($sql, $params);
    }

    public function updateContrasena()
    {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente SET contrasena = ? WHERE idCliente = ?';
        $params = array($hash, $_SESSION['idCliente']);
        return Database::executeRow($sql, $params);
    }

    public function updateContrasenaCorreo()
    {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente SET contrasena = ? WHERE correo = ?';
        $params = array($hash, $this->correo);
        return Database::executeRow($sql, $params);
    }

    public function getImagenCliente()
    {
        $sql = 'SELECT img FROM cliente WHERE correo = ?';
        $params = array($this->correo);
        return Database::getRow($sql, $params);
    }

    public function leerAutenticacion($correo)
	{
		if ($correo) {
			$sql = 'SELECT autenticacion FROM cliente WHERE correo = ?';
			$param = $this->correo;
		} else {
			$sql = 'SELECT autenticacion FROM cliente WHERE idCliente = ?';
			$param = $this->id;
		}
		$params = array($param);
		$auth = Database::getRow($sql, $params);
		return  json_decode($auth['autenticacion'], true);
	}

	public function updateAutenticacion() {
		$sql = 'UPDATE cliente SET autenticacion = ? WHERE correo = ?';
		$params = array($this->autenticacion,$this->correo);
		return Database::executeRow($sql, $params);
	}
}
