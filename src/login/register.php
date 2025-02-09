<?php
/*
 * Hier wird ein neuer Benutzer registriert
 * Es wird überprüft ob die E-Mail-Adresse bereits vergeben ist
 * Es wird überprüft ob die Passwörter übereinstimmen
 * Es wird überprüft ob eine E-Mail-Adresse eingegeben wurde
 * Es wird überprüft ob ein Passwort eingegeben wurde
 * Wenn alle Überprüfungen erfolgreich sind, wird der Benutzer in die Datenbank eingetragen
 *
 * PHP Version 8.1
 *
 * @category Login
 * @package  None
 *
 * @since    1.0
 *
 * @author   Luca Krawczyk
 * @author   Niklas te Kaat Levantaal
 *
 * css Errors maybe higlighted by IDE but should be ignored. Vars are passed in by css file
 */
// Global PDO instance supressing IDE errors
global $pdo;

// Include configuration and response helper
require_once "../include/config.php";
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Registrierung</title>
    <link rel="stylesheet" href="/css/login.css">
    <!-- Set the favicon -->
    <link rel="icon" href="/img/logo.jpg">

    <!-- Set the web app picture -->
    <link rel="apple-touch-icon" href="/img/logo.jpg">
</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if (isset($_GET['register'])) {
    $error = false;
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $username = $_POST['user'];

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailError = 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if (strlen($pwd) == 0) {
        $pwdError = 'Bitte ein pwd angeben<br>';
        $error = true;
    }
    if ($pwd != $pwd2) {
        $pwd2Error = 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if (!$error) {
        $statement = $pdo->prepare("SELECT * FROM login WHERE mail = :mail");
        $result = $statement->execute(array('mail' => $mail));
        $user = $statement->fetch();

        if ($user !== false) {
            $maildublication = 'Diese E-Mail-Adresse bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if (!$error) {
        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO login (mail, pwd, user, uuid, mail_verified) VALUES (:mail, :pwd, :username, UUID(), 0)");
        $result = $statement->execute(array('mail' => $mail, 'pwd' => $pwd_hash, 'username' => $username));

        if ($result) {
            $successfulRegisration = 'Du wurdest erfolgreich registriert.</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if ($showFormular) {
    ?>

    <div class="wrapper">
        <div class="title">
            Registrieren
        </div>
        <form action="?register=1" method="post">
            <div class="field">
                <!-- Missing label intended -->
                <!--suppress HtmlFormInputWithoutLabel -->
                <input type="text" type="email" size="40" maxlength="250" name="mail" required placeholder="E-Mail">

            </div>
            <?php if (isset($mailError)): ?>
                <p style="color: red; text-align: center"  class="error"><?php echo $mailError; ?></p>
            <?php endif; ?>

            <?php if (isset($maildublication)): ?>
                <p style="color: red; text-align: center"  class="error"><?php echo $maildublication; ?></p>
            <?php endif; ?>
            <div class="field">
                <!-- Missing label intended -->
                <!--suppress HtmlFormInputWithoutLabel -->
                <input type="text" type="text" size="40" maxlength="250" name="user" required placeholder="Username">

            </div>
            <div class="field">
                <!-- Missing label intended -->
                <!--suppress HtmlFormInputWithoutLabel -->
                <input type="password" size="40" maxlength="250" name="pwd" required placeholder="Passwort">

            </div>
            <?php if (isset($pwdError)): ?>
                <p style="color: red; text-align: center"  class="error"><?php echo $pwdError; ?></p>
            <?php endif; ?>
            <div class="field">
                <!-- Missing label intended -->
                <!--suppress HtmlFormInputWithoutLabel -->
                <input type="password" size="40" maxlength="250" name="pwd2" required
                       placeholder="Passwort Wiederholen">
            </div>
            <?php if (isset($pwd2Error)): ?>
                <p style="color: red; text-align: center"  class="error"><?php echo $pwd2Error; ?></p>
            <?php endif; ?>


            <div class="field">
                <input type="submit" value="Abschicken">
            </div>

        </form>
    </div>

    <?php
} //Ende von if($showFormular)

if (!$showFormular) { ?>

    <div class="wrapper">
        <div class="title">
            Registrieren
        </div>

        <!--suppress CssUnresolvedCustomProperty -->
        <div class="field" style="    padding: 10px 30px 50px 30px;
    background: var(--input-bg);
    border-radius: 0 0 15px 15px;">
            <?php if (isset($successfulRegisration)): ?>
                <!--suppress CssUnresolvedCustomProperty -->
                <div style="background-color: var(--input-bg); padding: 30px 0 30px 0!important;">
                    <p style="color: green; text-align: center; padding: 0 0 20px 0"
                       class="error"><?php echo $successfulRegisration; ?></p>
                    <div style="height: 50px; width: 80% !important; background: linear-gradient(-135deg, #c850c0, #4158d0); color: #fff; padding: 10px; text-align: center; margin: 0 auto; border-radius: 20px">
                        <a style="color: #fff; text-decoration: none;font-family: Poppins, sans-serif;font-size: 20px; font-weight: 500"
                           href="Index.php">Zum Login</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>


    <?php
}

?>

</body>
</html>
