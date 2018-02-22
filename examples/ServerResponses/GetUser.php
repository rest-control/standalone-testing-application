<?php

namespace Examples\ServerResponses;

use RestControl\ApiClient\ApiClientRequest;
use RestControl\ApiClient\ApiClientResponse;
use RestControl\Utils\MockApiResponseInterface;

class GetUser implements MockApiResponseInterface
{
    /**
     * @var array
     */
    protected $users = [
        1 => [
            'id' => 1,
            'name' => 'Leanne Graham',
            'username' => 'Bret',
            'email' => 'Sincere@april.biz',
            'address' => [
                'street' => 'Kulas Light',
                'suite' => 'Apt. 556',
                'city' => 'Gwenborough',
                'zipcode' => '92998-3874',
                'geo' => [
                    'lat' => '-37.3159',
                    'lng' => '81.1496',
                ],
            ],
            'phone' => '1-770-736-8031 x56442',
            'website' => 'hildegard.org',
            'company' => [
                'name'        => 'Romaguera-Crona',
                'catchPhrase' => 'Multi-layered client-server neural-net',
                'bs'          => 'harness real-time e-markets',
                'constValue'  => 'sampleValue',
            ],
        ],
        2 => [
            'id' => 2,
            'name' => 'Ervin Howell',
            'username' => 'Antonette',
            'email' => 'Shanna@melissa.tv',
            'address' => [
                'street' => 'Victor Plains',
                'suite' => 'Suite 879',
                'city' => 'Wisokyburgh',
                'zipcode' => '90566-7771',
                'geo' => [
                    'lat' => '-43.9509',
                    'lng' => '-34.4618',
                ],
            ],
            'phone' => '010-692-6593 x09125',
            'website' => 'anastasia.net',
            'company' => [
                'name' => 'Deckow-Crist',
                'catchPhrase' => 'Proactive didactic contingency',
                'bs' => 'synergize scalable supply-chains',
                'constValue'  => 'sampleValue',
            ],
        ],
        3 => [
            'id' => 3,
            'name' => 'Clementine Bauch',
            'username' => 'Samantha',
            'email' => 'Nathan@yesenia.net',
            'address' => [
                'street' => 'Douglas Extension',
                'suite' => 'Suite 847',
                'city' => 'McKenziehaven',
                'zipcode' => '59590-4157',
                'geo' => [
                    'lat' => '-68.6102',
                    'lng' => '-47.0653',
                ],
            ],
            'phone' => '1-463-123-4447',
            'website' => 'ramiro.info',
            'company' => [
                'name' => 'Romaguera-Jacobson',
                'catchPhrase' => 'Face to face bifurcated interface',
                'bs' => 'e-enable strategic applications',
                'constValue'  => 'sampleValue',
            ],
        ],
    ];

    /**
     * Returns full endpoint url.
     *
     * e.q. 'get::http://sample.site/sample/endpoint/{id}'
     *
     * @return string
     */
    public function getUrl()
    {
        return 'get::sample.service/users/{id}';
    }

    /**
     * Transform $request into $apiClientResponse.
     *
     * @param ApiClientRequest $request
     * @param array            $routeParams
     *
     * @return \RestControl\ApiClient\ApiClientResponse
     */
    public function getApiClientResponse(ApiClientRequest $request, array $routeParams)
    {
        if(!isset($routeParams['id'])) {
            return new ApiClientResponse(404, [], '');
        }

        return $this->getUser($request, $routeParams['id']);
    }

    /**
     * @param ApiClientRequest $request
     * @param string           $userId
     *
     * @return ApiClientResponse
     */
    protected function getUser(ApiClientRequest $request, $userId)
    {
        if(!isset($this->users[$userId])) {
            return new ApiClientResponse(404, '');
        }

        return new ApiClientResponse(200, [
            'Content-Type' => 'application/json'
        ], json_encode($this->users[$userId]));
    }
}