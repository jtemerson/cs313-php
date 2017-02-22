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
             <h2>Checklist Items</h2>
             <div class="col-md-3">
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Item</th>
                           <th>Delete Item</th>
                       </tr>
                   <thead>
                   <tbody>
                       <?php foreach ($checklists as $checklist) : ?>
                       <tr>
                           <td>
                             <?php echo $checklist['checklist_item']; ?>
                           </td>

                           <!-- Delete Button -->
                           <td>
                             <form action="." method="post">
                                 <input type="hidden" name="action" value="delete_checklist_item" />
                                 <input type="hidden" name="checklist_id" value="<?php echo $checklist['checklist_id']; ?>"/>
                                 <input type="submit" value="Delete" class="btn btn-danger">
                             </form>
                           </td>
                       </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
               <h2>Add Item(s)</h2>
               <label>Checklist:</label>
               <form action="." method="post">
                 <input type="hidden" name="action" value="add_checklist" />
                 <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />
                 <ul id="checklist">
                     <li>
                         <input type="text" name="checklist_item[]" class="form-control" />
                     </li>
                 </ul>
                 <button type="button" onclick="checklist();" class="btn btn-default">Add Item</button><br /><br />
                 <div class="row">
                   <div class="col-md-5">
                     <input type="submit" value="Save Checklist" class="btn btn-success" />
                   </div>
                   <div class="col-md-5">
                     <a href=".?action=dashboard"><input type="button" value="Back" class="btn btn-primary"/></a>
                   </div>
                 </div>
               </form>
               <br /><br /><br />
             </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
