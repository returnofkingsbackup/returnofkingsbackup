#!/bin/bash

while IFS='' read -r line || [[ -n "$line" ]]; do
    ditto "$line" "keep/www.returnofkings.com/$line"
done < "$1"
