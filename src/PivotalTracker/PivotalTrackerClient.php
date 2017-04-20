<?php

namespace PivotalTracker;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;

class PivotalTrackerClient extends Client
{
    /**
     * Returns the API base path
     *
     * @return string
     */
    public function apiPath()
    {
        return 'https://www.pivotaltracker.com/services/v5/';
    }

    /**
     * Returns a fresh GuzzleClient for PivotalTracker
     *
     * @return GuzzleClient
     */
    public function buildClient()
    {
        return new GuzzleClient([
            'base_uri' => $this->apiPath(),
            'headers' => [
                'Content-Type' => 'application/json',
                'X-TrackerToken' => $this->getToken()
            ]
        ]);
    }

    public function responseParser(Response $response)
    {
        $statusCode = $response->getStatusCode();

        // Validate errors using custom exceptions
        if ($statusCode >= 200 && $statusCode < 300) {
            return json_decode($response->getBody(), TRUE);
        }

        return null;
    }
}