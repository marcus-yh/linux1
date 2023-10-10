#!/usr/bin/make

include .env
USER_ID=1000
export

.PHONY: build
build:
	docker-compose build

.PHONY: run
run:
	USER=${USER_ID} docker-compose run assignment2