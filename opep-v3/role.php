<?php
require 'signupclass.php';
session_start();
$user = new user();

if (isset($_POST["updateRole"])) {
    $role_id = $_POST["role_id"];
    $created_user_id = $_SESSION["created_user_id"];
    echo $role_id;
    if ($user->role($role_id, $created_user_id)) {


        header("Location: signeup.php");
    } else {
        $error_message = "Role update failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/role.css">
    <title>RolesPage</title>
</head>

<body>

    <form class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="container">
        <div class="radiocont">
            <div class="form-container user">
                <i class="fas fa-user"></i>
                <label for="client">Client</label>
                <input value="1" name="role_id" type="radio">
            </div>
            <div class="form-container admin">
                <i class="fas fa-user-tie"></i>
                <label for="admin">Admin</label>
                <input value="2" name="role_id" type="radio">
            </div>
        </div>
        <button class="confirm" type="submit" name="updateRole">Confirm</button>
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p>Error: $error_message</p>";
    }
    ?>

    <script src="./js/script.js"></script>
</body>

</html>