<?php

// Layouts and views configurations
return array(
    'view_manager' => array(

        'layout' => 'MAIN_TPL',
        'base_path' => '/',
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/custom404',
        'exception_template'       => 'error/404',

        'template_map' => array(
            //Templates
            'MAIN_TPL'      => __DIR__ . '/../view/layout/templates/main.phtml',

            //Sections
            'APP_HEADER'  => __DIR__ . '/../view/layout/sections/header/app_header.phtml',
            'APP_SCRIPTS' => __DIR__ . '/../view/layout/sections/header/app_scripts.phtml',

            //Pages
            'INDEX'         => __DIR__ . '/../view/layout/pages/index.phtml',

        ),

        'template_path_stack' => array(
            'site'          =>  __DIR__ . '/../view',
        ),

    ),
);
