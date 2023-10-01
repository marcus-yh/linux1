#/bin/make

include .env
export

.PHONY: build
build:
	docker-compose build

.PHONY: test
unit-test:
	echo testing

