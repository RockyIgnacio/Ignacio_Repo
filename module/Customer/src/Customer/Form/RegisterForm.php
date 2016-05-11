<?php
/**
 * Created by PhpStorm.
 * User: IGNACIO
 * Date: 5/2/2016
 * Time: 8:42 PM
 */

namespace Customer\Form;


use Zend\Form\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct('register');

        $this->add(array(
            'name' => 'email',
            'type' => 'Email',
            'options' => array(
                'label' => 'Email: ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password: ',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'pass'
            ),
        ));
        $this->add(array(
            'name' => 'confirmpassword',
            'type' => 'password',
            'options' => array(
                'label' => 'Confirm Password: ',
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'Cpass',
            ),
        ));

        $this->add(array(
            'name' => 'company_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Company Name : ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));

        $this->add(array(
            'name' => 'first_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'First Name : ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));

        $this->add(array(
            'name' => 'last_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Last Name : ',
            ),
            'attributes' => array(
                'class' => 'form-control'
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Sign Up',
                'id' => 'submitbutton',
                'class' => 'btn btn-default btn-primary'
            ),
        ));
    }
}