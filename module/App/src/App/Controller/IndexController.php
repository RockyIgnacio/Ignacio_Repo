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

        
        $viewModel = new ViewModel();
        $viewModel->setTemplate('APP_HEADER');

        return $viewModel;
    }
}