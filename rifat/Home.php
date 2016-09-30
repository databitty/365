<?php
    session_start();

?>
<html>
    <head>
        <title>Sign Up From</title>
    </head>
    <body>
        <h1>Home</h1>
        <div>
            <h4>Welcome <?php echo $_SESSION['username']; ?></h4>
        </div>
    </body>
</html>