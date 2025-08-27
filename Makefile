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
