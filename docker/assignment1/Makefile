#!/usr/bin/make

include .env
USER_ID=$(shell id -u)
GROUP_ID=60000
export

.PHONY: build
build:
	docker-compose build

.PHONY: run
run:
	docker-compose run assignment1