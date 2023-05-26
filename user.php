<?php 

include('db.php');
session_start();

if (isset($_GET["id"]) && $_GET["id"] == $_SESSION["id"]) {
  if(isset($_SESSION["id"])){
    $menu_link = '<a href="index.php?id='. $_SESSION["id"] .'&exit=1" class="btn btn--size-sm btn--theme-accent">Вийти</a>';
    $course_link = '<a href="buy.php?id='. $_SESSION["id"] .'" class="btn btn--size-md btn--theme-accent services-card__btn">Замовити</a>';
  }


  $user_id = $_GET["id"];
  $user_info_query = "SELECT * FROM users WHERE id = '". $user_id ."'";
  $user_info_result = $conn->query($user_info_query);

  if ($user_info_result->num_rows > 0) {
    $user_row = $user_info_result->fetch_assoc();
    $user_login = $user_row["login"];
    $user_name = $user_row["name"];
  }
  
  $my_courses_query = "SELECT courses.*, purchased_courses.*
                      FROM courses
                      INNER JOIN purchased_courses ON courses.id = purchased_courses.course_id
                      WHERE purchased_courses.user_id = '". $user_id ."'";

  $result = $conn->query($my_courses_query);

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
                        <a href="delete.php?id='. $_SESSION["id"] .'&course_id='.$row["id"].'" class="btn btn--size-md btn--theme-accent services-card__btn">Скасувати</a>
                      </div>
                    </article>
                  </div>';
      }
  } else {
      echo "Немає результатів.";
  }

  if(isset($_GET["buy"]) && isset($_GET["course_id"])) {
    $course_id = $_GET["course_id"];
    $insert_course = "INSERT INTO purchased_courses (user_id, course_id) VALUES ('". $user_id ."', '". $course_id. "')";
    $insert_course_result = $conn->query($insert_course);
    if($insert_course_result) {
      header("Location: user.php?id=". $_SESSION["id"]);
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
      <h4 class="admin-page__title">Мої курси</h4>
      <div class="services__list">
        <?php echo $my_courses; ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php

}

?>