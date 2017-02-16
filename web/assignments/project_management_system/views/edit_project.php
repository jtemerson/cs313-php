<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <header>
            <div>

            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
                <form action="." method="post">

                  <input type="hidden" name="action" value="edit_project">

                  <input type="hidden" name="project_id" value="<?php echo $project_id ?>">

                  <label>Name:</label><br>
                  <input type="text" name="project_name" value="<?php echo $project_name ?>"><br>

                  <label>Deadline:</label><br>
                  <input type="text" name="project_deadline" value="<?php echo $project_deadline ?>"><br>

                  <label>Priority Level:</label><br>
                  
                  <input type="submit" value="Save Changes" class="btn btn-success"><br>
              </form>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
