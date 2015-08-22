#!/bin/bash

echo -e "----- JUST A FEW CHECKS -----"

echo -e "TESTS"

phpunit

echo -e "CODESTYLE"

php-cs-fixer fix . --level=symfony --fixers="contrib" --verbose