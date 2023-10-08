#!/usr/bin/make

.PHONY: build-assignment1
build-assignment1:
	$(MAKE) -C ./docker/assignment1 build

.PHONY: build-assignment2
build-assignment2:
	$(MAKE) -C ./docker/assignment2 build

.PHONY: build-test
build-test:
	$(MAKE) -C ./docker/test build

.PHONY: build
build: build-assignment1 build-assignment2

.PHONY: run-assignment1
run-assignment1: build-assignment1
	$(MAKE) -C ./docker/assignment1 run

.PHONY: run-assignment2
run-assignment2:
	$(MAKE) -C ./docker/assignment2 run

.PHONY: run-test-assignment1
test-assignment1: build-assignment1
	$(MAKE) -C ./docker/assignment1 test