<?php

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Update;

class SubscriptoresMapper
{

    protected $adapter = null;

    public function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Method to save subscriptores
     */
    public function store($data)
    {
        $data = ($data instanceof Subscriptores) ? (array) $data : (array) $this->setObjectData($data);
        $sql = new Sql($this->adapter);
        $insert = new Insert('subscriptores');
        $insert->values($data);
        $result = $sql->prepareStatementForSqlObject($insert)->execute();
        if ($result->getAffectedRows() === 0) {
        	return false;
        } else {
        	return $sql->getAdapter()->getDriver()->getLastGeneratedValue();
        }
    }

    /**
     * Method to update subscriptores
     */
    public function update($data, $id)
    {
        $data = ($data instanceof Subscriptores) ? (array) $data : (array) $this->setObjectData($data);
        unset($data['id']);
        $sql = new Sql($this->adapter);
        $update = new Update('subscriptores');
        $update->set($data);
        $update->where(['id' => $id]);
        $result = $sql->prepareStatementForSqlObject($update)->execute();
        return $result->getAffectedRows();
    }

    /**
     * Method to delete subscriptores
     */
    public function delete($id, $softDelete = true)
    {
        $sql = new Sql($this->adapter);
        $delete = new Delete('subscriptores');
        $delete->where(['id' => $id]);
        $result = $sql->prepareStatementForSqlObject($delete)->execute();
        return $result->getAffectedRows();
    }

    /**
     * Method to get subscriptores
     */
    public function get($id)
    {
        $sql = new Sql($this->adapter);
        $select = new Select('subscriptores');
        $select->where(['id' => $id]);
        $result = $sql->prepareStatementForSqlObject($select)->execute();
        if ( $result->count() > 0){
        	return $this->setObjectData($result->current());
        }else{
        	return false;
        }
    }

    /**
     * Method to get all subscriptores
     */
    public function getAll()
    {
        $sql = new Sql($this->adapter);
        $select = new Select('subscriptores');
        $result = $sql->prepareStatementForSqlObject($select)->execute();
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
        	$resultSet = new HydratingResultSet();
        	$resultSet->setHydrator(new ObjectProperty());
        	$resultSet->setObjectPrototype(new Subscriptores());
        	$resultSet->initialize($result);
        	return $resultSet;
        } else {
        	return false;
        }
    }

    /**
     * Return instance of Subscriptores
     */
    public function setObjectData($data)
    {
        $subscriptores = new Subscriptores();
        $subscriptores->exchangeArray($data);
        return $subscriptores;
    }


}

