<?php
session_start();

require_once 'functions.php';

$organization = get_org_by_id();
$projects = get_projects_by_org_id();

include 'display.php';
exit;
 ?>
