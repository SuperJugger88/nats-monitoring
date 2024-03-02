# Мониторинг для брокера сообщений NATS с использованием Grafana и Prometheus

Этот проект демонстрирует настройку мониторинга для брокера сообщений NATS с использованием Grafana и Prometheus.

## Требования

- Установлен Docker и Docker Compose

## Начало работы

1. Клонируйте репозиторий:

    ```bash
    git clone https://github.com/yourusername/nats-monitoring.git
    cd nats-monitoring
    ```

2. Соберите и запустите контейнеры:

    ```bash
    ./build.sh
    ```

    Этот скрипт использует Docker Compose для сборки и запуска необходимых контейнеров для NATS, Prometheus, Grafana и приложения nats-laravel.

3. Проверьте отправку сообщений через NATS:

    ```bash
    ./test-nats.sh
    ```

    Этот скрипт отправляет тестовые сообщения в брокер NATS для проверки его правильной работы.

4. Войдите в панель управления Grafana:

    Откройте веб-браузер и перейдите по адресу http://localhost:8442

    - Имя пользователя: admin
    - Пароль: rolawast43018460

## Структура каталогов

- `docker/`: Файлы и конфигурации, связанные с Docker.
- `nats-laravel/`: Исходный код вашего приложения.

## Конфигурация мониторинга

- Метрики NATS собираются Prometheus с `/varz` конечной точки.
- Grafana предоставляет предварительно настроенную панель (`nats-monitoring-dashboard.json`) для визуализации метрик NATS.
