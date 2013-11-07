<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'project_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/Project/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Project\Entity' => 'project_entity',
                )
            )
        )
    )
);