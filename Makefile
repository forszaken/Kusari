up:
	docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec php-fpm vendor/bin/phpunit --colors=always

bash:
	docker-compose exec php-fpm bash

ci:
	docker-compose exec php-fpm composer install