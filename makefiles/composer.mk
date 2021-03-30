composer-install: start
	@docker-compose exec -T php composer install --ansi

composer-update: start
	@docker-compose exec -T php composer update --ansi
