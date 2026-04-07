# 📝 PHP Blog (Тестовое задание)

Веб-приложение реализованное на **чистом PHP (без фреймворков)** с использованием современных архитектурных подходов.

---

## Какие пакеты использовались

* PHP 8.1+
* MySQL 8
* Nginx (Docker)
* Smarty (шаблонизатор)
* SCSS (стили)
* AltoRouter (роутинг)
* PHPUnit (тестирование)
* PHPStan (проверка кода)
* PHP_CodeSniffer (проверка стиля)

---

## Чистая архитектура

Проект построен с использованием подхода **DDD-lite (Domain-Driven Design)**:

```id="arch_flow"
Controller → Service → Repository → Database
```
---

## Функциональность

### 🔹 Доменная структура

* Домены: `Post` и `Category`
* Каждый домен содержит:

    * Repository (работа с данными)
    * Service (бизнес-логика)

---

### 🔹 Роутинг

* Все маршруты описаны в `route/web.php`
* Поддержка параметров (`/post/[i:id]`)

---

### 🔹 Работа с БД

* PDO + Singleton
* Конфигурация через `.env`

---

### 🔹 Миграции и сидинг

Реализована собственная система (по аналогии с Laravel):

* `database/migrations` — структура базы данных
* `database/seeders` — тестовые данные
* Таблица `migrations` отслеживает выполненные миграции

---

### 🔹 Frontend (SCSS + Smarty)

* Smarty для шаблонов
* Layout + переиспользуемые компоненты
* SCSS-стили

---

### 🔹 Тестирование

* PHPUnit для unit-тестов
* Покрытие слоя репозиториев
* Подключен PHPStan
* Подключен CodeSniffer

---

## Структура проекта

```id="project_tree_ru"
project/
├── docker/
├── public/
├── route/
├── src/
│   ├── Controllers/
│   ├── Database/
│       ├── migrations/
│       └── seeders/
│   ├── Domains/
│       ├── Category/
│       └── Post/
│   └── Views/
│       ├── scss/
│       └── templates/
├── tests/
├── composer.json
├── docker-compose.yml
├── package.json
└── phpunit.xml
```

---

## Установка

```bash id="install_cmd"
git clone git@github.com:dkinev/abelotest.git
cd abelotest

docker-compose up -d --build
docker-compose exec php composer update
```

---

## Запуск миграций и сидов

```bash id="migrate_seed_cmd"
docker-compose exec php php src/Database/migrate.php
docker-compose exec php php src/Database/seed.php
```

---

## Запуск проекта

Открыть в браузере:

```id="url_cmd"
http://localhost:8080
```

---

## Остальные команды

```id="url_cmd"
 docker-compose exec php composer test # Запуск автотестов
 docker-compose exec php composer stan # Запуск Stan
 docker-compose exec php composer cs # Проверка единого стиля PHP
 docker-compose exec php composer cs-fix # Фикс ошибок в стилях
```

---

## Использование LLM

Использовал ИИ для формирования синглтона в БД и обработчик миграций/сидирования т.к. это довольно стандартные подходы и их можно подключить из библиотек, но так код получается намного компактней.

Использовал для порезки макета и формирования основного scss.

Для написания автотестов, довольно стандартная процедура.

Для написания README.md

Всё пропускалось через себя и дорабатывалось-переписывалось уже вживую под проект.

Докер брал со своего существующего проекта и дописал/видоизменил.
