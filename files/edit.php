<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>


<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-white">
            <h5 class="card-title text-center mb-0">Edit User</h5>
            <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Users</a>
        </div>
        <div class="card-body">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM files WHERE id = '$id'";
                $select_result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($select_result);
            }

            if (isset($_POST['save'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];

                $file = $_FILES['dataFile']['name'];
                $file_size = $_FILES['dataFile']['size'];

                // submit previous file
                if ($title != "" && $description!='' && $file == "") {
                    $querry = "UPDATE  files  SET  title='$title' , description='$description' WHERE id=$id";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo "title or description is changed";
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";

                    } else
                        echo "not 1st";
                } else {
                    // submit new file & replace old file
                    // submit new file & replace old file
                    if ($title != "" && $description!='' && $file !== "") {

                        if ($file_size <= 2 * 1024 * 1024) {
                            $explode = explode('.', $file); // explode cuts the name after the dot.
                            $flink = strtolower($explode[0]);
                            $extlink = strtolower($explode[1]);
                            $replace = str_replace(' ', '', $file); //to remove space
                            $finalname = $replace . time() . '.' . $extlink; //concating names with time
                            $targrt_file = '../uploads/' . $finalname;
                            if ($extlink == 'jpg' || $extlink == 'png' || $extlink == 'jpeg') {

                                // replace old file
                                $oldfilelink = $data['file_link']; //file link from database
                                $finallink = '../uploads/' . $oldfilelink;
                                unlink($finallink);

                                if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $targrt_file)) {

                                    $querry = "UPDATE  files  SET  title='$title', description='$description', file_link='$finalname', type='$extlink' WHERE id=$id";
                                    $result = mysqli_query($con, $querry);
                                    if ($result) {
                                        echo "File uploaded";
                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                                    } else {
                                        echo "File is not uploaded";
                                    }
                                } else {
                                    echo "files  upload failed";
                                }
                            } else {

                                echo "extension doesno match";
                            }
                        } else {
            ?>
                            <div class="alert alert-primary" role="alert">
                                file size must be less than 2MB
                            </div>

                        <?php

                        }
                    } else {
                        ?>
                        <div class="alert alert-primary" role="alert">
                            Filed are required
                        </div>

            <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    }
                }
            }

            $con->close();
            ?>


            <form action='#' class="bg-light" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo  $data['title'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="<?php echo  $data['description'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <img src="<?php echo "../uploads/" . $data['file_link']; ?>" alt="" srcset="" width="150px" height="140px">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" name="dataFile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>