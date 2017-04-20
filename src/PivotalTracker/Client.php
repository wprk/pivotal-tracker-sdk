<?php

namespace PivotalTracker;

use GuzzleHttp\Client as GuzzleClient;

abstract class Client
{
    protected $token;
    protected $client;
    protected $queryParameters = [];
    protected $defaultQueryParameters = [];

    abstract protected function apiPath();
    abstract protected function buildClient();

    protected function setToken($token)
    {
        $this->token = $token;
    }

    protected function setClient(GuzzleClient $client)
    {
        $this->client = $client;
    }

    protected function getToken()
    {
        if (!isset($this->token)) {
            throw new Exceptions\TokenNotSetException;
        } else {
            return $this->token;
        }
    }

    protected function getClient()
    {
        if (!isset($this->client)) {
            $this->setClient(
                $this->buildClient()
            );
        }

        return $this->client;
    }

    protected function getQueryParameters()
    {
        if (is_array($this->queryParameters)) {
            return array_merge(
                $this->queryParameters,
                $this->defaultQueryParameters
            );
        }

        return $this->defaultQueryParameters;
    }

    protected function getQueryPath($path)
    {
        return $path . '?' . $this->getQueryStringFromParameters();
    }

    protected function getQueryStringFromParameters()
    {
        return \GuzzleHttp\Psr7\build_query($this->getQueryParameters());
    }
}