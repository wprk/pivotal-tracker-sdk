<?php

namespace PivotalTracker;

class PivotalTracker extends PivotalTrackerClient
{
    public function __construct($pivotalTrackerToken)
    {
        $this->setToken($pivotalTrackerToken);
    }

    public function withParameters(Array $parameters)
    {
        if (empty($this->queryParameters)) {
            $this->queryParameters = $parameters;
        } else {
            $this->queryParameters = array_merge(
                $parameters,
                $this->queryParameters
            );
        }

        return $this;
    }

    public function getProjects($options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath('projects'), $options)
        );
    }

    public function getReleases($projectId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/releases"), $options)
        );
    }

    public function getEpics($projectId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/epics"), $options)
        );
    }

    public function getLabels($projectId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/labels"), $options)
        );
    }

    public function getStories($projectId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/stories"), $options)
        );
    }

    public function getComments($projectId, $storyId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/stories/{$storyId}/comments"), $options)
        );
    }

    public function getTasks($projectId, $storyId, $options = [])
    {
        return $this->responseParser(
            $this->getClient()->get($this->getQueryPath("projects/{$projectId}/stories/{$storyId}/tasks"), $options)
        );
    }
}