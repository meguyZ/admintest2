    
    <?php 

    	include '../db_config.php';

      require_once('../config/admin/config.php');

      if (isset($_REQUEST['delete_id'])) {
          $id = $_REQUEST['delete_id'];

          $select_stmt = $db->prepare("SELECT * FROM download WHERE id = :id");
          $select_stmt->bindParam(':id', $id);
          $select_stmt->execute();
          $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

          // Delete an original record from db
          $delete_stmt = $db->prepare('DELETE FROM download WHERE id = :id');
          $delete_stmt->bindParam(':id', $id);
          $delete_stmt->execute();

          header('Location:accounts.php');
      }

    	$sql = "SELECT * FROM download";
    	$query = mysqli_query($conn, $sql);

     ?>

    <div class="container mt-5">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h1>Download : <a href="add_download.php" class="btn btn-sm btn-success">
                  Add +
                </a></h1>
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>DashBoard</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Contact</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php foreach ($query as $row) { ?>

                    <tr>
                      <th><?php echo $row['username']; ?></th>
                      <td><?php echo $row['dashboard']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td><img width="100" src="<?php echo $row['image']; ?>"></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td>
                        <a href="edit_download.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-warning">
                          Edit
                        </a>
                      </td>
                      <td>
                        <a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger">
                          Delete
                        </a>
                      </td>
                    </tr>

                    <?php } ?>
                    
                  </tbody>
                </table>
            </div>
        </div>
    </div>