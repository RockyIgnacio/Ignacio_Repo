<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/28/2016
 * Time: 4:31 PM
 */

namespace Products;


use Products\Filter\CartFilter;
use Products\Filter\ProductsFilter;
use Products\Form\CartForm;
use Products\Form\ProductsForm;
use Products\Model\Cart;
use Products\Model\CartItem;
use Products\Model\CartItemTable;
use Products\Model\CartTable;
use Products\Model\Products;
use Products\Model\ProductsTable;
use Products\Model\Shipping;
use Products\Model\ShippingTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Session\Container;

class Module
{
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                //====================================Products
                'ProductsTable' => function ($sm) {

                    $ProductsTableGateway = $sm->get('ProductsTableGateway');

                    return new ProductsTable($ProductsTableGateway);
                },

                'ProductsTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Products());
                    return new TableGateway('products', $dbAdapter, null, $resultSetPrototype);
                },

                'Products' => function ()
                {
                    return new Products();
                },

                'ProductsForm' => function ()
                {
                    return new ProductsForm();
                },

                'ProductFilter' => function ()
                {
                    return new ProductsFilter();
                },

                //====================================CartTable
                'CartTable' => function ($sm)
                {
                    $CartTableGateway = $sm->get('CartTableGateway');
                    return new CartTable($CartTableGateway);
                },

                'CartTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Cart());
                    return new TableGateway('carts', $dbAdapter, null, $resultSetPrototype);
                },

               'Cart' => function ()
               {
                    return new Cart();
               },


                'CartContainer' => function ()
                {
                    return new Container();
                },

                'CartForm' => function ()
                {
                  return new CartForm();  
                },

                'CartFilter' => function ()
                {
                  return new CartFilter();
                },


                //====================================CartItems
                'CartItemTable' => function ($sm)
                {
                    $CartItemTableGateway = $sm->get('CartItemTableGateway');
                    return new CartItemTable($CartItemTableGateway);
                },

                'CartItemTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new CartItem());
                    return new TableGateway('cart_items', $dbAdapter, null, $resultSetPrototype);
                },

                'CartItem' => function ()
                {
                    return new CartItem();
                },


                //====================================Shipping
                'ShippingTable' => function ($sm)
                {
                    $ShippingTableGateway = $sm->get('ShippingTableGateway');
                    return new ShippingTable($ShippingTableGateway);
                },

                'ShippingTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Shipping());
                    return new TableGateway('shipping', $dbAdapter, null, $resultSetPrototype);
                },

                'Shipping' => function ()
                {
                    return new Shipping();
                },




            )
        );
    }
}