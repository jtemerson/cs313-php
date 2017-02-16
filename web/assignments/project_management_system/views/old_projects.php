<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <header>
            <div>
              <h1><?php echo $org_name; ?></h1>
              <a href="dashboard.php">Return to dashboard</a>
            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
                <table class="table table">
                  <thead>
                      <tr>
                          <th>Project</th>
                          <th>Deadline</th>
                          <th>Priority Level</th>
                          <th>Location</th>
                      </tr>
                  <thead>
                  <tbody>
                      <?php
                      foreach ($projects as $project) :
                      if($project_paid == 1){
                      ?>
                      <tr>
                          <td><?php echo $project['project_name']; ?></td>
                          <td><?php echo $project['project_deadline']; ?></td>
                          <td><?php echo $project['project_priority']; ?></td>
                          <td><?php echo $project['project_location']; ?></td>

                          <!-- See Recipe Button -->
                          <td>
                              <form action="." method="post">
                                  <input type="hidden" name="action" value="display_project">
                                  <input type="hidden" name="org_id" value="<?php echo $recipe['org_id']; ?>">
                                  <input type="hidden" name="project_id" value="<?php echo $recipe['project_id']; ?>">
                                  <input type="hidden" name="project_name" value="<?php echo $recipe['project_name']; ?>">
                                  <input type="hidden" name="project_deadline" value="<?php echo $recipe['project_deadline']; ?>">
                                  <input type="hidden" name="project_priority" value="<?php echo $recipe['project_priority']; ?>">
                                  <input type="hidden" name="project_notes" value="<?php echo $recipe['project_notes']; ?>">
                                  <input type="hidden" name="project_location" value="<?php echo $recipe['project_location']; ?>">
                                  <input type="hidden" name="project_paid" value="<?php echo $recipe['project_paid']; ?>">
                                  <input type="submit" value="View" class="btn btn-primary"><br><br><br>
                              </form>
                          </td>
                      </tr>
                      <?php
                  }else {
                      header('Location: dashboard.php');
                  }
                        endforeach;
                        ?>
                  </tbody>
              </table>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
