Создал свой dockerfile для работы с symfony с использованием консоли

node yarn composer symfony cli xdebag

docker-compose up --build

docker exec -it symfony_php_1 bash

для xdebug главное прописать правильные пути проекта на компе и в dockere
вкладка Servers Use path mappings ......
/var/www/symfony/symfony/public  --- /var/www/symfony/public