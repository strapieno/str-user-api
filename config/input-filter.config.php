<?php
return [
    'invokables' => [
        'Strapieno\User\Api\V1\InputFilter\InputFilter' => 'Strapieno\User\Api\V1\InputFilter\InputFilter',
        'Strapieno\User\Api\V1\InputFilter\PostInputFilter' => 'Strapieno\User\Api\V1\InputFilter\PostInputFilter'
    ],
    'aliases' => [
        'UserInputFilter' => 'Strapieno\User\Api\V1\InputFilter\InputFilter',
        'UserPostInputFilter' => 'Strapieno\User\Api\V1\InputFilter\PostInputFilter'
    ]
];