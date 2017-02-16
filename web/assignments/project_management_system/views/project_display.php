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
                <h1><?php echo $_SESSION['org_name']; ?></h1>
                <a href=".?action=dashboard">Return to dashboard</a>
            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
                <h2><?php echo $project_name; ?></h2>

                <h3>Status:</h3>
                <p><?php
                    if ($project_paid == 'yes'){
                        echo 'Paid in Full';
                    }elseif ($project_paid == 'partial') {
                        echo 'Partially Paid';
                    }else{
                        echo 'Not Paid';
                    }
                 ?></p>
                 <p><?php
                    if ($project_complete == 'no' || !isset($project_complete)){
                        echo 'Project not completed';
                    }else{
                        echo "Project completed";
                    }
                 ?> </p>

                <h3>Deadline:</h3>
                <p><?php echo $project_deadline; ?></p>

                <h3>Priority Level:</h3>
                <p><?php echo $project_priority; ?></p>

                <h3>Location:</h3>
                <p><?php echo $project_location; ?></p>

                <h3>Checklist:</h3>
                <ol><?php foreach ($checklists as $checklist) {
                    echo "<li>$checklist[checklist_item]</li>";
                } ?></ol>

                <h3>Notes:</h3>
                <p><?php echo $project_notes; ?></p>
                <!-- Mark Complete Button -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="mark_complete" />
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"/>
                    <input type="submit" value="Mark project as complete" />
                </form>
                <br />
                <!-- Delete Button -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_project" />
                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"/>
                    <input type="submit" value="Delete Project">
                </form>
                <br /><br /><br />
                <a href=".?action=dashboard">Return to dashboard</a>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
