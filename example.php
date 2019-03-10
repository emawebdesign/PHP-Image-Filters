<?php

include("phpImageFilters.php");

$phpImageFilters = new phpImageFilters();
$phpImageFilters->format = "jpg";
$phpImageFilters->setImage('filter.jpg');
$phpImageFilters->retro();
$phpImageFilters->output('test');

?>