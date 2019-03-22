<?php
session_start();
  //  if user is not logged in
  if(!$_SESSION['loggedInUser']){
    header("Location: index.php");
  }
  // connect to database
  include('includes/connection.php');

  // query and results
  $query = "SELECT * FROM clients";
  $result = mysqli_query( $conn, $query );

  // check for query string
  if( isset( $_GET['alert'] ) ){
    // new client added
    if( $_GET['alert'] == 'success' ){
      $alertMessage = "<div class='alert alert-success'>New client added! <a class='close' data-dismiss='alert'>&times;</a></div>";
    } elseif( $_GET['alert'] == 'updateSuccess' ){
      $alertMessage = "<div class='alert alert-success'>Client details was changed successfully <a class='close' data-dismiss='alert'>&times;</a></div>";
    } elseif( $_GET['alert'] == 'deleteSuccess' ){
      $alertMessage = "<div class='alert alert-success'>Client deleted <a class='close' data-dismiss='alert'>&times;</a></div>";
    }

  }

  //close connection
  mysqli_close($conn);

include('includes/header.php');
?>

<h1>Client Address Book</h1>
<?php echo $alertMessage; ?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Company</th>
        <th>Notes</th>
        <th>Edit</th>
    </tr>
    <?php
      if( mysqli_num_rows($result) > 0 ){
        // we have database
        while( $row = mysqli_fetch_assoc($result) ){
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['address'] . "</td><td>" . $row['company'] . "</td><td>" . $row['notes'] . "</td>";
          echo '<td><a href="edit.php?id=' . $row['id'] . '" type="button" class="btn btn-default btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></td>';
          echo "</tr>";
        }
      } else {
        echo "<div class='alert alert-warning'>You currently have no clients</div>";
      }
      mysqli_close($conn);
    ?>


    <tr>
        <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
    </tr>
</table>

<?php
include('includes/footer.php');
?>
