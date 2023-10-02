#!/usr/bin/make

include .env
USER_ID=$(shell id -u)
export

.PHONY: build
build:
	docker-compose build

.PHONY: run
run:
	USER=${USER_ID} docker-compose run assignment2