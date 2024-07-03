<?php require('../includes/header.php'); ?>
<?php require('../includes/sidebar.php'); ?>
<?php require('../includes/footer.php'); ?>

<section>
    <div class="container py-5">
        <h2>Manage Files</h2>
        <div class="table-responsive">
            <!-- Add button -->
            <a class="btn btn-primary btn-sm mb-3" href="create.php" role="button">Create</a>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
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
                    $select = "SELECT * FROM files";
                    $result = mysqli_query($con, $select);

                    if (!$result) {
                        echo('Query failed: ' . mysqli_error($con));
                    }

                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = isset($row['title']) ? $row['title'] : 'N/A';
                        $description = isset($row['description']) ? $row['description'] : 'N/A';
                        $file_link = isset($row['file_link']) ? $row['file_link'] : 'N/A';
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo htmlspecialchars($title); ?></td>
                            <td><?php echo htmlspecialchars($description); ?></td>
                            <td>

                            <!-- Display Images in the Table -->
                             <!-- check condition -->
                                <?php if($file_link != 'N/A'): ?>   
                                    <!-- display image   -->
                                    <img src="../uploads/<?php echo htmlspecialchars($file_link); ?>" alt="Image" style="max-width: 100px; max-height: 100px;">
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
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
