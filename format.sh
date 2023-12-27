#!/bin/bash

for dir in resources/views/*/
    do
        echo $dir
        blade-formatter --progress --write './'$dir'/*.blade.php'
done