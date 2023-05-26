<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="PHP Testing Environment.">
        <title>PHP SQL Injection.</title>
    </head>
    <body>
        <h1>PHP SQL Injection flaw</h1>
        <h3>Login form</h3>
        <form action="injection.php" method="post">
            <label for="fname">Username:</label>
            <input type="text" id="uname" name="uname" autocomplete="off"><br><br>
            <label for="lname">Password:</label>
            <input type="text" id="pw" name="pw" autocomplete="off"><br><br>
            <input type="submit" value="Login">
        </form>
        <?php
            include "./includes/database.php";
            $db = new DatabaseConnection("db", "dbUser", "sup3rS3curePW00", "usersDB");
    
            $user_supplied = $_POST["uname"];
            $pass_supplied = $_POST["pw"];
            if ((isset($user_supplied) && isset($pass_supplied)) && ($user_supplied != "" && $user_supplied != "")){
                $login_query = $db->executeQuery("SELECT * FROM users WHERE username='$user_supplied'")->fetch();
                if (!$login_query) {
                    echo "<p>Invalid creds.</p>";
                    die();
                }
                
                die();
            } 
            echo "<p>Please supply some creds.</p>";
        ?>
    </body>
</html>
