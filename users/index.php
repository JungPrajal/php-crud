<?php require('../includes/header.php'); ?>
<?php require('../includes/footer.php'); ?>

<section>
  <div class="container py-5">
    <h2>Manage Users</h2>
    <div class="table-responsive">
      <!-- Add button -->
      <a class="btn btn-primary btn-sm" href="create.php" role="button">Add</a>

      <table class="table table-hover table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>

            <th scope="col">Email</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg == 'success') {
              echo "<p class='text-success'>Data is DELETED.</p>";
              header('Refresh:2; URL=index.php');
            }
          }

          // Read data from database
          $select = "SELECT * FROM `users`";
          $result = mysqli_query($con, $select);
          $i = 1;

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <!-- List wise numbers -->
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                <a class="btn btn-warning btn-sm" href="show.php?id=<?php echo $row['id']; ?>" role="button">Show</a>
                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete?');" role="button">Delete</a>

              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>