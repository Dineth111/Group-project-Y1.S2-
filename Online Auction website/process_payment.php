<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cradnumber = $_POST['cradnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $CVV = $_POST['CVV'];

    header('Location: thank_you.html');
}
?>