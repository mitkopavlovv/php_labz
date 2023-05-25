<?php
include "./includes/user_class.php";
if (!isset($_COOKIE['current_user'])) {
    $current_user = new User();
    $current_user->set_name("guest");
    $current_user->set_role("viewer");
    setcookie("current_user", serialize($current_user));
    header("HTTP/1.1 303 See Other");
    header("Location: http://$_SERVER[HTTP_HOST]/deserialization.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="PHP Testing Environment.">
        <title>PHP Deserialization</title>
    </head>
    <body>
    <h1>PHP Deserialization flaw</h1>
    <?php
        $user_obj = unserialize($_COOKIE['current_user']);
        
        $username = $user_obj->get_name();
        $userrole = $user_obj->get_role();

        switch($userrole){
            case "admin":
                echo "<p>Hello $username you are with role $userrole.</p>";
                echo '<img src="./resources/admin-meme.jpg" alt="Trulli" width="500" height="333">';
                break;
            case "user":
                echo "<p>Hello $username you are with role $userrole.</p>";
                break;
            case "viewer":
                echo "<p>Hello $username you are with role $userrole.</p>";
                break;
            default:
                echo "Something went wrong with the roles!";
                break;
        }
    ?>
    </body>
</html>