<?php include('db.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $name = $_POST["name"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];
  // Логіка реєстрації користувача

  // Перевірка, чи існує користувач з таким логіном
  $check_user_query = "SELECT * FROM users WHERE login = '". $login ."'";
  $check_user_result = $conn->query($check_user_query);

  if ($check_user_result->num_rows > 0) {
    echo "Користувач з таким логіном вже існує!";
  } else {
    // Вставка нового користувача в базу даних
    $insert_user_query = "INSERT INTO users (login, name, password, phone) VALUES ('". $login ."', '". $name ."', '". $password. "', '". $phone. "')";
    session_start();
    if ($conn->query($insert_user_query) === TRUE) {
      $user_id_query = "SELECT * FROM users WHERE login = '". $login ."' AND password = '". $password ."'";
      $user_id_result = $conn->query($user_id_query);
      if ($user_id_result->num_rows > 0) {// Отримання ID користувача
        $user_row = $user_id_result->fetch_assoc();
        $user_id = $user_row["id"];
        $_SESSION["id"] = $user_id;
        header("Location: index.php?id=". $_SESSION["id"]);
      }
    } else {
      echo "Помилка реєстрації користувача: " . $conn->error;
    }
  }
  
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Polyglot Hub - вивчення іноземних мов</title>
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="js/my.js"></script>
</head>
<body>

<div id="site">
  <!-- header BEGIN -->
  <header class="header">
    <div class="container container--size-md header__container">
      <a href="/" class="logo header__logo">Polyglot Hub</a>
    </div>
  </header>
  <!-- header END -->
  <div class="admin-page">
    <div class="container container--size-md admin-page__container">
      <form action="signup.php" method="POST" class="user-form">
        <h1 class="user-form__title">Форма реєстрації</h1>
        <input type="text" name="login" class="form-input" placeholder="Ваш логін" required>
        <input type="text" name="name" class="form-input" placeholder="Ваш прізвище та ім'я" required>
        <input type="number" name="phone" class="form-input" placeholder="Ваш телефон" required>
        <input type="password" name="password" class="form-input" placeholder="Ваш пароль" required>
        <button type="submit" class="btn btn--size-md btn--theme-accent admin-page__btn">Зареєструватись</button>
        <div class="footer-text">
          <a href="login.php">Вхід</a>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>