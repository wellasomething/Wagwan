<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signin.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://kit.fontawesome.com/dd00c11567.js" crossorigin="anonymous"></script>
    <title>Login to your account</title>
</head>
<body>
    <div class="signin-form">
        <img src="images/Group 2.png" alt=""  width="15%";>
        <form action="" method="post">

            <div class="form-header">
                <h2>Sign in</h2>
                <p>Login to Wagwan</p>
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email"  class="form-control" placeholder="someone@site.com" 
                autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" name="password"  class="form-control" placeholder="Enter Your Password" 
                autocomplete="off" required>
            </div>

            <div class="small text-center">Forgot Password? <a href="forgot_password.php">Click here</a></div>

            <div class="form-group text-center">
                <button type="submit" name="sign_in" class="btn btn-primary btn-lg btn-block px-5">Sign In</button>
            </div>

            <?php include("signin_user.php"); ?> 
        </form>

        <div class="text-center small formy" style= "color:674288;">You don't have an account?  
            <a href="signup.php">Create One</a>
        </div>
    </div>
</body>
</html>