<?php

require_once '../includes/DbOperations.php';

$name = $email = $password = '';
$email_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset($_POST['name']) and
        isset($_POST['email']) and
        isset($_POST['password'])
    ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];



        $db = new DbOperations();

        $result = $db->createUserPlayer(
            $_POST['name'],
            $_POST['email'],
            $_POST['password']
        );

        if ($result == 1) {
            $email_error = '';
            //echo 'user registered successfully';
            // header("Location: puzzle.php");
            header("Location: ../grid/index.php");
            die;
        } elseif ($result == 0) {
            $email_error = 'Email is already registered! Please try a different email';
        } elseif ($result == 2) {
            $email_error =  'some error occured';
        }
    } else {
        // echo 'Required fields are missing';
    }
} else {
    // invalid request
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Puzzle login</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <div class="container">
        <h1 class="label">Create Your Account</h1>
        <form class="form" method="POST" name="form" action="signup.php" onsubmit="return validated()">
            <div class="font">Name</div>
            <input type="text" name="name"  value="<?php echo $name; ?>">
            <div id="name_error">Enter a valid name</div>
            <div class="font font2">Email Address</div>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <div id="email_error">Enter a valid Email Address</div>

            <div class="font font2">Password</div>
            <input type="password" name="password"  value="<?php echo $password; ?>">
            <!-- <div>Password must contains Eight Characters</div> -->
            <div id="password_error">Password must be more than eight characters</div>
            <p class="login_error"><?php echo $email_error; ?></p>

            <button type="submit">Login</button>
            <div class="signup_link">
                Already have an account? <a href="login.php">Sign In</a>
            </div>

        </form>

    </div>
    <script src="valid.js"></script>

</body>

</html>