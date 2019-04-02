#!/bin/bash

mkdir bak

for f in $(ls -A1 *.html | sort -n)
do
	TITLE=$(sed -n 's/<title>\(.*\)<\/title>/\1/p' $f)
	echo "<a href=\"www.returnofkings.com/"$(basename "$f" .html)_fix.html"\" >"${TITLE//&#8211; Return Of Kings}"</a><br>"
	>&2 echo $f
	php articlefix.php $f "$TITLE" > $(basename "$f" .html)_fix.html
	mv $f bak/$f
done
