<!DOCTYPE html>
<html>
  <head>
    <?php include './modules/head.html'; ?>
    <script>
      function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
      }
      document.onkeypress = stopRKey;
    </script>
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
                <h1>Add a project</h1>
                <br />
                <div class="col-md-4">
                  <div class="form-group">
                    <form action="." method="post">
                      <input type="hidden" name="action" value="add_project" class="form-control" />
                      <label>Project Name</label>
                      <input type="text" name="project_name" class="form-control" />
                      <br /><br /><br />
                      <label>Deadline</label>
                      <input type="date" name="project_deadline" class="form-control" />
                      <br /><br /><br />
                      <label>Priority Level</label>
                      <select name="project_priority" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                      <br /><br /><br />
                      <label>Location</label>
                      <input type="text" name="project_location" class="form-control" />
                      <br /><br /><br />
                      <label>Checklist:</label>
                      <ul id="checklist">
                          <li>
                              <input type="text" name="checklist_item[]" class="form-control"/>
                          </li>
                      </ul>
                      <button type="button" onclick="checklist();" class="btn btn-default">Add Item</button>
                      <br /><br /><br />
                      <label>Notes</label>
                      <textarea name="project_notes" rows="4" cols="50" class="form-control"></textarea>
                      <br /><br /><br />
                      <label>Payment Recieved</label>
                      <select name="project_paid" class="form-control">
                          <option value="no">No Payment</option>
                          <option value="yes">Full Payment</option>
                          <option value="partial">Partial Payment</option>
                      </select>
                      <br /><br /><br />
                      <label>Status</label>
                      <select name="project_complete" class="form-control">
                          <option value="no">Not Complete</option>
                          <option value="yes">Completed</option>
                      </select>
                      <br /><br /><br />
                      <input type="submit" value="Add Project" class="btn btn-success"/>
                    </form>
                  </div>
                </div>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
