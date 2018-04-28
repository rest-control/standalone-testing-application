.PHONY: run up stop

NAME ?= rest-control
CONSOLE := docker-compose -p $(NAME) -f ./Docker/docker.yml

start:
	@-$(CONSOLE) up -d
stop:
	@-$(CONSOLE) stop
build:
	$(CONSOLE) build --pull
run-tests:
	$(CONSOLE)  run --service-ports --rm cli php vendor/bin/rest-control run