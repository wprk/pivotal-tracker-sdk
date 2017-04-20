<?php

namespace PivotalTracker\Exceptions;

class TokenNotSetException extends PivotalTrackerException
{
    public function __construct() {
        parent::__construct(
            'Your Pivotal Tracker api token has not been set.'
        );
    }
}