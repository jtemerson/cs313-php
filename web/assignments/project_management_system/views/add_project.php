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
                <h2>Add a project</h2>
                <form action="." method="post">
                  <input type="hidden" name="action" value="add_project" />
                  <label>Project Name</label>
                  <input type="text" name="project_name" />
                  <br /><br /><br />
                  <label>Deadline</label>
                  <input type="date" name="project_deadline" />
                  <br /><br /><br />
                  <label>Priority Level</label>
                  <select name="project_priority">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
                  <br /><br /><br />
                  <label>Notes</label>
                  <textarea name="project_notes" rows="4" cols="50"></textarea>
                  <br /><br /><br />
                  <label>Location</label>
                  <input type="text" name="project_location" />
                  <br /><br /><br />
                  <label>Payment Recieved</label>
                  <select name="project_paid">
                      <option value="no">No Payment</option>
                      <option value="yes">Full Payment</option>
                      <option value="partial">Partial Payment</option>
                  </select>
                  <br /><br /><br />
                  <label>Status</label>
                  <select name="project_complete">
                      <option value="no">Not Complete</option>
                      <option value="yes">Completed</option>
                  </select>
                  <br /><br /><br />
                  <input type="submit" value="Add Project" />
                </form>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
