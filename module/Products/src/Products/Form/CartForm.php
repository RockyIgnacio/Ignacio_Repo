<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 5/5/2016
 * Time: 12:33 AM
 */

namespace Products\Form;


use Zend\Form\Form;

class CartForm extends Form
{

        public function __construct()
    {
        parent::__construct('cart');

        $this->add(array(
            'name' => 'shipping_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'shipping_address1',
            'type' => 'Text',
            'options' => array(
                'label' => 'Address 1: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'shipping_address2',
            'type' => 'Text',
            'options' => array(
                'label' => 'Address 2: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'shipping_address3',
            'type' => 'Text',
            'options' => array(
                'label' => 'Address 3: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'shipping_city',
            'type' => 'Text',
            'options' => array(
                'label' => 'City: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));

        $this->add(array(
            'name' => 'shipping_state',
            'type' => 'Text',
            'options' => array(
                'label' => 'State: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'shipping_country',
            'type' => 'Text',
            'options' => array(
                'label' => 'Country: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'continue',
            'type' => 'submit',

            'attributes' => array(
                'class' => 'form-control continue btn-primary',
                'value' => 'Continue'
            ),
        ));

    }


}