<?php 

include('db.php');
session_start();

if (isset($_GET["course_id"]) && isset($_GET["id"]) && $_GET["id"] == $_SESSION["id"] && $_GET["mode"] == 'admin') {
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])){
    $course_id = $_GET["course_id"];
    $name = $_POST["name"];
    $lesson_count = $_POST["lesson_count"];
    $type = $_POST["type"];
    $lesson_duration = $_POST["lesson_duration"];
    $cost = $_POST["cost"];
    $sql_course = "UPDATE `courses` SET `name`=?, `cost`=?, `lesson_count`=?, `type`=?, `lesson_duration`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql_course);
    if (!$stmt) {
        echo "Помилка підготовки запиту: " . $conn->error;
        exit();
    }
    // Прив'язка параметрів та виконання запиту
    $stmt->bind_param("ssssss", $name, $cost, $lesson_count, $type, $lesson_duration, $course_id);
    if (!$stmt->execute()) {
        echo "Помилка виконання запиту: " . $stmt->error;
        exit();
    }else{

      header("Location: admin.php?id=" . $_SESSION['id']);
    }
  }
  if(isset($_SESSION["id"])){
    $menu_link = '<a href="index.php?id='. $_SESSION["id"] .'&exit=1" class="btn btn--size-sm btn--theme-accent">Вийти</a>';
    $course_link = '<a href="buy.php?id='. $_SESSION["id"] .'" class="btn btn--size-md btn--theme-accent services-card__btn">Замовити</a>';
  }

  $course_id = $_GET["course_id"];
  $courses_query = "SELECT * FROM courses WHERE id='". $course_id ."'";

  $result = $conn->query($courses_query);

  if ($result->num_rows > 0) {
      // Виведення результатів
      $my_courses = '';
      while ($row = $result->fetch_assoc()) {
          $edit_form = '<form action="edit.php?id='. $_SESSION["id"] .'&course_id='. $row["id"] .'&mode=admin" method="post" class="user-form">
                          <input type="text" name="name" class="form-input" value="'. $row["name"] .'" placeholder="Введіть назву курсу">
                          <input type="text" name="lesson_count" class="form-input" value="'. $row["lesson_count"] .'" placeholder="Введіть кількість занять на курсі">
                          <input type="text" name="type" class="form-input" value="'. $row["type"] .'" placeholder="Введіть тип заняття">
                          <input type="text" name="lesson_duration" class="form-input" value="'. $row["lesson_duration"] .'" placeholder="Тривалість заняття (в хвилинах)">
                          <input type="text" name="cost" class="form-input" value="'. $row["cost"] .'" placeholder="Вартість (в грн.)">
                          <button type="submit" class="btn btn--size-md btn--theme-accent admin-page__btn">Редагувати</button>
                        </form>';
      }
  } else {
      echo "Немає результатів.";
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
      <h4 class="admin-page__title">Редагувати курс</h4>
      <?php echo $edit_form; ?>
    </div>
  </div>
</div>

</body>
</html>
<?php

}

?>