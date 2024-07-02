<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>


<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-white">
            <h5 class="card-title text-center mb-0">Add User</h5>
            <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Users</a>
        </div>
        <div class="card-body">
            <?php

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT * FROM users WHERE id = '$id'";
                $select_result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($select_result);
            }

          
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" readonly  id="exampleInputEmail1" name="name" value="<?php echo  $data['name'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" readonly id="exampleInputEmail1" name="email" value="<?php echo  $data['email'] ?>" aria-describedby="emailHelp">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>
