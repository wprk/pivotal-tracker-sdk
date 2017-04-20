<?php


class Example
{
    public function getProjects()
    {
        $pivotalTrackerToken = 'ADD YOUR TOKEN HERE';

        $client = new PivotalTracker\PivotalTrackerClient($pivotalTrackerToken);

        $projects = $client->getProjects();

        if (!is_null($projects) && count($projects) > 0) {

            foreach ($projects as $project) {

                print_r($project);

            }
        }
    }
}