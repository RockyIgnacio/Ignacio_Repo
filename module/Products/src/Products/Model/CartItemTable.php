<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 5/3/2016
 * Time: 7:28 PM
 */

namespace Products\Model;


use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\Controller\AbstractActionController;

class CartItemTable extends AbstractActionController
{
    protected  $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;

    }

    public function saveCartItem($cartId, $productId, $productWeight, $qty, $unitPrice, $price){

        $data = array(
            'cart_id'      => $cartId,
            'product_id'   => $productId,
            'weight'       => $productWeight,
            'qty'          => $qty,
            'unit_price'   => $unitPrice,
            'price'        => $price,

        );

        $this->tableGateway->insert($data);

        return $this->tableGateway->getLastInsertValue();

    }


    public function getAllCartItem($cartId)
    {
        $data = $this->tableGateway->getSql()->select();
        $data->columns(array( 'qty' => new \Zend\Db\Sql\Expression('SUM(qty)'), 'price' => new \Zend\Db\Sql\Expression('SUM(cart_items.price)'), 'unit_price' => 'unit_price', 'weight' => 'weight'  ));
        $data->join(array('p' => 'products'),'cart_items.product_id = p.product_id',array('product_name','product_desc', 'product_thumbnail'), 'left');
        $data->where(array('cart_id' => $cartId));
        $data->group('cart_items.product_id');
        $resultSet = $this->tableGateway->selectWith($data);

        $result = array();
        foreach($resultSet as $productCartItem){
            $result[] = $productCartItem;
        }

        return $result;

    }

    public function getWeight($cartId)
    {
        $data = $this->tableGateway->getSql()->select();
        $data->columns(array( 'weight' => new \Zend\Db\Sql\Expression('SUM(weight)')));
        $data->where(array('cart_id' => $cartId));
        $data->group('cart_id');
        $resultSet = $this->tableGateway->selectWith($data);

        $result = array();
        foreach($resultSet as $productCartItem){
            $result[] = $productCartItem;
        }
        
        return $result;

    }


   

}