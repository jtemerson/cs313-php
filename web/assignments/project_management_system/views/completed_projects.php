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

        <main>
            <div class="container-fluid">
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
              <h1>Completed Projects</h1>
              <div class="row">
                <div class="col-md-3">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>View Project</th>
                          </tr>
                      <thead>
                      <tbody>
                          <?php foreach ($projects as $project) : ?>
                          <tr>
                              <td><?php echo $project['project_name']; ?></td>

                              <!-- Details Button -->
                              <td>
                                  <form action="." method="post">
                                      <input type="hidden" name="action" value="display_project">
                                      <input type="hidden" name="project_name" value="<?php echo $project['project_name']; ?>">
                                      <input type="hidden" name="project_deadline" value="<?php echo $project['project_deadline']; ?>">
                                      <input type="hidden" name="project_priority" value="<?php echo $project['project_priority']; ?>">
                                      <input type="hidden" name="project_notes" value="<?php echo $project['project_notes']; ?>">
                                      <input type="hidden" name="project_location" value="<?php echo $project['project_location']; ?>">
                                      <input type="hidden" name="project_paid" value="<?php echo $project['project_paid']; ?>">
                                      <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">
                                      <input type="hidden" name="project_complete" value="<?php echo $project['project_complete']; ?>">
                                      <input type="submit" value="Details" class="btn btn-default"><br><br><br>
                                  </form>
                              </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
