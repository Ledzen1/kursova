<?php include('db.php'); 

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];
   // Логіка входу користувача
  session_start();
  $login_query = "SELECT * FROM users WHERE login = '". $login ."' AND password = '". $password ."'";
  $login_result = $conn->query($login_query);
  if ($login_result->num_rows > 0) {// перевірка чи користувач існує
    $user_row = $login_result->fetch_assoc();
    $user_id = $user_row["id"];
    $_SESSION["id"] = $user_id;
    if($user_row["rules"] == 1){
      header("Location: admin.php?id=". $_SESSION["id"]);
    }else {
      header("Location: user.php?id=". $_SESSION["id"]);
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
      <form action="login.php" method="post" class="user-form">
        <h1 class="user-form__title">Форма входу</h1>
        <input type="text" name="login" class="form-input" placeholder="Ваш логін" required>
        <input type="password" name="password" class="form-input" placeholder="Ваш пароль" required>
        <button type="submit" class="btn btn--size-md btn--theme-accent admin-page__btn">Увійти</button>
        <div class="footer-text">
          <a href="signup.php">Зареєструватись</a>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>