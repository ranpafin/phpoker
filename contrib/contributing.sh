#!/bin/sh

echo "### PHPoker: Code style checker ###"

./bin/phpcs -p --standard=PSR2 --warning-severity=6 --colors src/
if [ $? != 0 ]
	then
	    echo "There are some code style issue."
	    echo "###Tidyng up the code ###"
	    ./bin/phpcbf -p --standard=PSR2 --warning-severity=6 src/
	    echo "DONE, retry the code should be fine."
		exit 1
	fi

echo "### PHPoker: DONE! ###"
