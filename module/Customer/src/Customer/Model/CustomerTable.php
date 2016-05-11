<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/29/2016
 * Time: 7:11 PM
 */

namespace Customer\Model;


use Zend\Db\TableGateway\TableGateway;

class CustomerTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        return $this->tableGateway = $tableGateway;
    }


    public function authUser($email, $pass)
    {
            $data = array(
                'email' => $email,
                'password' => $pass
            );
        $resultSet = $this->tableGateway->select($data);

        return $resultSet->count() > 0 ? $resultSet->current() : null;
        

    }

    public function saveRegistration(Customer $Customer)
    {

        $data = array(
            "email" => $Customer->email,
            "password" => $Customer->password,
            "company_name" => $Customer->company_name,
            "first_name" => $Customer->first_name,
            "last_name" => $Customer->last_name,
        );

        $this->tableGateway->insert($data);

        return $this->tableGateway->getLastInsertValue();


    }


    public function getCustomerInfo($email)
    {
        $resultSet = $this->tableGateway->select(array('email' => $email));
        return $resultSet;
    }
    
    
}