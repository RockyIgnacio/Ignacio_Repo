<?php
return array(
    'controllers' => array(
        'invokables'    => array(
            'Products\Controller\Products'  => 'Products\Controller\ProductsController',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'products' => __DIR__ . '/../view',
        ),
    ),
    'aliases' => array(
        'translator' => 'MvcTranslator',
    ),

    'router' => array(
        'routes' => array(
            
            'products' => array(
                'type'  => 'Segment',
                'options' => array(
                    'route'    => '/products[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action'     => 'index',
                    ),
                ),
            ),
            
            'cart' => array(
                'type'  => 'Segment',
                'options' => array(
                    'route'    => '/cart[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Products\Controller\Products',
                        'action'     => 'cartlist',
                    ),
                ),
            )
            
            
            
            
        )
    )
);