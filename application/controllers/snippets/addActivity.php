<?php

$activities = $this->session->userdata('activities');
array_push($activities, $activity);
$this->session->set_userdata('activities', $activities);

?>