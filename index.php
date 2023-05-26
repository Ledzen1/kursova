<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Polyglot Hub - вивчення іноземних мов</title>
  <link href="./css/style.css?v=234235734245" type="text/css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
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
      <form action="mail.php" method="POST" class="popap-form">
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
          <li class="nav__item">
            <a href="#intro" class="nav__link">Про нас</a>
          </li>
          <li class="nav__item">
            <a href="#services" class="nav__link">Курси</a>
          </li>
          <li class="nav__item">
            <a href="#step" class="nav__link">Співпраця</a>
          </li>
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
        <div class="intro__description">Вибирайте один із тарифів (Експлорер/Мовний Візіонер/Поліглот)</div>
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
        <div class="services__list-col">
          <article class="services-card">
            <div class="services-card__inner">
              <h3 class="title-size-4 services-card__title">Експлорер</h3>
              <div class="title-size-6 services-card__count">6 занять</div>
              <ul class="services-card__list">
                <li>Індивідуальні уроки з викладачем</li>
                <li>60 хвилин</li>
              </ul>
              <div class="title-size-5 services-card__price">292 грн / урок</div>
              <a href="#" class="js-modal-init btn btn--size-md btn--theme-accent services-card__btn">Спробувати</a>
            </div>
          </article>
        </div>
        <div class="services__list-col">
          <article class="services-card">
            <div class="services-card__inner">
              <h3 class="title-size-4 services-card__title">Мовний Візіонер</h3>
              <div class="title-size-5 services-card__count">12 занять</div>
              <ul class="services-card__list">
                <li>Індивідуальні уроки з викладачем</li>
                <li>60 хвилин</li>
              </ul>
              <div class="title-size-5 services-card__price">274 грн / урок</div>
              <a href="#" class="js-modal-init btn btn--size-md btn--theme-accent services-card__btn">Спробувати</a>
            </div>
          </article>
        </div>
        <div class="services__list-col">
          <article class="services-card is-special">
            <div class="services-card__inner">
              <h3 class="title-size-4 services-card__title">Поліглот</h3>
              <div class="title-size-5 services-card__count">20 занять</div>
              <ul class="services-card__list">
                <li>Індивідуальні уроки з викладачем</li>
                <li>60 хвилин</li>
              </ul>
              <div class="title-size-5 services-card__price">250 грн / урок</div>
              <a href="#" class="js-modal-init btn btn--size-md btn--theme-accent services-card__btn">Спробувати</a>
            </div>
          </article>
        </div>
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