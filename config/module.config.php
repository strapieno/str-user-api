<?php

return [
    'router' => [
        'routes' => [
            'api-rest' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/rest'
                ],
                'child_routes' => [
                    'user' => [
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => [
                            'route' => '/user[/:user_id]',
                            'defaults' => [
                                'controller' => 'Strapieno\User\Api\V1\Rest\Controller'
                            ],
                            'constraints' => [
                                'user_id' => '[0-9a-f]{24}'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'matryoshka-apigility' => [
        'matryoshka-connected' => [
                'Strapieno\User\Api\V1\Rest\ConnectedResource' => [
                'model' => 'Strapieno\User\Model\UserModelService',
                'collection_criteria' => 'Strapieno\User\Model\Criteria\UserCollectionCriteria',
                'entity_criteria' => 'Strapieno\Model\Criteria\NotIsolatedActiveRecordCriteria'
            ]
        ]
    ],
    'zf-rest' => [
        'Strapieno\User\Api\V1\Rest\Controller' => [
            'service_name' => 'user',
            'listener' => 'Strapieno\User\Api\V1\Rest\ConnectedResource',
            'route_name' => 'api-rest/user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                'user_name',
                'email',
                'first_name',
                'last_name',
                'order_by',
            ],
            'page_size' => 10,
            'page_size_param' => 'page_size',
            'collection_class' => 'Zend\Paginator\Paginator', // FIXME function?
        ]
    ],
    'zf-content-negotiation' => [
        'accept_whitelist' => [
            'Strapieno\User\Api\V1\Rest\Controller' => [
                'application/hal+json',
                'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Strapieno\User\Api\V1\Rest\Controller' => [
                'application/json'
            ],
        ],
    ],
     'zf-hal' => [
        // map each class (by name) to their metadata mappings
        'metadata_map' => [
            'Strapieno\User\Model\Entity\UserEntity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rest/user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'UserApiHydrator',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Strapieno\User\Api\V1\Rest\Controller' => [
            'input_filter' => 'Strapieno\User\Model\InputFilter\DefaultInputFilter',
            'POST' => 'Strapieno\User\Model\InputFilter\CreateInputFilter'
        ]
    ]
];
