<?php

namespace Examples\Objects;

use RestControl\Utils\AbstractResponseItem;

/**
 * Class UserObject
 * @package Examples\Objects
 */
class UserObject extends AbstractResponseItem
{
    /**
     * @return array
     */
    public function getStructure()
    {
        return [
            'id'                  => 'int',
            'name'                => 'string',
            'username'            => 'string',
            'email'               => 'email',
            'address'             => [
                'street'  => 'string',
                'suite'   => 'string',
                'city'    => 'string',
                'zipcode' => 'string',
                'geo'     => [
                    'lat' => 'numeric',
                    'lng' => 'numeric',
                ],
            ],
            'phone'               => 'string',
            'website'             => 'uri',
            'company'             => [
                'name'        => 'string',
                'catchPhrase' => 'string',
                'bs'          => 'string',
            ],
        ];
    }
}