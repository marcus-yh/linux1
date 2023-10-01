#/bin/make

include .env
export

.PHONY: build
build:
	docker-compose build

run:
	docker-compose --verbose run debian

.PHONY: test
unit-test:
	echo testing

