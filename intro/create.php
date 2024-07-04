<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>


<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-white">
            <h5 class="card-title text-center mb-0">Add Files</h5>
            <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Files</a>
        </div>
        <div class="card-body">
            <?php
            if(isset($_POST['save'])){  // Handle form submission and file upload
                $title = $_POST['title']; // Form Data Handling
                $description = $_POST['description'];
                $image = $_POST['image'];

                if ($title != "" && $description != "" && $image != "") {
                    $query = "INSERT INTO intro (title, description, image) VALUES ('$title', '$description', '$image')";
                    $result = mysqli_query($con, $query); // Connect to database

                    if ($result) {
                        echo "<p class='text-success'>Data has been submitted</p>";
                        header('Refresh:2; URL=index.php');
                    } else {
                        echo "<p class='text-warning'>Data was not submitted</p>";
                        header('Refresh:2; URL=create.php');
                    }
                } else {
                    echo "<p class='text-danger'>Please fill all fields</p>";
                    header('Refresh:2; URL=create.php');
                }
                }
            
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                 <!-- Imgge selecion -->
                 <div class="mb-3">
                    <label for="exampleInputImage" class="form-label">Image</label>
                </div>
                <!-- Imgge selecion -->

                <div class="modal fade" id="modalID" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalID" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleID">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                      </div>
                       
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>
