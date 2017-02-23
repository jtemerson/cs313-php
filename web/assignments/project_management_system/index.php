<?php
session_start();
require_once 'model/functions.php';

if (filter_input(INPUT_POST, 'action')){
    $action = filter_input(INPUT_POST, 'action');
}else{
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'Register':

    $org_name = trim(filter_input(INPUT_POST, 'org_name', FILTER_SANITIZE_STRING));
    $org_username = trim(filter_input(INPUT_POST, 'org_username', FILTER_SANITIZE_STRING));
    $org_pwd = filter_input(INPUT_POST, 'org_pwd');
    $pwd_verify = filter_input(INPUT_POST, 'pwd_verify');

    //validate the inputs
    if(empty($org_name) || empty($org_username) || empty($org_pwd) || empty($pwd_verify)){
        $error = 'Some required fields are empty.';
        include 'views/register.php';
        exit();
    }


    if(strlen($org_pwd) <= 7){
        $error =  'Password must be at least 8 characters long.';
        include 'views/register.php';
        exit();
    }

    if($org_pwd !== $pwd_verify){
        $error = 'Passwords do not match!';
        include 'views/register.php';
        exit();
    }

    $org_pwd = password_hash($org_pwd, PASSWORD_DEFAULT);

    $result = register_org($org_name, $org_username, $org_pwd);

    if($result){
        $message = "$org_name, you are registered!";
    }else{
        $message = "Sorry $org_name, there was an error while trying to register you, please try again.";
    }

    include 'views/login.php';
    exit();

    break;

case 'sign_in':

    include 'views/login.php';

    break;

case 'account':

    if(!$_SESSION['logged_in']){
      $error = 'Please sign up or login';
      include 'views/register.php';
      exit;
    }

    include 'views/myAccount.php';

    break;

case 'logout':

  session_destroy();
  include 'views/register.php';

break;

case 'Login':

    $org_username = filter_input(INPUT_POST, 'org_username');
    $org_pwd = filter_input(INPUT_POST, 'org_pwd');

    $organization = get_org_by_username($org_username);

    if (password_verify($org_pwd, $organization['org_password'])){
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['org_name'] = $organization['org_name'];
      $_SESSION['org_id'] = $organization['org_id'];
    }else{
        $error = 'Login failed. Please try again.';
        include 'views/login.php';
        exit;
    }

    //break;

  case 'dashboard':

    if(!$_SESSION['logged_in']){
      $error = 'Please sign up or login';
      include 'views/register.php';
      exit;
    }
    $org_id = $_SESSION['org_id'];
    $projects = get_projects_by_org_id($org_id);

    include 'views/dashboard.php';

  break;

  case 'display_project':

    if(!$_SESSION['logged_in']){
      $error = 'Please sign up or login';
      include 'views/register.php';
      exit;
    }

    $project_name = filter_input(INPUT_POST, 'project_name');
    $project_deadline = filter_input(INPUT_POST, 'project_deadline');
    $project_priority = filter_input(INPUT_POST, 'project_priority');
    $project_notes = filter_input(INPUT_POST, 'project_notes');
    $project_location = filter_input(INPUT_POST, 'project_location');
    $project_paid = filter_input(INPUT_POST, 'project_paid');
    $project_complete = filter_input(INPUT_POST, 'project_complete');
    $project_id = filter_input(INPUT_POST, 'project_id');

    $checklists = get_checklist_items_by_project_id($project_id);

    include 'views/project_display.php';
    exit;

  break;

case 'add_a_project':

  if(!$_SESSION['logged_in']){
    $error = 'Please sign up or login';
    include 'views/register.php';
    exit;
  }

  include 'views/add_project.php';
  exit;

break;

case 'add_project':

  $project_name = filter_input(INPUT_POST, 'project_name');
  $project_deadline = filter_input(INPUT_POST, 'project_deadline');
  $project_priority = filter_input(INPUT_POST, 'project_priority');
  $project_notes = filter_input(INPUT_POST, 'project_notes');
  $project_location = filter_input(INPUT_POST, 'project_location');
  $project_paid = filter_input(INPUT_POST, 'project_paid');
  $project_complete = filter_input(INPUT_POST, 'project_complete');
  $project_checklist = $_POST['checklist_item'];
  $org_id = $_SESSION['org_id'];

  $result = add_project($org_id, $project_name, $project_deadline, $project_priority, $project_notes, $project_location, $project_paid, $project_complete);
  $project_by_name = get_project_id_by_name($project_name);
  $project_id = $project_by_name['project_id'];
  add_checklist($project_id, $project_checklist);

  if(!isset($result)){
      $error = "Sorry $org_name, we could not add the project.";
  }

  header('Location: .?action=dashboard');

break;

case 'add_checklist':

  $project_id = filter_input(INPUT_POST, 'project_id');
  $project_checklist = $_POST['checklist_item'];

  add_checklist($project_id, $project_checklist);

  header('Location: .?action=dashboard');

break;

case 'delete_project':

  $project_id = filter_input(INPUT_POST, 'project_id');

  $result = delete_project($project_id);

  if(!isset($result)){
      $error = "Sorry $org_name, we could not delete the project.";
  }

  header('Location: .?action=dashboard');

break;

case 'delete_checklist_item':
  $checklist_id = filter_input(INPUT_POST, 'checklist_id');
  $result = delete_checklist_item($checklist_id);

  if(!isset($result)){
      $error = "Sorry $org_name, we could not delete the project.";
  }

  header('Location: .?action=dashboard');

break;

case 'mark_complete':

  $project_id = filter_input(INPUT_POST, 'project_id');

  mark_project_as_complete($project_id);

  header('Location: .?action=dashboard');

break;

case 'display_completed_projects':

  if(!$_SESSION['logged_in']){
    $error = 'Please sign up or login';
    include 'views/register.php';
    exit;
  }

  $org_id = $_SESSION['org_id'];

  $projects = get_completed_projects($org_id);

  include 'views/completed_projects.php';

break;

case 'project_display_order':

  $order = filter_input(INPUT_POST, 'order');
  $org_id = $_SESSION['org_id'];

  if($order == 'date'){
    header('Location: .?action=dashboard');
  }else {
    $projects = get_projects_order_by_priority($org_id);
  }

  include 'views/dashboard.php';

break;

case 'display_edit_project':

  $project_name = filter_input(INPUT_POST, 'project_name');
  $project_deadline = filter_input(INPUT_POST, 'project_deadline');
  $project_priority = filter_input(INPUT_POST, 'project_priority');
  $project_notes = filter_input(INPUT_POST, 'project_notes');
  $project_location = filter_input(INPUT_POST, 'project_location');
  $project_paid = filter_input(INPUT_POST, 'project_paid');
  $project_id = filter_input(INPUT_POST, 'project_id');
  $project_complete = filter_input(INPUT_POST, 'project_complete');
  $org_id = $_SESSION['org_id'];

  $checklists = get_checklist_items_by_project_id($project_id);

  include 'views/edit_project.php';

break;

case 'display_edit_checklist':

  $project_id = filter_input(INPUT_POST, 'project_id');
  $checklists = get_checklist_items_by_project_id($project_id);

  include 'views/edit_checklist.php';

break;

case 'edit_project':

  $project_name = filter_input(INPUT_POST, 'project_name');
  $project_deadline = filter_input(INPUT_POST, 'project_deadline');
  $project_priority = filter_input(INPUT_POST, 'project_priority');
  $project_notes = filter_input(INPUT_POST, 'project_notes');
  $project_location = filter_input(INPUT_POST, 'project_location');
  $project_paid = filter_input(INPUT_POST, 'project_paid');
  $project_id = filter_input(INPUT_POST, 'project_id');
  $project_complete = filter_input(INPUT_POST, 'project_complete');
  $project_checklist = $_POST['checklist_item'];
  $org_id = $_SESSION['org_id'];

  edit_project($project_id, $org_id, $project_name, $project_deadline, $project_priority, $project_notes, $project_location, $project_paid, $project_complete);
  add_checklist($project_id, $project_checklist);

  header('Location: .?action=dashboard');

break;

  default:

    include_once 'views/register.php';

    break;
}

 ?>
