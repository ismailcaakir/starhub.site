#!/bin/bash
cd laradock

docker-compose up -d nginx mysql phpmyadmin redis php-worker workspace "$@"
