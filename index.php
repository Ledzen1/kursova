<?php 
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['exit'])) {
  session_unset();
  session_destroy();
  header("Location: index.php");
}

if(isset($_SESSION["id"])) {
  $menu_link = '<a href="index.php?id='. $_SESSION["id"] .'&exit=1" class="btn btn--size-sm btn--theme-accent">Вийти</a>';
  $course_link = '<a href="buy.php?id='. $_SESSION["id"] .'" class="btn btn--size-md btn--theme-accent services-card__btn">Замовити</a>';
  $menu_signup = '';
  $js_modal = '';
} else {
  $course_link = '<a href="" class="btn btn--size-md btn--theme-accent services-card__btn">Спробувати</a>';
  $menu_link = '<a href="login.php" class="btn btn--size-sm btn--theme-accent">Увійти</a></a>';
  $menu_signup = '<li class="nav__item"><a href="signup.php" class="nav__link">Зареєструватись</a></li>';
  $js_modal = 'js-modal-init';
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
  <div class="popap">
    <div class="popap__middle">
      <div class="js-modal-init popap-toggle popap__remove">
        <img src="images/icon-close.svg">
      </div>
      <div class="popap__message">Дані успішно отримано ✅Незабаром наш менеджер зв'яжеться з вами для узгодження дати та часу уроку</div>
      <form action="sendform.php" method="POST" class="popap-form">
        <div class="popap__title">Замовте безкоштовний пробний урок</div>
        <input type="text" name="name" class="form-input" placeholder="Ім'я">
        <input type="number" name="tel" required class="form-input" placeholder="Телефон">
        <input type="email" name="email" required class="form-input" placeholder="Електронна пошта">
        <button type="submit" class="btn btn--size-md btn--theme-accent popap__submit">Отримати урок</button>
      </form>
    </div>
  </div>
  <!-- header BEGIN -->
  <header class="header">
    <div class="container container--size-md header__container">
      <a href="/" class="logo header__logo">Polyglot Hub</a>
      <nav class="nav header__nav">
        <ul class="nav__list">
          <?php if(isset($_SESSION["id"])){
            echo('<li class="nav__item">
                    <a href="user.php?id='.$_SESSION["id"].'" class="nav__link">Кабінет</a>
                  </li>
                  <li class="nav__item">
                    '.$menu_link .'
                  </li>');
          }else{
            echo('<li class="nav__item">
                    <a href="#intro" class="nav__link">Про нас</a>
                  </li>
                  <li class="nav__item">
                    <a href="#services" class="nav__link">Курси</a>
                  </li>
                  <li class="nav__item">
                    <a href="#step" class="nav__link">Співпраця</a>
                  </li>
                  <li class="nav__item">
                    '.$menu_link .'
                  </li>');
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>
  <!-- header END -->
  <!-- intro BEGIN -->
  <section id="intro" class="intro">
    <div class="container container--size-md intro__container">
      <div class="intro__content">
        <h1 class="intro__title">Polyglot Hub:<br>Розкрий світ мов!</h1>
        <h2 class="title title-size-5 intro__subtitle">Досліджуйте нові горизонти, оволодівайте мовами та з'єднуйтеся зі світом</h2>
        <a href="#" class="js-modal-init btn btn--size-md btn--theme-accent intro__btn">Залишити заявку</a>
      </div>
      <picture class="intro__hero">
        <img src="images/intro-hero.jpg" alt="Polyglot Hub: Розкрий світ мов">
      </picture>
    </div>
  </section>
  <!-- intro END -->
  <!-- services BEGIN -->
  <section id="services" class="services">
    <div class="container container--size-md services__container">
      <h2 class="section-title step__title">Виберіть пакет індивідуальних занять</h2>
      <div class="services__list">
        <?php
          $courses_query = "SELECT * FROM courses";
          $courses_result = mysqli_query($conn, $courses_query);
          while ($courses_row = mysqli_fetch_assoc($courses_result)) {
            echo('<div class="services__list-col">
                    <article class="services-card">
                      <div class="services-card__inner">
                        <h3 class="title-size-4 services-card__title">'. $courses_row["name"] .'</h3>
                        <div class="title-size-6 services-card__count">'. $courses_row["lesson_count"] .' занять</div>
                        <ul class="services-card__list">
                          <li>'. $courses_row["type"] .'</li>
                          <li>'. $courses_row["lesson_duration"] .' хвилин</li>
                        </ul>
                        <div class="title-size-5 services-card__price">'. $courses_row["cost"] .' грн / урок</div>
                        <a href="user.php?id='. $_SESSION["id"] .'&buy=true&course_id='.$courses_row["id"].'" class="'.$js_modal.' btn btn--size-md btn--theme-accent services-card__btn">Замовити</a>
                      </div>
                    </article>
                  </div>');
          }
        ?>
      </div>
    </div>
  </section>
  <!-- services END -->
  <!-- step BEGIN -->
  <section id="step" class="step">
    <div class="container container--size-md step__container">
      <h2 class="section-title step__title">Як проходить навчання <span class="color-accent">Polyglot Hub</span></h2>
      <div class="step__list">
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 1</div>
              <h3 class="step__list-card-title">Записуйтесь на безкоштовне заняття</h3>
              <div class="step__list-card-text">Ми ознайомлюємося зі студентом, визначаємо основні цілі, побажання та проводимо тестування</div>
            </div>
          </article>
        </div>
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 2</div>
              <h3 class="step__list-card-title">Визначаємо цілі та розклад</h3>
              <div class="step__list-card-text">Навчитися одній темі та підготуватися до ЗНО - це різні завдання, але ми вміємо справитися з кожним з відмінністю</div>
            </div>
          </article>
        </div>
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 3</div>
              <h3 class="step__list-card-title">Розробляємо індивідуальну програму</h3>
              <div class="step__list-card-text">Підбираємо методичні матеріали, враховуючи навчальні цілі, складаємо план занять та зручний графік для вас</div>
            </div>
          </article>
        </div>
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 4</div>
              <h3 class="step__list-card-title">Студент регулярно вчиться</h3>
              <div class="step__list-card-text">Згідно зі своєю програмою: теорія, практика, інтерактивні заняття з дошкою, для виправлення помилок</div>
            </div>
          </article>
        </div>
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 5</div>
              <h3 class="step__list-card-title">Моніторимо прогрес</h3>
              <div class="step__list-card-text">Регулярний зворотній зв'язок від викладача, тести та практика чітко відображають прогрес учня та надають звіт батькам</div>
            </div>
          </article>
        </div>
        <div class="step__list-col">
          <article class="step__list-card">
            <div class="step__list-card-inner">
              <div class="step__list-card-count">Крок 6</div>
              <h3 class="step__list-card-title">Славимо результат</h3>
              <div class="step__list-card-text">Покращені оцінки, успішні іспити, високі бали на ЗНО - у вас точно буде привід пишатися своєю дитиною</div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <!-- step END -->
</div>

</body>
</html>