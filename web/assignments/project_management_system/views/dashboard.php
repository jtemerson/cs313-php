<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <header>
            <div>
              <h1>Dashboard</h1>
              <h2><?php
              echo $_SESSION['org_name'];
              ?></h2>
            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
                <?php
                if($error){
                    echo "<p>$error</p>";
                }
                ?>
                <h2>Your Projects:</h2>
                <table class="table table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Deadline</th>
                            <th>Priority</th>
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
                                    <input type="submit" value="Details"><br><br><br>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="." method="post">
                    <input type="hidden" name="action" value="add_a_project" />
                    <input type="submit" value="Add a project" />
                </form>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
