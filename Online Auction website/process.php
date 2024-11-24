<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $card_number = $_POST['card-number'];
    $exp_date = $_POST['exp-date'];
    $cvv = $_POST['cvv'];

    header('Location: thank_you.html');
}
?>