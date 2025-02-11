<?php
/*
 * This file is part of the Eis project.
 * It contains the login form and logic for authenticating users.
 * The script uses PHP sessions and cookies for user authentication.
 * It also includes basic error handling and input validation.
 *
 * PHP version 8.1
 *
 * @category Auth
 * @package  None
 *
 * @since    1.0
 * @author   Luca Krawczyk
 * @author Niklas te Kaat Leventaal
 */

// Global PDO instance supressing IDE errors
global $pdo;

// Include configuration and response helper
require_once "../include/config.php";

// Initialize an error message variable
$errorMessage = '';
$showLogin = true;

// Get the redirect URL from the GET parameters or default to '/Index.html'
$redirect = $_GET['redirect'] ?? '/Index.php';

// Check if the login form has been submitted
if (isset($_GET['login'])) {
    // Get the username and password from the POST parameters
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $pwd_hash = hash('sha256', $pwd);


    $query = "SELECT * FROM login WHERE login.user = '".$user."' AND login.pwd = '".$pwd_hash."'";
    $exec = $pdo->query($query);
    $user = $exec->fetch();



    // Check if the user exists and the password is correct
    if ($user !== false) {


        // Set various session variables for the user
        $_SESSION['user'] = $user['user'];


        // Set a success message and hide the login form
        $successMessage = 'Login erfolgreich!';
        $showLogin = false;
    } else {
        // Set an error message
        $errorMessage = "Username oder Passwort war ungültig<br>";
    }

}

// Output the HTML for the login form
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="viewport-fit=cover">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Eis">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- Set the favicon -->
    <link rel="icon" href="/img/logo.jpg">

    <!-- Set the web app picture -->
    <link rel="apple-touch-icon" href="/img/logo.jpg">
</head>

<body>
<?php
if ($showLogin) {
    ?>

    <div class="wrapper">
        <form action="?login=1&redirect=<?php echo $redirect; ?>" method="post">
            <div class="title">Anmelden</div>
            <div class="field">
                <!-- Missing label intended -->
                <input placeholder="Benutzername" type="text" size="40" maxlength="250" name="user" required>
            </div>
            <div class="field">
                <!-- Missing label intended -->
                <input placeholder="Passwort" type="password" size="40" maxlength="250" name="pwd" required>
            </div>

            <?php if (!empty($errorMessage)): ?>
                <p style="color: red; text-align: center"> <?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <div class="field">
                <input type="submit" value="Abschicken">
            </div>
            <div class="signup-link">
                Noch nicht registriert? <a href="/login/register.php">Registrieren</a>
            </div>
        </form>
    </div>

    <?php
} //Ende von if($showFormular)

if (!$showLogin) { ?>

    <div class="wrapper">
        <div class="title">
            Login
        </div>

        <div class="field">
            <?php if (isset($successMessage)): ?>
                <div class="success" style="text-align: center; padding: 30px 0 30px 0!important;">
                    <p style="color: green; font-size: 40px; text-align: center; padding: 0 0 20px 0">
                        <?php echo $successMessage."Hello: ".$_SESSION['user']; ?>

                    </p>
                    <div
                        style="height: 50px; width: 80% !important; background-color: green; color: #fff; padding: 10px; text-align: center; margin: 0 auto; border-radius: 20px">
                        <a style="color: #fff; text-decoration: none;font-family: Poppins, sans-serif;font-size: 20px; font-weight: 500"
                           href="<?php echo $redirect; ?>">Weiter</a>
                    </div>
                    <?php echo "\n".$query; ?>
                </div>
            <?php endif; ?>
        </div>


    </div>

    <?php
}

?>


</body>

</html>