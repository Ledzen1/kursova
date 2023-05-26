<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $to = "fetunigor@gmail.com";
    $subject = "Заявка - Поліглот";
    $message = "Ім'я: $name\nТелефон: $phone\Емейл: $email";
    $headers = "From: fetunigor@gmail.com\r\nReply-To: fetunigor@gmail.com";
    mail($to, $subject, $message, $headers);
}
?>