<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>


<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-white">
            <h5 class="card-title text-center mb-0">Show User</h5>
            <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Users</a>
        </div>
        <div class="card-body">
            <?php

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT * FROM files WHERE id = '$id'";
                $select_result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($select_result);
            }

          
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" readonly  id="title" name="title" value="<?php echo  $data['title'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="Text" class="form-control" readonly id="description" name="description" value="<?php echo  $data['description'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <img src="<?php echo "../uploads/" . $data['file_link']; ?>" alt="" srcset="" width="150px" height="140px">
                    <label for="title" class="form-label">Image</label>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>
