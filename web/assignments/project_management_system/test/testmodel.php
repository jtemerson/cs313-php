<?php
function get_org(){
  $query = 'SELECT * FROM organizations';
$statement = $db->prepare($query);
$statement->execute();
$org_details = $statement->fetch();
$statement->closeCursor();
return $org_details;
}
 ?>
