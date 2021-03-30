docker-build:
	@docker-compose build php

start:
	@docker-compose up -d php

shell: start
	@docker-compose exec php zsh
