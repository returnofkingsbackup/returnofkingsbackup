#!/bin/bash

for f in $(ls -A1 *.html | sort -n)
do
	php imgs.php $f 
	(>&2 echo $f)
done
