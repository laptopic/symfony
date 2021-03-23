Создал свой dockerfile для работы с symfony с использованием консоли

node yarn composer symfony cli xdebag
внутри не должно быть папки symfony удалить
запускаем по очереди
composer create-project symfony/website-skeleton symfony
docker-compose up -d
http://localhost:81/ - откроется сайт
docker exec -it symfony_php_1 bash

sudo chmod -R 777 /var/www/symfony1

для xdebug главное прописать правильные пути проекта на компе и в dockere
вкладка Servers Use path mappings ......
/var/www/symfony/symfony/public  --- /var/www/symfony/public