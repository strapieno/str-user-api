<?php

return [
    'router' => [
        'routes' => [
            'api-rest' => [
                'type' => 'Literal',
                'options' => [
                    'route' => 'rest'
                ],
                'child_routes' => [
                    'user' => [
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => [
                            'route' => '/user[/:user_id]',
                            'defaults' => [
                                'controller' => 'Strapieno\User\Api\V1\Rest\Controller',
                            ],
                            'constraints' => [
                                'user_id' => '[0-9a-f]{24}',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'matryoshka-apigility' => [
        'matryoshka-connected' => [
            'Strapieno\User\Api\V1\Rest\ConnectedResource' => [
                'model' => 'Strapieno\User\Model\UserModelService',
                'collection_criteria' => 'Strapieno\User\Model\Criteria\UserCollectionCriteria',
                'entity_criteria' => 'Strapieno\User\Model\Criteria\NotIsolatedActiveRecordCriteria'
            ],
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
                'user_name',    // TODO
                'email',        // TODO
                'order_by',     // TODO
            ],
            'page_size' => 10,
            'page_size_param' => 'page_size',
            'collection_class' => 'Zend\Paginator\Paginator', // FIXME function?
        ],
    ],
];
