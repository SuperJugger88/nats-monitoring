#!/bin/bash

echo 'Создаю Subscriber...'
sleep 1
docker exec php-fpm php artisan nats-sub >> ./scripts//messages.out 2>&1 &
echo 'Успешно!'
sleep 1
echo 'Создаю Publisher...'
sleep 1
docker exec php-fpm php artisan nats-pub
echo 'Успешно!'
sleep 1
echo 'Было получено сообщение:' && sleep 1 && tail -n 1 ./scripts/messages.out
sleep 1
echo 'Все готово для мониторинга очереди сообщений!' 
pkill -f "nats-sub"