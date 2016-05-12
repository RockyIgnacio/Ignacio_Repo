<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/29/2016
 * Time: 6:50 PM
 */

namespace Customer\Controller;

use Customer\Form\RegisterForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CustomerController extends AbstractActionController
{

/*    public function sessionNetwork($customerName)
    {

        $sm = $this->getServiceLocator();
        $Container = $sm->get('Container');
        $first_name = $Container->offsetGet('first_name');

        $this->layout()->setVariable('first_name', $customerName);

        $viewModel = array(
            'first_name' => $first_name
        );


        return $viewModel;
    }*/

    public function loginAction()
    {

        $sm = $this->getServiceLocator();
        $LoginForm = $sm->get('LoginForm');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $LoginFilter = $sm->get('LoginFilter');
            $LoginForm->setInputFilter($LoginFilter);
            $LoginForm->setData($request->getPost());

            if ($LoginForm->isValid()) {

                $Customer = $sm->get('Customer');
                $CustomerTable = $sm->get('CustomerTable');
                $Customer->exchangeArray($LoginForm->getData());
                
                $email = $Customer->email;
                $pass = $Customer->password;
                $data = $CustomerTable->authUser($email, $pass);
                $name = $data->first_name;
                if ($data== null) {
                    echo 'Invalid Authentication';
                } else {
                    
                    $sm = $this->getServiceLocator();
                    $Session = $sm->get('UserContainer');
                    $CartSession = $sm->get('CartContainer');

                    $Session->first_name = $name;

                    if (!isset($CartSession->CartSessionChecker)) {
                        $this->redirect()->toRoute('home');
                    } else {
                        $this->redirect()->toRoute('cart', array(
                            'controller'=> 'Products\Controller\Products',
                            'action' => 'shipping'
                        ));
                    }
                }
            }
        }


        return new ViewModel(array("login" => $LoginForm));

        
    }

    public function registerAction()
    {
        $sm = $this->getServiceLocator();
        $RegisterForm = $sm->get('RegisterForm');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $RegisterFilter = $sm->get('RegisterFilter');
            $RegisterForm->setInputFilter($RegisterFilter);
            $RegisterForm->setData($request->getPost());

            if ($RegisterForm->isValid()) {
                $CustomerRegister = $sm->get('Customer');
                $RegisterTable = $sm->get('CustomerTable');
                $CustomerRegister->exchangeArray($RegisterForm->getData());
                $RegisterTable->saveRegistration($CustomerRegister);

                $email = $CustomerRegister->email;


                $sm = $this->getServiceLocator();
                $Session = $sm->get('UserContainer');
                $CartSession = $sm->get('CartContainer');

                $Session->first_name = $email;

                if (!isset($CartSession->CartSessionChecker)) {
                    $this->redirect()->toRoute('home');
                } else {
                    $this->redirect()->toRoute('cart', array(
                        'controller'=> 'Products\Controller\Products',
                        'action' => 'shipping'
                    ));
                }

            }
        }

        return new ViewModel(array("register" => $RegisterForm));

    }

    public function indexAction()
    {
        $sm = $this->getServiceLocator();
        $login = $sm->get('LoginForm');
        $register = $sm->get('RegisterForm');

        return new ViewModel(array(
            'login' => $login,
            'register' => $register
        ));

    }

    public function logoutAction()
    {
        session_destroy();
        $this->redirect()->toRoute('home');

    }
}