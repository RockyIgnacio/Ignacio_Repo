<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/28/2016
 * Time: 4:37 PM
 */

namespace Products\Controller;


use Products\Model\Cart;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ProductsController extends AbstractActionController
{

    public function sessionNetwork()
    {
        /*$sm = $this->getServiceLocator();
        $Container = $sm->get('Container');
        $first_name = $Container->offsetGet('first_name');

        $this->layout()->setVariable('first_name', 'yohann');

        $viewModel = array(
            'first_name' => $first_name
        );


        return $viewModel;*/
    }

    public function indexAction()
    {
        $sm = $this->getServiceLocator();
        $ProductsTable = $sm->get('ProductsTable');
        $products = $ProductsTable->fetchAll();


        $viewData = array(
            "products" => $products,
           
        );
        //$session = $this->sessionNetwork();

        return new ViewModel($viewData);//,$session);

    }

    public function viewproductAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $sm = $this->getServiceLocator();
        $ProductsTable = $sm->get('ProductsTable');
        $products = $ProductsTable->getProduct($id);
        /*var_dump($products);*/
        $getData = array(
          "product" => $products,
        );

        //$session = $this->sessionNetwork();

        return new ViewModel($getData);//,$session);



    }

    public function addcartAction()
    {
        
        $request = $this->getRequest();
        $id = $request->getPost('id');
        $sm = $this->getServiceLocator();
        $ProductTable = $sm->get('ProductsTable');
        $product = $ProductTable->getProduct($id);

        $id = $product->product_id;

        $productUnitPrice = $product->price;
        $productQty = $request->getPost('quantity');
        $productWeight = $product->weight *$productQty;

        $productPrice = $productUnitPrice*$productQty;

        $CartSession = $sm->get('CartContainer');

        if(!isset($CartSession->CartSessionChecker)){
            $CartSession->CartSessionChecker = 1;
            $CartTable = $sm->get('CartTable');
            $cartData = $CartTable->saveCart();
            var_dump($cartData);



            $CartSession->cartId = $cartData;

            $CartItemTable = $sm->get('CartItemTable');
            $CartItemTable->saveCartItem($CartSession->cartId, $id, $productWeight, $productQty, $productUnitPrice, $productPrice);//$cartId, $productId, $qty, $unitPrice, $price

        } else
        {
            $CartItemTable = $sm->get('CartItemTable');
            $CartItemTable->saveCartItem($CartSession->cartId, $id, $productWeight, $productQty, $productUnitPrice, $productPrice);//$cartId, $productId, $qty, $unitPrice, $price

            echo 'hell yeah!';
        }


        //$this->redirect()->toRoute('cart');


    }

    public function cartlistAction()
    {
        $sm = $this->getServiceLocator();
        $CartSession = $sm->get('CartContainer');
        $CartItemTable = $sm->get('CartItemTable');
        $cartItems = $CartItemTable->getAllCartItem($CartSession->cartId);

        $viewData = array(
            "cartItems" => $cartItems,
            "try" => "hi!",
        );


        return new ViewModel($viewData);

    }

    public function checksessionAction()
    {
        $sm = $this->getServiceLocator();
        $Session = $sm->get('UserContainer');

        echo $Session->first_name.'wala?';
       if (!isset($Session->first_name)) {
           $this->redirect()->toRoute('customer');
        } else {

           $this->redirect()->toRoute('cart', array(
               'controller'=> 'Products\Controller\Products',
               'action' => 'shipping'
           ));
       }

    }

    public function getWeightRate($method)
    {
        $sm = $this->getServiceLocator();
        $CartSession = $sm->get('CartContainer');
        $CartTable = $sm->get('CartItemTable');
        $cart = $CartTable->getWeight($CartSession->cartId);

        $weight = $cart[0]->weight;
        $ShippingMethod = $method;
        $shippingTable = $sm->get('ShippingTable');
        $shipping = $shippingTable->getMaxGround($ShippingMethod);
        $maxWeight = $shipping[0]->max_weight;
        $maxWeightRate = $shipping[0]->shipping_rate;

        $addThisRate =0;
        if ($weight > $maxWeight) {
            while($weight > $maxWeight) {
                $weight = $weight - $maxWeight;
                $addThisRate = $addThisRate + $maxWeightRate;
            }
            $checkWeight = $weight;
        } else {
            $checkWeight= $weight;
        }
        $CompareMaxMin = $shippingTable->getRate(ceil($checkWeight), $ShippingMethod);


        $data = array(
            $CompareMaxMin,
            $addThisRate,
        );
        return $data;

    }

    public function shippingAction()
    {
       $ground = $this->getWeightRate('Ground');
        var_dump($ground);
        $expedited = $this->getWeightRate('Expedited');

        $sm = $this->getServiceLocator();
         $CartSession = $sm->get('CartContainer');
         $CartTable = $sm->get('CartItemTable');
         $cart = $CartTable->getWeight($CartSession->cartId);

        $CartForm = $sm->get('CartForm');

        $request = $this->getRequest();

        if($request->isPost()) {
            $CartFilter = $sm->get('CartFilter');
            $CartForm->setInputFilter($CartFilter);
            $CartForm->setData($request->getPost());

            if ($CartForm->isValid()) {
                $Cart = $sm->get('Cart');
                //$CartTable = $sm->get('CartTable');
                $Cart->exchangeArray($CartForm->getData());

            }
        }



        $viewData = array(
            "cart" => $cart,
            "groundShipingRate" => $ground,//$groundCompareMaxMin,
            //"maxRate" => $addThisGroundRate,
            "expeditedShipingRate" => $expedited,//$expeditedCompareMaxMin,
            //"expedited" => $addThisExpeditedRate,
            "form" => $CartForm,

        );



        return new ViewModel($viewData);

    }
  
    public function addcartprocessAction()
    {
        $sm = $this->getServiceLocator();
        $CartSession = $sm->get('CartContainer');
        $UserSession = $sm->get('UserContainer');
        $CustomerInfo = $sm->get('CustomerTable');
        //$ProductTable = $sm->get('ProductTable');
        $CartForm = $sm->get('CartForm');
        $CartTable = $sm->get('CartTable');




        $request = $this->getRequest();
        if ($request->isPost()) {
            $CartFilter = $sm->get('CartFilter');
            $CartForm->setInputFilter($CartFilter);
            $CartForm->setData($request->getPost());

            if ($CartForm->isValid()) {
                $Cart = $sm->get('Cart');
                $CartForm->getData();


                $datapost = $Cart->exchangeArray($CartForm->getData());

                $email = $UserSession->first_name;
                $cartid = $CartSession->cartId;
                $CustomerData = $CustomerInfo->getCustomerInfo($email);

                $datapost = $CartForm->getData();
                var_dump($datapost);

                $CartTable->updateCart($cartid, $email, $CustomerData, $datapost);
                //$CartTable->saveAlbum($Cart);
                //$this->redirect()->toRoute('album');
                //var_dump($datapost);

            }
        }


            



    }


}