.PHONY: run up stop

NAME ?= rest-control
CONSOLE := docker-compose -p $(NAME) -f ./Docker/docker.yml

start:
	- docker network create rest-control
	@-$(CONSOLE) up -d
stop:
	@-$(CONSOLE) stop
build:
	$(CONSOLE) build --pull