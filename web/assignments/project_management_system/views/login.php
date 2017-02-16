<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <header>
            <div>
              <?php
              if(isset($message)){
                   echo "<p>$message</p>";
               }
               if(isset($error)){
                 echo "<p>$error</p>";
               }
               ?>
            </div>
        </header>

        <nav>
            <div>

            </div>
        </nav>

        <main>
            <div>
              <form action="." method="post">
                <label>Username</label>
                <input type="text" name="org_username" placeholder="Enter Username">
                <label>Password</label>
                <input type="password" name="org_pwd" placeholder="Enter Password">
                <input type="submit" name="action" value="Login">
              </form>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
