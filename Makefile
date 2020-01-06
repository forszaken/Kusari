up:
	docker-compose up -d

down:
	docker-compose down

frontend-bash:
	docker-compose exec frontend-nodejs bash

frontend-install:
	docker-compose exec frontend-nodejs npm install

frontend-build:
	docker-compose exec frontend-nodejs npm run build

frontend-watch:
	docker-compose exec frontend-nodejs npm run watch


test:
	docker-compose exec backend-php-fpm vendor/bin/phpunit --colors=always

bash:
	docker-compose exec backend-php-fpm bash

ci:
	docker-compose exec backend-php-fpm composer install

diff:
	docker-compose exec backend-php-fpm php artisan doctrine:migrations:diff

migrate:
	docker-compose exec backend-php-fpm php artisan doctrine:migrations:migrate

rollback:
	docker-compose exec backend-php-fpm php artisan doctrine:migrations:rollback

stan:
	docker-compose exec backend-php-fpm php artisan code:analyse --level=4

migrate-diff: diff perm

start: up frontend-watch