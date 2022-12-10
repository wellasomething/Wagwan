<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://kit.fontawesome.com/dd00c11567.js" crossorigin="anonymous"></script>
    <title>create a New Account</title>
</head>
<body>
    <div class="signup-form">
        <img src="images/Group 2.png" alt=""  width="15%";>
        <form action="" method="post">

            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this Form and start chatting with Friends.</p>
            </div>

            <div class="form-group">
                <label for="user_name">Username</label><br>
                <input type="text" name="user_email"  class="form-control" placeholder="" 
                autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label><br>
                <input type="password" name="password"  class="form-control" placeholder="Password" 
                autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email"  class="form-control" placeholder="someone@site.com" 
                autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="user_country">Country</label><br>
                <select name="user_country" id="user_country" class="form-control" required>
                    <option value="" disabled="">Select a Country</option>
                    <option value="nigeria">Nigeria</option>
                    <option value="uk">United Kingdom</option>
                    <option value="usa">United State of America</option>
                    <option value="ghana">Ghana</option>
                    <option value="france">France</option>
                    <option value="sa">South Africa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label><br>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="" disabled="">Select your Gender</option>
                    <option value="male">Male</option>
                    <option value="femlae">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="checkbox" class="checkbox-inline"><input type="checkbox" name="email" required>
                    I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>
                </label><br>
            </div>

            <div class="form-group text-center">
                <button type="submit" name="sign_up" class="btn btn-primary btn-lg btn-block px-5">Sign Up</button>
            </div>

            <!--<?php //include("signup_user.php"); ?> -->
        </form>

        <div class="text-center small formy" style= "color:674288;">Already have an account?  
            <a href="sign_up.php">Signin Here</a>
        </div>
    </div>
</body>
</html>