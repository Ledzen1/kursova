<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $address = $_POST["address"];
    $to = "Yar.kllak@gmail.com";
    $subject = "Нове замовлення на підключення";
    $message = "Ім'я: $name\nТелефон: $tel\nАдреса: $address";
    $headers = "From: Yar.kllak@gmail.com\r\nReply-To: Yar.kllak@gmail.com";
    mail($to, $subject, $message, $headers);
}
?>