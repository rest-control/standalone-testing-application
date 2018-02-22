<?php

namespace Examples\ServerResponses;

use RestControl\ApiClient\ApiClientRequest;
use RestControl\ApiClient\ApiClientResponse;

class GetUsers extends GetUser
{
    /**
     * Returns full endpoint url.
     *
     * e.q. 'get::http://sample.site/sample/endpoint/{id}'
     *
     * @return string
     */
    public function getUrl()
    {
        return 'get::sample.service/users';
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
        return new ApiClientResponse(200, [
            'Content-Type' => 'application/json'
        ], json_encode($this->users));
    }
}