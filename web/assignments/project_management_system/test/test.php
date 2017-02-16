<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <header>
          <h1>Hello World!</h1>
        </header>

        <nav>

        </nav>

        <main>
            <div>
                <?php
                $statement = $db->prepare("SELECT * FROM organizations");
                $statement->execute();
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                	// The variable "row" now holds the complete record for that
                	// row, and we can access the different values based on their
                	// name
                	echo '<p>';
                	echo '<strong>' . $row['org_id'] . ' ' . $row['org_name'] . ':';
                	echo $row['org_username'] . '</strong>' . ' - ' . $row['org_pwd'];
                	echo '</p>';
                }
                ?>
            </div>
        </main>

        <footer>

        </footer>
    </body>
</html>
