
<?php require('config/config.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>


    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-white">
                <h5 class="card-title text-center mb-0">Create An Account</h5>
            </div>
            <div class="card-body">
                <?php

                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $password= password_hash($_POST['password'], PASSWORD_DEFAULT) ;    

                    if ($name != "" && $email != "" && $password != "") {
                        $query = " INSERT INTO users (name,phone, address, email, password) VALUES ('$name','$phone','$address', '$email', '$password')";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            echo "<p class='text-success'>Account is created</p>";
                            header('Refresh:2; URL=index.php');
                        } else {
                            echo "<p class='text-warning'>Account is created</p>";
                            header('Refresh:2; URL=register.php');
                        }
                    } else {
                        echo "<p class='text-danger'>Please fill all fields</p>";
                        header('Refresh:2; URL=register.php');
                    }
                }
                ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputphone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="exampleInputphone" name="phone" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleInputAddress" name="address" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputpssword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputpssword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    <p>Have already account <a href="index.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>