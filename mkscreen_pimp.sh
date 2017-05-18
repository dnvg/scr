#!/bin/bash
rm /fo/uplvids/upl/img/*
rm /fo/uplvids/upl/img_large/*
rm /fo/uplvids/upl/img_small/*
rm /fo/uplvids/upl/img_gif/*
rm /fo/uplvids/upl/gif/*
rm /fo/uplvids/upl/img_montage/*

cd /fo/uplvids/upl/vids/
mediainfo --Inform="file:///fo/uplvids/scr/template.txt" --LogFile=/fo/uplvids/upl/inf/filesinfo.txt /fo/uplvids/upl/vids/*

#Collage
/fo/uplvids/scr/mtn -b 2 -i -I -t -c 1 -r 16 -w 600 -O /fo/uplvids/upl/img_large /fo/uplvids/upl/vids
/fo/uplvids/scr/mkmontage2.sh




#for i in *
#	 do /fo/uplvids/scr/rar m -r- -m0 -v695000000b -sm700000000 -ximg -xinf -xrars "/fo/uplvids/upl/rars/$i" "$i";
#done
#
#mv /fo/uplvids/upl/rars/* /fo/uplvids/upl/vids/
