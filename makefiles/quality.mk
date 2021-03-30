.: pre-commit

pre-commit: code-style-fix phpstan psalm tests

code-style-fix: start
	@docker-compose exec -T php vendor/bin/php-cs-fixer fix --ansi --verbose

phpstan: start
	@docker-compose exec -T php ./vendor/bin/phpstan analyse --ansi

psalm: start
	@docker-compose exec -T php ./vendor/bin/psalm --show-info=true

tests: start
	@docker-compose exec -T php vendor/bin/phpunit --verbose --colors=always
