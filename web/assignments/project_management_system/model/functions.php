<?php
session_start();

require('db.php');

function register_org($org_name, $org_username, $org_pwd){
 global $db;
 $query = 'INSERT INTO organizations(org_name, org_username, org_password)
           VALUES(:name, :username, :pwd)';
  $statement = $db->prepare($query);
  $statement->bindValue(':name', $org_name);
  $statement->bindValue(':username', $org_username);
  $statement->bindValue(':pwd', $org_pwd);
  $statement->execute();
  $result = $statement->rowCount();
  $statement->closeCursor();
  return $result;
}

function get_org_by_username($org_username){
 global $db;
 $query = 'SELECT * FROM organizations
           WHERE org_username = :username';
 $statement = $db->prepare($query);
 $statement->bindValue(':username', $org_username);
 $statement->execute();
 $organization = $statement->fetch();
 $statement->closeCursor();
 return $organization;
}

function get_projects_by_org_id($org_id){
  global $db;
  $query = 'SELECT * FROM projects
            WHERE org_id = :org
            AND project_complete = :no
            ORDER BY project_deadline';
  $statement = $db->prepare($query);
  $statement->bindValue(":org", $org_id);
  $statement->bindValue(":no", 'no');
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
}

function get_project_id_by_name($project_name){
  global $db;
  $query = 'SELECT * FROM projects
            WHERE project_name = :name';
  $statement = $db->prepare($query);
  $statement->bindValue(":name", $project_name);
  $statement->execute();
  $project_by_name = $statement->fetch();
  $statement->closeCursor();
  return $project_by_name;
}

function get_projects_order_by_priority($org_id){
  global $db;
  $query = 'SELECT * FROM projects
            WHERE org_id = :org
            AND project_complete = :no
            ORDER BY project_priority';
  $statement = $db->prepare($query);
  $statement->bindValue(":org", $org_id);
  $statement->bindValue(":no", 'no');
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
}

function get_checklist_items_by_project_id($project_id){
  global $db;
  $query = 'SELECT * FROM checklists
            WHERE project_id = :p_id';
  $statement = $db->prepare($query);
  $statement->bindValue(":p_id", $project_id);
  $statement->execute();
  $checklists = $statement->fetchAll();
  $statement->closeCursor();
  return $checklists;
}

function add_project($org_id, $project_name, $project_deadline, $project_priority, $project_notes, $project_location, $project_paid, $project_complete){
  global $db;
  $query = 'INSERT INTO projects(org_id, project_name, project_deadline, project_priority, project_notes, project_location, project_paid, project_complete)
            VALUES(:id, :name, :deadline, :priority, :notes, :location, :paid, :complete)';
   $statement = $db->prepare($query);
   $statement->bindValue(':id', $org_id);
   $statement->bindValue(':name', $project_name);
   $statement->bindValue(':deadline', $project_deadline);
   $statement->bindValue(':priority', $project_priority);
   $statement->bindValue(':notes', $project_notes);
   $statement->bindValue(':location', $project_location);
   $statement->bindValue(':paid', $project_paid);
   $statement->bindValue(':complete', $project_complete);
   $statement->execute();
   $result = $statement->rowCount();
   $statement->closeCursor();
   return $result;
 }

 function add_checklist($project_id, $project_checklist){
   global $db;
   foreach ($project_checklist as $check_item) {
     $query = 'INSERT INTO checklists(project_id, checklist_item)
               VALUES(:id, :item)';
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $project_id);
      $statement->bindValue(':item', $check_item);
      $statement->execute();
      $statement->closeCursor();
   }
 }

 function delete_project($project_id) {
    global $db;
    $query = 'DELETE FROM projects
              WHERE project_id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $project_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_checklist_item($checklist_id) {
   global $db;
   $query = 'DELETE FROM checklists
             WHERE checklist_id = :id';
   $statement = $db->prepare($query);
   $statement->bindValue(':id', $checklist_id);
   $statement->execute();
   $statement->closeCursor();
}

function mark_project_as_complete($project_id){
  global $db;
  $query = 'UPDATE projects
            SET project_complete = :yes
            WHERE project_id = :id';
  $statement = $db->prepare($query);
  $statement->bindValue(':id', $project_id);
  $statement->bindValue(':yes', 'yes');
  $statement->execute();
  $statement->closeCursor();
}

function get_completed_projects($org_id){
  global $db;
  $query = 'SELECT * FROM projects
            WHERE org_id = :org
            AND project_complete = :yes
            ORDER BY project_deadline';
  $statement = $db->prepare($query);
  $statement->bindValue(':org', $org_id);
  $statement->bindValue(':yes', 'yes');
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
}

function edit_project($project_id, $org_id, $project_name, $project_deadline, $project_priority, $project_notes, $project_location, $project_paid, $project_complete){
  global $db;
$query = 'UPDATE projects
            SET org_id = :org_id, project_name = :name, project_deadline = :deadline, project_priority = :priority, project_notes = :notes, project_location = :location, project_paid = :paid, project_complete = :complete
            WHERE project_id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $project_id);
$statement->bindValue(':org_id', $org_id);
$statement->bindValue(':name', $project_name);
$statement->bindValue(':deadline', $project_deadline);
$statement->bindValue(':priority', $project_priority);
$statement->bindValue(':notes', $project_notes);
$statement->bindValue(':location', $project_location);
$statement->bindValue(':paid', $project_paid);
$statement->bindValue(':complete', $project_complete);
$statement->execute();
$statement->closeCursor();
}

function edit_checklist($project_id, $project_checklist){
  global $db;
  foreach ($project_checklist as $check_item) {
    $query = 'UPDATE checklists
                SET checklist_item = :item
                WHERE project_id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $project_id);
    $statement->bindValue(':item', $check_item);
    $statement->execute();
    $statement->closeCursor();
  }
}

 ?>
