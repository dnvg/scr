#!/bin/bash

cd /arc/upl/vids/

mediainfo --Inform="file:///arc/scr/template.txt" /arc/upl/vids/* > /arc/upl/inf/filesinfo.txt

mtn -i -t -I -c 2 -r 3 -w 0 -O /arc/upl/img /arc/upl/vids
mtn -i -t -c 5 -r 5 -O /arc/upl/img /arc/upl/vids

for i in *
	do rar m -r- -m0 -v495000000b -sm500000000 -ximg -xinf -xrars "/arc/upl/rars/$i" "$i";
done

mv /arc/upl/rars/* /arc/upl/vids/
