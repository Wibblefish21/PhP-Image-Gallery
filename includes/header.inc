
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <?php
        if (!isset($_SESSION['userUid'])) {
            echo 
        '<div class="accountWrapper">
            <div class="logInContainer">
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login-submit">Log In</button>
                </form>
            </div>
        </div>';
        } else {
            echo '<p>You are signed in as '. $_SESSION['userUid'].'</p>';
            echo '<form action="includes/logout.inc.php" method="POST" class="logoutForm">
                    <button type="submit" name="logout-submit" id="logoutBtn">Logout</button>
                  </form>';
        }
        ?>
    </header>
