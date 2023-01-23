<!DOCTYPE html>

                        
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=greek,cyrillic">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://kit.fontawesome.com/dd00c11567.js" crossorigin="anonymous"></script>
    <title>Wagwan - Home</title>
</head>
<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center>
                            <a href="include/find_friends.php">
                                <button class="btn btn-default search-icon" name="search_user"
                                type="submit">
                                    Add New User
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_users_data.php") ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- get user information on who is logged in -->
                    <?php
                  session_start();
                  include("include/connection.php");
                    if(isset($_SESSION["user_name"])){
                        header("location:signin.php");
                   
                  
                    
                        $user= $_SESSION['user_email'];
                        $get_user = "SELECT * from users where user_email='$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);
            
                        $user_id = $row['user_id'];
                        $user_name= $row['user_name'];
            
                     ?>

                    <!-- get user data on which is clicked -->
                     <?php 
                        if(isset($_GET['user_name'])){
                            global $con;

                            $get_username = $_GET['user_name'];
                            $get_user= "SELECT * from users where user_name='$get_username'";
                            $run_user= mysqli_query($con, $get_user);
                            $row_user = mysqli_fetch_array($run_user);

                            $username = $row_user['user_name'];
                            $user_profile_image= $row_user['user_profile'];

                        }

                        $total_messages = "SELECT * FROM users_chat where 
                        (sender_username='$user_name' AND receiver_username='$username') OR
                        (receiver_username='$user_name' AND sender_username='$username')";

                        $run_messages = mysqli_query($con, $total_messages);
                        $total = mysqli_num_row($run_messages);
                     ?>

                     <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo "$user_profile_image"; ?>" alt="">
                        </div>
                        <div class="right-header-details">

                            <form method="post" >
                                <p><?php echo "$username"; ?></p>
                                <span><?php echo "$total"; ?> Messages</span> &nbsp &nbsp
                                <button class="btn btn-danger" type="submit" name="logout">
                                    Logout</button>
                            </form>
                            <?php
                                if(isset($_POST['logout'])){
                                    $update_msg = mysqli_query($con, "UPDATE users 
                                    SET Log_in ='offline' where user_name='$user_name'");
                                    header("location:logout.php");
                                    exit();
                                }
                            ?>
                        </div>
                     </div>

                </div>

                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                            $update_msg = mysqli_query($con, "UPDATE users_chat 
                            SET msg_status ='read' where sender_username='$username' AND 
                            receiver_username='$user_name'");

                            $sel_msg = "SELECT * FROM users_chat where 
                            (sender_username='$user_name' AND receiver_username='$username') OR
                            (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
    
                            $run_msg= mysqli_query($con, $sel_msg);

                            while( $row = mysqli_fetch_array($run_msg)){
                                $sender_username=$row['sender_username'];
                                $receiver_username= $row['receiver_username'];
                                $msg_content= $row['msg_content'];
                                $msg_date = $row['msg_date'];
                            
                        ?>

                        <ul>
                            <?php
                                if($user_name == $sender_username AND $username == $receiver_username){
                                    echo "
                                        <li>
                                            <div class='rightside-chat'>
                                                <span>
                                                    $username
                                                    <small>$msg_date</small>
                                                </span>
                                                <p>$msg_content</p>
                                            </div>
                                        </li>
                                    ";
                                }
                            ?>
                        
                    </ul>

                    <?php 
                            }
                    ?>
                    
                    </div>
                </div>

                <div class="row">
                    <div class= "col-md-12 right-chat-textbox">
                        <Form>
                        <input type="text" autocomplete="off" name="msg_content"
                        placeholder="Write Your Message......">
                        <button class="btn" name="submit">
                            <i class="fa fa-telegram" aria-hidden="true"></i>
                        </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php

    if(isset($_POST['submit'])){
        $msg = htmlentities($_POST['msg_content']);

        if(msg == ""){
            echo "
                <div class='alert alert-danger'>
                    <strong>
                        <center>Message was unable to send</center>
                    </strong>
                </div>
            ";
        }

        else if(strlen(msg) >100){
            echo "
            <div class='alert alert-danger'>
                <strong>
                    <center>Message is too long</center>
                </strong>
            </div>
        ";
        }

        else {
            $insert= "INSERT into users_chat(sender_username,
             receiver_username, msg_content, msg_status, msg_date) 
             values('$user_name', '$username', '$msg', 'unread', Now())";

             $run_insert = mysqli_query($con, $insert);
        }
    }
                    }
    ?>
</body>
</html>