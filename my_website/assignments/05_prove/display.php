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

            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
                <h1>Organization Information:</h1>
                <label>ID:</label>
                <p><?php echo $organization['org_id']; ?></p>
                <label>Name:</label>
                <p><?php $organization['org_name']; ?></p>
                <label>Username:</label>
                <p><?php $organization['org_username']; ?></p>
                <label>Password:</label>
                <p><?php $organization['org_pwd']; ?></p>

                <h1>Organization's projects:</h1>
                <label>ID:</label>
                <p><?php $projects['project_id']; ?></p>
                <label>Name:</label>
                <p><?php $projects['project_name']; ?></p>
                <label>Deadline:</label>
                <p><?php $projects['project_deadline']; ?></p>
                <label>Priority:</label>
                <p><?php $projects['project_priority']; ?></p>

                <h1>Project Information:</h1>
                <label>ID:</label>
                <p><?php  ?></p>
                <label>Name:</label>
                <p><?php  ?></p>
                <label>Username:</label>
                <p><?php  ?></p>
                <label>Password:</label>
                <p><?php  ?></p>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
