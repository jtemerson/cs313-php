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
            <div class="col-md-4">
                <form action="." method="post">
                  <input type="hidden" name="action" value="edit_project" />
                  <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" class="form-control"/>
                  <label>Project Name</label>
                  <input type="text" name="project_name" value="<?php echo $project_name; ?>" class="form-control"/>
                  <br /><br /><br />
                  <label>Deadline</label>
                  <input type="date" name="project_deadline" value="<?php echo $project_deadline; ?>" class="form-control" />
                  <br /><br /><br />
                  <label>Priority Level</label>
                  <select name="project_priority" class="form-control">
                      <option value="1" <?php if($project_priority == '1'){echo 'selected = "selected"';} ?>>1</option>
                      <option value="2" <?php if($project_priority == '2'){echo 'selected = "selected"';} ?>>2</option>
                      <option value="3" <?php if($project_priority == '3'){echo 'selected = "selected"';} ?>>3</option>
                      <option value="4" <?php if($project_priority == '4'){echo 'selected = "selected"';} ?>>4</option>
                      <option value="5" <?php if($project_priority == '5'){echo 'selected = "selected"';} ?>>5</option>
                  </select>
                  <br /><br /><br />
                  <label>Notes</label>
                  <textarea name="project_notes" rows="4" cols="50" class="form-control"><?php echo $project_notes; ?></textarea>
                  <br /><br /><br />
                  <label>Location</label>
                  <input type="text" name="project_location" value="<?php echo $project_location; ?>" class="form-control" />
                  <br /><br /><br />
                  <label>Payment Recieved</label>
                  <select name="project_paid" class="form-control">
                      <option value="no" <?php if($project_paid == 'no'){echo 'selected = "selected"';} ?>>No Payment</option>
                      <option value="yes" <?php if($project_paid == 'yes'){echo 'selected = "selected"';} ?>>Full Payment</option>
                      <option value="partial" <?php if($project_paid == 'partial'){echo 'selected = "selected"';} ?>>Partial Payment</option>
                  </select>
                  <br /><br /><br />
                  <label>Status</label>
                  <select name="project_complete" class="form-control">
                      <option value="no" <?php if($project_complete == 'no'){echo 'selected = "selected"';} ?>>Not Complete</option>
                      <option value="yes"  <?php if($project_complete == 'yes'){echo 'selected = "selected"';} ?>>Completed</option>
                  </select>
                  <br />
                  <input type="submit" value="Apply changes" class="btn btn-success"/>
                  <a href=".?action=dashboard"><input type="button" value="Back" class="btn btn-primary"/></a>
                </form>
                <br /><br />
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
