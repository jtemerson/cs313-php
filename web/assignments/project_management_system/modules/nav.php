<div class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['org_name']; ?></a>
        </div>

        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href=".?action=dashboard">Dashboard</a></li>
                <li><a href=".?action=add_a_project">Add a project</a></li>
                <li><a href=".?action=display_completed_projects">Completed projects</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="."><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li>
                <?php
                if($_SESSION['logged_in']){
                  echo "<a href='.?action=logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a>";
                }else{
                  echo "<a href='.?action=sign_in'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
                }
                 ?>
              </li>
              <li><a href='.?action=account'><span class='glyphicon glyphicon-knight'></span> My Account</a></li>
            </ul>
        </div>
</div>
