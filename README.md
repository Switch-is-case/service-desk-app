# Service Desk App (Laravel 12)

Тестовое задание для позиции PHP/Laravel Developer (Intern).
Система регистрации и обработки заявок (Service Desk) с разделением ролей.

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)
![TailwindCSS](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=for-the-badge&logo=tailwind-css)
![Docker](https://img.shields.io/badge/Docker-Sail-2496ED?style=for-the-badge&logo=docker)

---

## Реализованный функционал

Проект полностью соответствует техническому заданию:

1.  **Окружение:** Развернуто на Docker через Laravel Sail (Nginx, MySQL 8.0, Redis, phpMyAdmin).
2.  **Auth:** Регистрация и аутентификация через Laravel Breeze.
3.  **Роли и права:**
    *   **User:** Может создавать заявки и видеть только свои.
    *   **Admin:** Имеет доступ к Админ-панели, видит все заявки, меняет статусы.
4.  **UI/UX:** Чистый интерфейс на Blade + Tailwind CSS + Alpine.js.
5.  **База данных:** Миграции для структуры, Seeder для тестовых данных.
6.  **CI/CD:** GitHub Actions (автоматический запуск тестов и проверка кода).
7.  **Тесты:** Написаны Feature-тесты (25 тестов), проверяющие полный цикл работы.

---

## Требования к запуску

Для запуска проекта на локальной машине требуется:
*   **Docker Desktop** (запущенный).
*   **WSL2** (для пользователей Windows).
*   **Git**.

---

## Инструкция по установке

**1. Клонирование репозитория**
```
git clone https://github.com/Switch-is-case/service-desk-app.git
cd service-desk-app
```

**2. Настройка окружения**
Создайте файл .env из примера:
```
cp .env.example .env
```
Примечание: В настройках проекта порт приложения изменен на 8000, чтобы избежать конфликтов с занятым 80 портом.

**3. Запуск контейнеров (Laravel Sail)**
```
./vendor/bin/sail up -d
```

**4. Установка зависимостей**
Установка PHP-пакетов и сборка Frontend-ассетов:
```
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

**5. База данных**
Генерация ключа, запуск миграций и наполнение тестовыми данными:
```
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

**Доступы (Credentials)**
**Основной сайт**
Адрес: http://localhost:8000
Роль	Email	Пароль	Возможности
Admin	admin@example.com	password	Админ-панель, смена статусов заявок
User	user@example.com	password	Создание и просмотр своих заявок

**База данных (phpMyAdmin)**
Адрес: http://localhost:8081
Server: mysql
Username: sail
Password: password

**Тестирование**
Проект покрыт автоматическими тестами. Для запуска выполните:
```
./vendor/bin/sail artisan test
```

**CI/CD Workflow**
В репозитории настроен GitHub Actions (.github/workflows/ci.yml).
При каждом пуше в ветку main выполняется Pipeline:
Разворачивается окружение (Ubuntu + PHP 8.4).
Устанавливаются зависимости Composer.
Проверяется синтаксис PHP файлов (php -l).
Создается тестовая БД (SQLite) и прогоняются миграции.
Запускаются Unit и Feature тесты.
