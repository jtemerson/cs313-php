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
          <?php if(isset($error)){
               echo "<p>$error</p>";
           }?>
        </header>

        <nav>

        </nav>

        <main>
            <div>
                <form name="action" method="post">
                    <label>Company/Organization Name:</label>
                    <input type="text" name="org_name" value="<?php echo htmlspecialchars($org_name);?>" />
                    <br /><br />
                    <label>Username:</label>
                    <input type="text" name="org_username" value="<?php echo htmlspecialchars($org_username);?>" />
                    <br /><br />
                    <label>Password:</label>
                    <input type="text" name="org_pwd" value="<?php echo htmlspecialchars($org_pwd);?>" />
                    <br /><br />
                    <label>Verify Password:</label>
                    <input type="text" name="pwd_verify" value="<?php echo htmlspecialchars($pwd_verify);?>" />
                    <br /><br />
                    <input type="submit" name="action" value="Register" />
                </form>
                <br /><br />
                <form action=".?action=dashboard" method="post">
                    <input type="submit" value="Dashboard"  />
                </form>
                <br /><br />
                <form action=".?action=sign_in" method="post">
                    <input type="submit" value="Login"  />
                </form>
            </div>
        </main>

        <footer>

        </footer>
    </body>
</html>
