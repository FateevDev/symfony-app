up:
	make down
	docker compose up -d nginx

down:
	docker compose down --remove-orphans

install:
	make env
	make up
	docker compose exec backend composer install

env:
	test -f .env || cp .env.example .env

bash:
	docker compose exec backend bash

SERVICE_NAME = $(filter-out $@,$(MAKECMDGOALS))
%:
 @:
debug-container:
	docker compose exec backend php bin/console debug:container $(SERVICE_NAME)

debug-container-params:
	docker compose exec backend php bin/console debug:container --parameters
debug-doctrine:
	docker compose exec backend php bin/console debug:config doctrine
debug-router:
	docker compose exec backend php bin/console debug:router


SERVICE_NAME = $(filter-out $@,$(MAKECMDGOALS))
%:
 @:
debug-autowiring:
	docker compose exec backend php bin/console debug:autowiring $(SERVICE_NAME)

migrations-status:
	docker compose exec backend php bin/console doctrine:migrations:status -vvv
migrations-diff:
	docker compose exec backend php bin/console doctrine:migrations:diff -vvv
migrations-migrate:
	docker compose exec backend php bin/console doctrine:migrations:migrate -vvv
migrations-rollback:
	docker compose exec backend php bin/console doctrine:migrations:migrate prev -vvv
migrations-migrate-dry-run:
	docker compose exec backend php bin/console doctrine:migrations:migrate --dry-run -vvv
migrations-generate:
	docker compose exec backend php bin/console doctrine:migrations:generate

generate-keypair:
	docker compose exec backend php bin/console lexik:jwt:generate-keypair

composer-dump-autoload:
	docker compose exec backend composer dump-autoload
