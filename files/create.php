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

                if (isset($_FILES['dataFile'])) { // // Process the uploaded file
                    $filename = $_FILES['dataFile']['name'];  // File Details Extraction
                    $filesize = $_FILES['dataFile']['size'];
              

                    // Modification of File Name
                    $explode = explode('.', $filename);
                    if (count($explode) === 2) {
                        $firstname = strtolower($explode[0]);
                        $ext = strtolower($explode[1]);
                        $rep = str_replace(' ', '', $firstname);
                        $finalfilename = $rep . time() . '.' . $ext;

                        if ($filesize <= 2 * 1024 * 1024) {  // Check file size and extension
                            if ($ext == "jpg" || $ext == "png") {

                                // File Move and Database Insertion
                                if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalfilename)) {
                                    $query = "INSERT INTO files (title, description,file_link, type) VALUES ('$title', '$description','$finalfilename', '$ext')";
                                    $result= mysqli_query($con, $query);
                                    if ($result) {
                                        echo "File is submitted";
                                        header("Location: index.php");
                                    } else {
                                        echo "File is not submitted";
                                    }
                                } else {
                                    echo "Failed to move uploaded file";
                                }
                            } else {
                                echo "File extension does not match";
                            }
                        } else {
                            echo "File size must be less than 2MB";
                        }
                    } else {
                        echo "Invalid file format";
                    }
                } else {
                    echo "No file uploaded";
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
                <div class="mb-3">
                    <label for="dataFile" class="form-label">File Link</label>
                    <input type="file" class="form-control" id="dataFile" name="dataFile">
                </div>
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>
