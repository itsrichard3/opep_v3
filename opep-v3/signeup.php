<?php
include("signupclass.php");
session_start();
$user = new user;

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $objet = new user();
    $rest = $objet->newuser($name, $email, $password);


    if ($rest) {
        $id = $user->get_user_id($email);
        $_SESSION["created_user_id"] = $id;
        header("Location: role.php");
    }

}
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $objet = new user();
    $rest = $objet->userLogin($email, $password);
    if (isset())  ;




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="imgs/logoG.png" type="image/x-icon">
    <title>Register Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post">
                <h1>Create Account</h1>
                <div class="inputsdiv">
                    <div>
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="email" placeholder="Email">
                        <div id="email-error" class="error-message"></div>

                        <input name="password" type="password" placeholder="Password">

                    </div>
                    <button name="signup" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" action="">
                <h1>Log In</h1>
                <div class="inputsdiv">
                    <div>
                        <input name="email" type="email" placeholder="Email">
                        <input name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login">Log In</button>
                </div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Already have an accont!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Log In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>First time on O'Pep!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/script.js"></script>
</body>

</html>