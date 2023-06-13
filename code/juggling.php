<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="PHP Testing Environment.">
        <title>PHP Type juggling flaw</title>
    </head>
    <body>
        <h1>PHP Type juggling flaw</h1>
        <h3>Login form</h3>
        <form action="juggling.php" method="post">
            <label for="fname">Username:</label>
            <input type="text" id="uname" name="uname" autocomplete="off"><br><br>
            <label for="lname">Password:</label>
            <input type="text" id="pw" name="pw" autocomplete="off"><br><br>
            <input type="submit" value="Login">

            <?php
            include "./includes/database.php";
            $db = new DatabaseConnection("db", "dbUser", "sup3rS3curePW00", "usersDB");
    
            $user_supplied = $_POST["uname"];
            $pass_supplied = md5($_POST["pw"]);

            //echo "<p>SELECT * FROM users WHERE (username='$user_supplied' AND password='$pass_supplied')</p>";
            if ((isset($user_supplied) && isset($pass_supplied)) && ($user_supplied != "" && $user_supplied != "")){
                $login_query = $db->executeQuery("SELECT * FROM users WHERE username='$user_supplied'")->fetch();
                if (!$login_query) {
                    echo "<p>Invalid creds.</p>";
                    die();
                }
                $database_pass = $login_query["password"];
                if ($pass_supplied == $database_pass){
                    echo "<p>Secret content</p>";
                    echo '<img src="https://blog.mozilla.org/webdev/files/2012/06/wonka-md5.jpg" alt="Trulli" width="500" height="333"></br></br>';
                    echo "<a href='https://www.php.net/manual/en/language.types.type-juggling.php'>PHP Type juggling deep dive</a>";
                    die();
                }
            } 
            echo "<p>Please supply some creds.</p>";
        ?>
        </form>
    </body>
</html>
