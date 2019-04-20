<?php
class Bitacora extends Validator
{
  //Declaración de propiedades
  private $id = null;
    private $usuario = null;
    private $fecha=null;
    private $accion = null;

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

  public function setUsuario($value)
  {
        $this->usuario=$value;
        return true;
  }

  public function getUsuario()
  {
    return $this->nombre;
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

    public function setAccion($value)
  {
    $this->accion=$value;
    return true;
  }

  public function getAccion()
  {
    return $this->accion;
    }

  //Metodos para manejar el CRUD
  public function readBitacora()
  {
    $sql = 'SELECT idBitacora, nombreEmpleado, fecha, accion FROM bitacora INNER JOIN empleado ON empleado.idEmpleado = bitacora.idUsuario ORDER BY fecha asc';
    $params = array(null);
    return Database::getRows($sql, $params);
  }

  public function getBitacora()
  {
    $sql = 'SELECT idBitacora, nombreEmpleado, fecha, accion FROM bitacora INNER JOIN idBitacora = ?';
    $params = array($this->id);
    return Database::getRow($sql, $params);
  }
}
?>
