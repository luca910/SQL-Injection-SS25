<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<body>
<?php
if (isset($_SESSION['user'])) {
    echo "You are logged in as " . $_SESSION['user'];
} else {
    echo "You are not logged in!";
}
