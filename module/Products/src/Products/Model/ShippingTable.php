<?php
/**
 * Created by PhpStorm.
 * User: IGNACIO
 * Date: 5/5/2016
 * Time: 4:37 AM
 */

namespace Products\Model;


use Zend\Db\TableGateway\TableGateway;

class ShippingTable
{   Protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getMaxGround($shippingMethod)
    {

        $data = $this->tableGateway->getSql()->select();
        $data->columns(array( 'max_weight' => new \Zend\Db\Sql\Expression('MAX(max_weight)') , 'shipping_rate' => new \Zend\Db\Sql\Expression('MAX(shipping_rate)')));
        $data->where(array('shipping_method' => $shippingMethod));
        $resultSet = $this->tableGateway->selectWith($data);

        $result = array();
        foreach($resultSet as $productCartItem){
            $result[] = $productCartItem;
        }

        return $result;
    }


    public function getRate($totalWeight, $shippingMethod)
    {
        $data = $this->tableGateway->getSql()->select();
        $data->columns(array( 'shipping_rate' => 'shipping_rate'));
        $data->where(array('shipping_method' => $shippingMethod));
        $data->where->lessThan('min_weight' , $totalWeight);
        $data->where->greaterThan('max_weight' , $totalWeight);
        $resultSet = $this->tableGateway->selectWith($data);
        
        $result = array();
        foreach($resultSet as $productCartItem){
            $result[] = $productCartItem;
        }

        return $result;
    }
}