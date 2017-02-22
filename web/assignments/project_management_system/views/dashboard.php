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
                <h1>Current Projects</h1>
                <br />
                <div class="row">
                    <div class="col-md-1">
                        <label>Order By:</label>
                    </div>
                    <div class="col-md-1">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="project_display_order" />
                            <select name="order" onchange="this.form.submit();" class="form-control">
                                <option value=""></option>
                                <option value="date">Date</option>
                                <option value="priority">Priority</option>
                            </select>
                        </form>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Deadline</th>
                                    <th>Priority</th>
                                    <th>View Project</th>
                                </tr>
                            <thead>
                            <tbody>
                                <?php foreach ($projects as $project) : ?>
                                <tr>
                                    <td><?php echo $project['project_name']; ?></td>
                                    <td><?php echo $project['project_deadline']; ?></td>
                                    <td><?php echo $project['project_priority']; ?></td>

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
                                            <input type="submit" value="Details" class="btn btn-default">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
