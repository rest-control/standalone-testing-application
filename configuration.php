<?php

return [
    'tests' => [
        'Tests\\' => [
            'path'         => dirname(__FILE__) . '/tests/',
            'classSuffix'  => 'Test.php',
            'methodPrefix' => 'test',
        ],
    ],
    'responseFilters' => [
        //..
        //here goes your own response filters.
    ],
    // Api Client using for sending HTTP requests.
    'apiClient' => \RestControl\ApiClient\HttpGuzzleClient::class,
];