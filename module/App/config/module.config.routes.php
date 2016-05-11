<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                    'type'    => 'literal',
                    'options' => array(
                            'route'    => '/',
                            'defaults' => array(
                                    'controller' => 'App\Controller\Index',
                                    'action'     => 'view',
                            ),
                    ),
            ),
        ),
    )
);
