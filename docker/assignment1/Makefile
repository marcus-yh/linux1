#!/usr/bin/make

include .env
USER_ID=1000
GROUP_ID=1000
export

.PHONY: build
build:
	docker-compose build

.PHONY: run
run:
	docker-compose run assignment1

test:
	docker-compose run assignment1 ./test/functional-tests