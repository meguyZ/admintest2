    
    <?php 

    	include '../db_config.php';

      require_once('../config/admin/config.php');

      if (isset($_REQUEST['delete_id'])) {
          $id = $_REQUEST['delete_id'];

          $select_stmt = $db->prepare("SELECT * FROM settings WHERE id = :id");
          $select_stmt->bindParam(':id', $id);
          $select_stmt->execute();
          $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

          // Delete an original record from db
          $delete_stmt = $db->prepare('DELETE FROM settings WHERE id = :id');
          $delete_stmt->bindParam(':id', $id);
          $delete_stmt->execute();

          header('Location:settings.php');
      }

    	$sql = "SELECT * FROM settings";
    	$query = mysqli_query($conn, $sql);

     ?>

    <div class="container mt-5">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h1>Download : <a href="add_settings.php" class="btn btn-sm btn-success">
                  Add +
                </a></h1>
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Noting</th>
                      <th>Icon</th>
                      <th>Image 1</th>
                      <th>Image 2</th>
                      <th>Image 3</th>
                      <th>Github</th>
                      <th>Facebook</th>
                      <th>Discord</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php foreach ($query as $row) { ?>

                    <tr>
                      <th><?php echo $row['username']; ?></th>
                      <td><?php echo $row['noting']; ?></td>
                      <td><img width="100" src="<?php echo $row['icon']; ?>"></td>
                      <td><img width="100" src="<?php echo $row['image_1']; ?>"></td>
                      <td><img width="100" src="<?php echo $row['image_2']; ?>"></td>
                      <td><img width="100" src="<?php echo $row['image_3']; ?>"></td>
                      <td><?php echo $row['github']; ?></td>
                      <td><?php echo $row['facebook']; ?></td>
                      <td><?php echo $row['discord']; ?></td>
                      <td>
                        <a href="edit_settings.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-warning">
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