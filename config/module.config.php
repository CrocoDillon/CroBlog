<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'CroBlog\Controller\Blog' => 'CroBlog\Controller\BlogController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'cro-blog' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        '__NAMESPACE__' => 'CroBlog\Controller',
                        'controller'    => 'Blog',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'post' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route' => '/:slug',
                            'constraints' => array(
                                'slug' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'post',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'cro-blog' => __DIR__ . '/../view',
        ),
    ),
);
