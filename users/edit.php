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

            if(isset($_POST['save'])){
                $name= $_POST['name'];
                $email= $_POST['email'];

                if($name !="" && $email!="" ){
                    $query="UPDATE users SET name='$name', email='$email' where id=$id";
                    $result=mysqli_query($con,$query);

                    if($result){
                        echo "<p class='text-success'>Data is Updated</p>";
                        header('Refresh:2; URL=index.php');
                    }
                    else{
                        echo "<p class='text-warning'>Data is not Updated</p>";
                        header('Refresh:2; URL=create.php');
                    }
                }else{
                    echo "<p class='text-danger'>Please fill all fields</p>";
                    header('Refresh:2; URL=create.php');
                }

                

            }
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo  $data['name'] ?>" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo  $data['email'] ?>" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php require('../includes/footer.php'); ?>
