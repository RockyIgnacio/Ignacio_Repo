<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 4/29/2016
 * Time: 6:39 PM
 */
    return array(
        'controllers' => array(
            'invokables'    => array(
                'Customer\Controller\Customer'  => 'Customer\Controller\CustomerController',
            )
        ),
        'view_manager' => array(
            'template_path_stack' => array(
                'customer' => __DIR__ . '/../view',
            ),

            'template_map' => array(
                'LOGIN'      => __DIR__ . '/../view/customer/customer/login.phtml',
                'REGISTRATION'  => __DIR__ . '/../view/customer/customer/register.phtml',

            ),
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),

        'router' => array(
            'routes' => array(

                'customer' => array(
                    'type'  => 'Segment',
                    'options' => array(
                        'route'    => '/customer[/:action][/:id]',
                        'constraints' => array(
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id'     => '[0-9]+',
                        ),
                        'defaults' => array(
                            'controller' => 'Customer\Controller\Customer',
                            'action'     => 'index',
                        ),
                    ),
                )
            )
        ),




    );