<?php require('../includes/header.php'); ?>

<div class="container mt-5">
    <div class="card mx-auto">
        <div class="card-header bg-white">
            <h5 class="card-title text-center mb-0">Add User</h5>
            <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Users</a>
        </div>
        <div class="card-body">
            <?php
            // Include your database connection script and any necessary initialization

            if(isset($_POST['save'])){
                // Retrieve form data using $_POST
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // Check if all fields are filled
                if($name !="" && $email!="" && $password!=""){
                    // SQL query to insert data into database
                    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
                    $result = mysqli_query($con, $query);

                    if($result){
                        echo "<p class='text-success'>Data submitted successfully</p>";
                        header('Refresh:2; URL=index.php'); // Redirect after 2 seconds
                        exit; // Stop further execution
                    } else {
                        echo "<p class='text-warning'>Data submission failed</p>";
                    }
                } else {
                    echo "<p class='text-danger'>Please fill all fields</p>";
                }
            }
            ?>
            <form action="#" class="w-25" method="post" enctype="multipart/form-data" >
                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> First Name
                    </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your First Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email address
                    </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" name="save" class="btn btn-primary w-100">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
