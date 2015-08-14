#!/bin/bash

docker images -q |xargs docker rmi

DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

docker build -t phpoker_image $DIR

docker rm -f phpoker_container
docker run -d -v $DIR/../:/home/ranpafin/projects --name phpoker_container -ti phpoker_image bash

sleep 1

docker exec -ti -u ranpafin phpoker_container zsh
