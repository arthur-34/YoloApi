<?php


namespace App\Http\OpenApi\Registration;


use ApiPlatform\Core\OpenApi\Model\Operation;
use ApiPlatform\Core\OpenApi\Model\Parameter;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\Model\RequestBody;
use ArrayObject;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Elessa Maxime <elessamaxime@icloud.com>
 * @package App\Http\OpenApi\Registration
 */
class RegistrationPath
{
    public function addRegister($tag = 'tag', $operationId = 'default'): PathItem
    {
        return new PathItem(
            null, null, null, null, null,
            new Operation(
                $operationId,
                [$tag],
                [
                    Response::HTTP_OK => [
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' => [
                                        'success' => [
                                            'type' => 'string',
                                            'example' => 'successful registration!',

                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],

                ],
                'Log user with his credential.',
                '', null,
                [
                    new Parameter('username', 'query', '', true),
                    new Parameter('email', 'query', '', true),
                    new Parameter('phone', 'query', ''),
                    new Parameter('password', 'query', '', true),
                    new Parameter('confirm_password', 'query', '', true),
                ],
                new RequestBody(
                    $operationId,
                    new ArrayObject(
                        [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' => [
                                        'username' => [
                                            'type' => 'string',
                                            'example' => 'shakazulu',
                                        ],

                                        'email' => [
                                            'type' => 'string',
                                            'example' => 'black@gmail.com'
                                        ],
                                        'phone' => [
                                            'type' => 'string',
                                            'example' => '00000000'
                                        ],
                                        'password' => [
                                            'type' => 'string',
                                            'example' => 'azerty34567',
                                        ],
                                        'confirm_password' => [
                                            'type' => 'string',
                                            'example' => 'azerty34567'
                                        ],
                                    ],
                                ],
                            ],
                        ]
                    )
                )
            )
        );
    }
}