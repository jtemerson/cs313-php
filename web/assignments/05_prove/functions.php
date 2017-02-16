<?php
session_start();
require('db.php');

function get_org_by_id(){
  global $db;
  $query = 'SELECT * FROM organizations
            WHERE org_id = 1';
  $statement = $db->prepare($query);
  $statement->execute();
  $organization = $statement->fetch();
  $statement->closeCursor();
  return $organization;
}

function get_projects_by_org_id(){
  global $db;
  $query = 'SELECT * FROM projects
            WHERE org_id = 1';
  $statement = $db->prepare($query);
  $statement->execute();
  $projects = $statement->fetch();
  $statement->closeCursor();
  return $projects;
}

 ?>
