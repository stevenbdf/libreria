<?php
class Reacciones extends Validator
{
    //Declaración de propiedades
    private $idReaccion = null;
    private $idCliente = null;
    private $idProducto = null;
    private $tipoReaccion = null;

    //Métodos para sobrecarga de propiedades
    public function setIdReaccion($value)
    {
        if ($this->validateId($value)) {
            $this->idReaccion = $value;
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

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdProducto($value)
    {
        if ($this->validateId($value)) {
            $this->idProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setTipoReaccion($value)
    {
        if ($value == 0 || $value == 1) {
            $this->tipoReaccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getTipoReaccion()
    {
        return $this->tipoReaccion;
    }

    //Metodos para manejar el CRUD

    public function createReaccion()
    {
        $sql = 'INSERT INTO aprobacion(idLibro, idCliente, tipo) VALUES (?, ?, ?)';
        $params = array($this->idProducto, $this->idCliente, $this->tipoReaccion);
        return Database::executeRow($sql, $params);
    }

    public function readReaccionesEmpleado()
    {
        $sql = 'SELECT idAprobacion, idLibro, idCliente, tipo 
                FROM aprobacion WHERE idCliente = ? AND idLibro = ?
                ORDER BY idAprobacion';
        $params = array($this->idCliente, $this->idProducto);
        return Database::getRows($sql, $params);
    }

    public function updateReaccion()
    {
        $sql = 'UPDATE aprobacion SET tipo = ?  WHERE idCliente = ? AND idLibro = ?';
        $params = array($this->tipoReaccion, $this->idCliente, $this->idProducto);
        return Database::executeRow($sql, $params);
    }

    public function deleteReaccion()
    {
        $sql = 'DELETE FROM aprobacion WHERE idCliente = ? and idLibro = ?';
        $params = array($this->idCliente, $this->idProducto);
        return Database::executeRow($sql, $params);
    }
}
