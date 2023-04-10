    
    <?php 

    	include '../db_config.php';

      require_once('../config/admin/config.php');

      if (isset($_REQUEST['delete_id'])) {
          $id = $_REQUEST['delete_id'];

          $select_stmt = $db->prepare("SELECT * FROM oder WHERE id = :id");
          $select_stmt->bindParam(':id', $id);
          $select_stmt->execute();
          $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

          // Delete an original record from db
          $delete_stmt = $db->prepare('DELETE FROM oder WHERE id = :id');
          $delete_stmt->bindParam(':id', $id);
          $delete_stmt->execute();

          header('Location:oder.php');
      }

    	$sql = "SELECT * FROM oder";
    	$query = mysqli_query($conn, $sql);

     ?>

    <div class="container mt-5">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h1>Oder : <a href="add_oder.php" class="btn btn-sm btn-success">
                  Add +
                </a></h1>
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th>Accounts</th>
                      <th>Product</th>
                      <th>Settings</th>
                      <th>Accounts Image</th>
                      <th>Product Image</th>
                      <th>Settings Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php foreach ($query as $row) { ?>

                    <tr>
                      <th><?php echo $row['accounts']; ?></th>
                      <td><?php echo $row['product']; ?></td>
                      <td><?php echo $row['settings']; ?></td>
                      <td><img width="100" src="<?php echo $row['accounts_img']; ?>"></td>
                      <td><img width="100" src="<?php echo $row['product_img']; ?>"></td>
                      <td><img width="100" src="<?php echo $row['settings_img']; ?>"></td>
                      <td>
                        <a href="edit_oder.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-warning">
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