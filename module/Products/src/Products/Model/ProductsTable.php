<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/28/2016
 * Time: 8:06 PM
 */

namespace Products\Model;


use Zend\Db\TableGateway\TableGateway;

class ProductsTable
{
    Protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getProduct($id)
    {
        $resultSet = $this->tableGateway->select(array('product_id' => $id));

        return $resultSet->count() > 0 ? $resultSet->current() : null;
    }

    
    
    


}