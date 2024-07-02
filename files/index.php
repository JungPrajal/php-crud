<?php require('../includes/header.php'); ?>

<section>
    <div class="container py-5">
        <h2>Manage Users</h2>
        <div class="table-responsive">
            <!-- Add button -->
            <a class="btn btn-primary btn-sm mb-3" href="create.php" role="button">Create</a>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">Images</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo "<p class='text-success'>Data is DELETED.</p>";
                        header('Refresh:2; URL=index.php');
                    }

                    // Read data from database
                    $select = "SELECT * FROM users";
                    $result = mysqli_query($con, $select);
                    $i = 1;

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td> <?php echo $row['title']; ?> </td>
                            <td> <?php echo $row['description']; ?> </td>
                            <td> <?php echo $row['Images']; ?> </td>
                           
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

<?php require('../includes/footer.php'); ?>