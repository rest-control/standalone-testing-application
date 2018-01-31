<?php

return [
    'tests' => [
        'Tests\\',
    ],
    'responseFilters' => [
        //..
        //here goes your own response filters.
    ],
    // Api Client using for sending HTTP requests.
    'apiClient' => \RestControl\ApiClient\HttpGuzzleClient::class,
];