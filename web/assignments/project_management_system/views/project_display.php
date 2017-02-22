<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include './modules/head.html'; ?>
  </head>
  <body>
      <header>
          <?php include './modules/header.php'; ?>
      </header>

      <nav>
          <?php include './modules/nav.php'; ?>
      </nav>

        <main class="container-fluid">
          <?php
            if($error){
                echo "<div class='row'>
                        <div class='col-md-3'>
                          <div class='alert alert-danger'>
                            <strong id='error'>$error</strong>
                          </div>
                        </div>
                      </div>";
            }
          ?>
          <h2 id="p_name"><?php echo $project_name; ?>:<span id="p_deadline"> Due <?php echo $project_deadline; ?></span></h2>
          <h3>Status:
          <span class="inside_h3"><?php
              if ($project_paid == 'yes'){
                  echo '<b>Paid in Full - </b>';
              }elseif ($project_paid == 'partial') {
                  echo '<b>Partially Paid - </b>';
              }else{
                  echo '<b>Not Paid - </b>';
              }
           ?></span>
           <span class="inside_h3"><?php
              if ($project_complete == 'no' || !isset($project_complete)){
                  echo 'Project not completed';
              }else{
                  echo "Project completed";
              }
           ?> </span>
           </h3>

            <h3>Priority Level: <span class="inside_h3"><?php echo $project_priority; ?></span></h3>

            <h3>Location: <span class="inside_h3"><?php echo $project_location; ?></span></h3>

            <h3>Checklist:</h3>
            <ol><?php foreach ($checklists as $checklist) {
                echo "<li>$checklist[checklist_item]</li>";
            } ?></ol>
            <form action="." method="post">
              <input type="hidden" name="action" value="display_edit_checklist"/>
              <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
              <input type="submit" value="Edit Checklist" class="btn btn-default" />
            </form>

            <h3>Notes:</h3>
            <p><?php echo $project_notes; ?></p>

            <div class="row">
              <div class="col-md-1">
                <!-- Mark Complete Button -->
                <?php if($project_complete == 'no'){
                  echo "<form action='.' method='post'>
                      <input type='hidden' name='action' value='mark_complete' />
                      <input type='hidden' name='project_id' value='$project_id'/>
                      <input type='submit' value='Mark complete' class='btn btn-default' />
                  </form>";
                } ?>
              </div>
              <div class="col-md-1">
                <!-- Edit Button -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="display_edit_project">
                    <input type="hidden" name="project_name" value="<?php echo $project_name; ?>">
                    <input type="hidden" name="project_deadline" value="<?php echo $project_deadline; ?>">
                    <input type="hidden" name="project_priority" value="<?php echo $project_priority; ?>">
                    <input type="hidden" name="project_notes" value="<?php echo $project_notes; ?>">
                    <input type="hidden" name="project_location" value="<?php echo $project_location; ?>">
                    <input type="hidden" name="project_paid" value="<?php echo $project_paid; ?>">
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                    <input type="hidden" name="project_complete" value="<?php echo $project_complete; ?>">
                    <input type="submit" value="Edit Project" class="btn btn-default"><br><br><br>
                </form>
              </div>
            </div>
              <!-- Delete Button -->
              <form action="." method="post">
                  <input type="hidden" name="action" value="delete_project" />
                  <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"/>
                  <input type="submit" value="Delete Project" class="btn btn-danger">
              </form>
            <br /><br /><br />
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
