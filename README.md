<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 система "Склад"</h1>
    <br>
</p>

## Структура директорій

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

## ВИМОГИ

Мінімальна вимога цього шаблону проекту, яку підтримує ваш веб-сервер PHP 7+

## ВСТАНОВЛЕННЯ

На вашому компютери повінен буті встановленій git

    https://git-scm.com/download

Відкрийте термінал в тій папці куди бажаєте встановити додаток та введіть команду

    https://github.com/vitikstar/technomatix.git

Перейдіть в папку technomatix (cd technomatix) та конайте команду

    composer update

В цій же папці запустіть docker

    docker-compose up -d

Виконайте всі міграції В СЕРЕДИНІ САМОГО КОНТЕЙНЕРА!!!

    docker-compose exec php php yii migrate

Потім ви можете отримати доступ до програми за допомогою наступного URL:

    http://localhost:8000/

## ДОКУМЕНТАЦІЯ ДО СТОРОННІХ РОЗШИРЕНЬ

- [Журнал змін](CHANGELOG.md).
- [Керівництво з авторизації](http://www.yiiframework.com/doc-2.0/guide-security-authorization.html). Важливо, прочитайте це спочатку, перш ніж продовжувати.
- [Базова конфігурація](docs/guide/configuration.md)
- [Основне використання](docs/guide/basic-usage.md).
- [Управління користувачами](docs/guide/user-management.md).
- [Використання меню](docs/guide/using-menu.md).
- [Api](https://mdmsoft.github.io/yii2-admin/index.html).
