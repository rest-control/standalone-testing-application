<?php

namespace Examples;

use RestControl\TestCase\AbstractTestCase;

class HttpBasicAuthTest extends AbstractTestCase
{
    /**
     * @test(
     *     title="Login via http basic auth",
     *     description="Login via http basic auth (For this test you need RestControl training server, https://github.com/rest-control/training-server.)",
     *     tags="auth httpBasicAuth"
     * )
     */
    public function exampleHttpBasicAuthSuccess()
    {
        return send()
            ->get( $this->getVar('training') . 'basic-auth')
            ->httpBasicAuth('nwoodroof0@comsenz.com', 'eId4ZuZBCiI7')
            ->expectedResponse()
            ->json()
            ->httpCode(200)
            ->jsonPath('$.status', equalsTo('ok'));
    }

    /**
     * @test(
     *     title="Login via http basic auth",
     *     description="Login via http basic auth (For this test you need RestControl training server, https://github.com/rest-control/training-server.)",
     *     tags="auth httpBasicAuthInvalidCredentials"
     * )
     */
    public function exampleHttpBasicAuthInvalidCredentials ()
    {
        return send()
            ->get( $this->getVar('training') . 'basic-auth')
            ->httpBasicAuth('sampleInvalidUser', 'samplePassword')
            ->expectedResponse()
            ->httpCode(401);
    }
}