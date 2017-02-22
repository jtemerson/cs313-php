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

        <main class="container-fluid">
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
          <h1>Create an Account</h1>
            <div class="col-md-3">
                <form name="action" method="post">
                    <label>*Company/Organization Name:</label>
                    <input type="text" name="org_name" value="<?php echo htmlspecialchars($org_name);?>" class="form-control"/>
                    <br /><br />
                    <label>*Username:</label>
                    <input type="text" name="org_username" value="<?php echo htmlspecialchars($org_username);?>" class="form-control" />
                    <br /><br />
                    <label>*Password:</label>
                    <input type="password" name="org_pwd" value="<?php echo htmlspecialchars($org_pwd);?>" class="form-control" />
                    <p>(must be 8 characters)</p>
                    <br /><br />
                    <label>*Verify Password:</label>
                    <input type="password" name="pwd_verify" value="<?php echo htmlspecialchars($pwd_verify);?>" class="form-control" />
                    <br /><br />
                    <input type="submit" name="action" value="Register" class="btn btn-success" />
                </form>
                <br /><br />
            </div>
        </main>

        <footer>

        </footer>
    </body>
</html>
