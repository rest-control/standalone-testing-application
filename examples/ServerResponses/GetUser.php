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
                'name' => 'Romaguera-Crona',
                'catchPhrase' => 'Multi-layered client-server neural-net',
                'bs' => 'harness real-time e-markets',
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