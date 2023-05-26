<?php 

include('db.php');
session_start();

if (isset($_GET["id"]) && $_GET["id"] == $_SESSION["id"]) {
  if(isset($_SESSION["id"])){
    $menu_link = '<a href="index.php?id='. $_SESSION["id"] .'&exit=1" class="btn btn--size-sm btn--theme-accent">Вийти</a>';
    $course_link = '<a href="buy.php?id='. $_SESSION["id"] .'" class="btn btn--size-md btn--theme-accent services-card__btn">Замовити</a>';
  }

  $courses_query = "SELECT * FROM courses";

  $result = $conn->query($courses_query);

  if ($result->num_rows > 0) {
      // Виведення результатів
      $my_courses = '';
      while ($row = $result->fetch_assoc()) {
          $my_courses = $my_courses . '<div class="services__list-col">
                    <article class="services-card">
                      <div class="services-card__inner">
                        <h3 class="title-size-4 services-card__title">'. $row["name"] .'</h3>
                        <div class="title-size-6 services-card__count">'. $row["lesson_count"] .' занять</div>
                        <ul class="services-card__list">
                          <li>'. $row["type"] .'</li>
                          <li>'. $row["lesson_duration"] .' хвилин</li>
                        </ul>
                        <div class="title-size-5 services-card__price">'. $row["cost"] .' грн / урок</div>
                        <a href="delete.php?id='. $_SESSION["id"] .'&course_id='.$row["id"].'&mode=admin" class="btn btn--size-md btn--theme-red services-card__btn">Видалити</a>
                        <a href="edit.php?id='. $_SESSION["id"] .'&course_id='.$row["id"].'&mode=admin" class="btn btn--size-md btn--theme-accent services-card__btn">Редагувати</a>
                      </div>
                    </article>
                  </div>';
      }
  } else {
      echo "Немає результатів.";
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])){
    $name = $_POST["name"];
    $lesson_count = $_POST["lesson_count"];
    $type = $_POST["type"];
    $lesson_duration = $_POST["lesson_duration"];
    $cost = $_POST["cost"];
    $insert_course_query = "INSERT INTO courses (name, lesson_count, type, lesson_duration, cost) VALUES ('". $name ."', '". $lesson_count ."', '". $type. "', '". $lesson_duration ."', '". $cost ."')";
      if ($conn->query($insert_course_query) === TRUE) {
        header("Location: admin.php?id=". $_SESSION["id"]);
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
      <a href="/?id=<?php echo($user_id); ?>" class="logo header__logo">Polyglot Hub</a>
      <nav class="nav header__nav">
        <ul class="nav__list">
          <li class="nav__item">
            <?php echo $menu_link; ?>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- header END -->
  <div class="admin-page">
    <div class="container container--size-md admin-page__container">
      <div class="admin-page__center">
        <h4 class="admin-page__title">Всі користувачі</h4>
        <div class="user-list">
          <?php 
            // Запит SQL з використанням підзапиту для вибору унікальних користувачів та їхніх курсів
            $sql_users = "SELECT u.id, u.name AS user_name, u.phone,
                          (SELECT GROUP_CONCAT(c.name SEPARATOR ', ')
                           FROM courses c
                           JOIN purchased_courses pc ON pc.course_id = c.id
                           WHERE pc.user_id = u.id) AS purchased_courses
                          FROM users u
                          ORDER BY u.id";

            $result_users = $conn->query($sql_users);

            if ($result_users->num_rows > 0) {
                while ($row = $result_users->fetch_assoc()) {
                    echo '<div class="user-card">';
                    echo '<div class="user-id">User ID:<br>' . $row["id"] . '</div>';
                    echo '<div class="user-name">User Name:<br>' . $row["user_name"] . '</div>';
                    echo '<div class="courses">Courses:<br>' . $row["courses"] . '</div>';
                    echo '<div class="phone">Phone:<br>' . $row["phone"] . '</div>';
                    echo '</div>';
                }
            } else {
                echo "Немає результатів.";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="admin-page">
    <div class="container container--size-md admin-page__container">
      <h4 class="admin-page__title">Редагувати/Видалити курс</h4>
      <div class="services__list">
        <?php echo $my_courses; ?>
      </div>
    </div>
  </div>
  <div class="admin-page">
    <div class="container container--size-md admin-page__container">
      <div class="admin-page__center">
        <form action="admin.php?id=<?php echo($_SESSION["id"]); ?>" method="post" class="">
          <div class="user-form__title">Додати новий курс</div>
          <input type="text" name="name" class="form-input" value=""  required="" placeholder="Назву курсу">
          <input type="text" name="lesson_count" class="form-input" value=""  required="" placeholder="Кількість занять на курсі">
          <input type="text" name="type" class="form-input" value=""  required="" placeholder="Тип заняття">
          <input type="number" name="lesson_duration" class="form-input" value=""  required="" placeholder="Його тривалість">
          <input type="number" name="cost" class="form-input" value=""  required="" placeholder="Вартість (грн)">
          <button type="submit" class="btn btn--size-md btn--theme-accent admin-page__btn">Додати курс</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php

}

?>