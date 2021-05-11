<?php


require_once '../includes/DbOperations.php';

$error = null ;

if($_SERVER['REQUEST_METHOD']== 'POST'){

    if(
        
        isset($_POST['email']) and
        isset($_POST['password'])
    )
    {
        $db = new DbOperations();

        $result = $db->playerLogin($_POST['email'], $_POST['password']);

        if($result == 1){
            echo 'Login successful!!';
            header("Location: ../grid/index.php");
			die;


            // header("Location: welcome.php");
			// 			die;

        }else{
            $error =  'Invalid Email or Password!!!';
         
        }   
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Puzzle login</title>
    <style>
     <?php include "../styles/style.css" ?>
</style>
    <!-- <link rel="stylesheet" href="loginStyle.css?v="> -->
</head>

<body>
    <div class="container">
        <h1 class="label">Login</h1>
        <form class="form" method="POST" name="form"  onsubmit="return validated()" action="login.php">
            <div class="font">Email Address</div>
            <input type="text" name="email">
            <div id="email_error">Email Address should be valid</div>
            <div class="font font2">Password</div>
            <input type="password" name="password">
            <p class="login_error"><?php echo $error; ?></p>
            <div id="password_error">Password must be minimum of 8 characters</div>
            

            <button type="submit">Login</button>
            <div class="signup_link">
                Not a member? <a href="signup.php">Signup now</a>
            </div>

        </form>

    </div>
    

    <script src="valid.js"></script>

</body>

</html>