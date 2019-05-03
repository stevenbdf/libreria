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
        $this->tipoReaccion = $value;
        return true;
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

    public function updateAprobacion()
    {
        $sql = 'UPDATE aprobacion SET tipo = ?  WHERE idAprobacion = ?';
        $params = array($this->tipoReaccion, $this->idReaccion);
        return Database::executeRow($sql, $params);
    }
}
