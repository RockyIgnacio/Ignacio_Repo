<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 5/2/2016
 * Time: 11:32 PM
 */

namespace Products\Model;


use Zend\Db\TableGateway\TableGateway;

class CartTable
{
    protected $tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;

    }

    public function saveCart(){

        $data = array(
            'customer_id'        => 0,
            'order_datetime'     => date('Y-m-d H:i:s'),
            'sub_total'          => 0,
            'taxable_amount'     => 0,
            'discount'           => 0,
            'tax'                => 0,
            'shipping_total'     => 0,
            'total_amount'       => 0,
            'total_weight'       => 0,
            'company_name'       => null,
            'email'              => 'none',
            'first_name'         => 'none',
            'last_name'          => 'none',
            'phone'              => null,
            'shipping_mehod'     => 'none',
            'shipping_name'      => 'none',
            'shipping_address1'  => 'none',
            'shipping_address2'  => null,
            'shipping_address3'  => null,
            'shipping_city'      => 'none',
            'shipping_state'     => 'none',
            'shipping_country'   => 'none',
        );

        $this->tableGateway->insert($data);

        return $this->tableGateway->getLastInsertValue();
    }

    public function updateCart($cartid, $email, $CustomerData, $dataPost)

    {
        foreach ($CustomerData as $customerData ) {
            $customerId = $customerData->customer_id;
            $customerCompany = $customerData->company_name;
            $customerFirstName = $customerData->first_name;
            $customerLastName = $customerData->last_name;
            $customerEmail = $customerData->email;
        }
        $CartData = $this->getCart($cartid);

        foreach ( $CartData as $cartData  ) {
            $totalWeight = $cartData->weight;
        }

            $shipName = $dataPost["shipping_name"];
            $shipAdd1 = $dataPost["shipping_address1"];
            $shipAdd2 = $dataPost["shipping_address2"];
            $shipAdd3 = $dataPost["shipping_address3"];
            $shipCity = $dataPost["shipping_city"];
            $shipState = $dataPost["shipping_state"];
            $shipCountry = $dataPost["shipping_country"];



        var_dump($CartData);


       /* var_dump($shipCountry);
        var_dump($shipState);*/


        
        $data = array(
            'customer_id'        => $customerId,
            'order_datetime'     => date('Y-m-d H:i:s'),
            'sub_total'          => 0,//cart
            'taxable_amount'     => 0,
            'discount'           => 0,
            'tax'                => 0,
            'shipping_total'     => 0,
            'total_amount'       => 0,
            'total_weight'       => $totalWeight,
            'company_name'       => $customerCompany,
            'email'              => $customerEmail,
            'first_name'         => $customerFirstName,
            'last_name'          => $customerLastName,
            'phone'              => null,
            'shipping_mehod'     => 'none',
            'shipping_name'      => $shipName,
            'shipping_address1'  => $shipAdd1,
            'shipping_address2'  => $shipAdd2,
            'shipping_address3'  => $shipAdd3,
            'shipping_city'      => $shipCity,
            'shipping_state'     => $shipState,
            'shipping_country'   => $shipCountry,
        );

           $this->tableGateway->update($data, array('cart_id' => $cartid));
    }


    public function getCart($cartid)
    {
        $data = $this->tableGateway->getSql()->select();
        $data->columns(array( 'cart_id' => 'cart_id'));
        $data->join(array('ci' => 'cart_items'),'carts.cart_id = ci.cart_id',array('price' => new \Zend\Db\Sql\Expression('SUM(ci.price)'),'weight' => new \Zend\Db\Sql\Expression('SUM(weight)')), 'left');
        $data->where(array('carts.cart_id' => $cartid));
        $data->group('carts.cart_id');
        $resultSet = $this->tableGateway->selectWith($data);

        $result = array();
        foreach($resultSet as $productCartItem){
            $result[] = $productCartItem;
        }
        //echo $data->getSqlString()
;        return $result;
    }



}