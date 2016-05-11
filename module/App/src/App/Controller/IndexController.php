<?php
namespace App\Controller;


use Zend\Session\Container;
//use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    
    
    public function viewAction()
    {

        /*$sm = $this->getServiceLocator();
        $container = $sm->get('Container');
        $name = $container->name;
        echo $name;
        $viewModel = new ViewModel();
        //$viewModel->setVariables(array('title' => 'THIS IS A SKELETON ZEND APP'));
        $viewModel->setTemplate('INDEX');


       /* $sm = $this->getServiceLocator();
        $Container = $sm->get('Container');
        $first_name = $Container->offsetGet('first_name');

        $this->layout()->setVariable('first_name', 'ignacio');

        $viewModel = array(
            'first_name' => $first_name
        );


        return $viewModel;*/

       /* $sm = $this->getServiceLocator();
        $container = $sm->get('Container');
        $name = $container->name;*/

        $viewModel = new ViewModel();
        $viewModel->setTemplate('APP_HEADER');

        return $viewModel;
    }
}