<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body>

<section class="container">
  <div class="card p-4 mx-auto" style="max-width: 400px;">
    <div class="card-body">
      <h5 class="card-title text-center mb-4">Welcome Back!</h5>
      
      <form>
        <div class="mb-3">
          <label for="email" class="form-label"><i class="fas fa-envelope me-"></i>Email</label>
          <input type="email" class="form-control" id="email" placeholder="abc@mail.com" required>
        </div>

        <div class="mb-3">
          <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Name</label>
          <input type="text" class="form-control" id="name" placeholder="John Doe" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
          <input type="password" class="form-control" id="password" placeholder="********" required>
        </div>

        <button type="submit" class="btn btn-primary w-100" name="login">Submit</button>
        <p class="py-2">Don't have account <a href="register.php">Sign Up</a></p>

      </form>
    </div>
  </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</body>
</html>
