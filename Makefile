
setup:
	docker-compose run --rm testbench composer install

test:
	docker-compose run --rm --service-ports --use-aliases testbench phpunit
