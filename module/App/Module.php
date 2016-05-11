<?php
namespace App;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sessionManager = new SessionManager();
        $sessionManager->start();
        $Session = new Container();

/*        $application = $e->getParam('application');
        $viewModel = $application->getMvcEvent()->getViewModel();
        $viewModel->setVariable('first_name', $Session->first_name);
        $viewModel->setVariable('last_name', $Session->last_name);*/

       // var_dump($Session->first_name);
        
        
        //$Session->first_name = 'Chellai';

        //$Session->offsetSet('first_name', 'Rocky');
        //$Session->offsetSet('last_name', 'Ignacio');

        //isset($Session->first_name);

        //$Session->offsetGet('first_name');

        /*unset($Session->first_name);
        $Session->offsetUnset('first_name');
        */

        // get configurations
       // $config = $sm->get('Configuration');

        /**
         * Set app_config to layouts or views.
         */
       // $application = $e->getParam('application');
       // $viewModel = $application->getMvcEvent()->getViewModel();
       // $viewModel->setVariables($config['app_config']);
    }

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


   /* public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Container' => function()
                {
                    return new Container();
                }
            )
        );


    }*/
}