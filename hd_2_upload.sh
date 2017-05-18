#!/bin/bash
#mv /torrents/Tushy/* /fo/uplvids/complete/
#
#find /fo/uplvids/complete/ -type f -exec mv {} /fo/uplvids/vids/ \;
#cd /fo/uplvids/vids
#rm *.jpg *.JPG *.Jpg *.jpeg *.Jpeg *.JPEG *.png *.rar *.Rar *.RAR *.zip *.ZIP *.txt *.pdf *.gif *.nfo *.txt
#
#php -f /fo/uplvids/scr/movren.php
#
###mediainfo
#cd /fo/uplvids/upl/vids/
#mediainfo --Inform=file:///fo/uplvids/scr/tmpl.txt --LogFile=/fo/uplvids/upl/inf/filesinfo.txt /fo/uplvids/upl/vids/*


rm /fo/uplvids/upl/img_large/*
/fo/uplvids/scr/mtn -b 2 -i -t -c 2 -r 4 -O /fo/uplvids/upl/img_large /fo/uplvids/upl/vids

#rm /fo/uplvids/upl/img_small/*
#/fo/uplvids/scr/mtn -b 2 -i -t -c 4 -r 12 -w 1024 -O /fo/uplvids/upl/img_small /fo/uplvids/upl/vids
#
#rm /fo/uplvids/upl/img_screen_1/*
#/fo/uplvids/scr/mtn -b 2 -i -I -t -c 3 -r 1 -O /fo/uplvids/upl/img_screen_1 /fo/uplvids/upl/vids
#
#cd /fo/uplvids/upl/img_large
#for i in *
#	do mv $i s_c_r_$i
#done
#
#cd /fo/uplvids/upl/img_small
#for i in *
#	do mv $i s_c_r_$i
#done
#
#cd /fo/uplvids/upl/img_screen_1
#for i in *
#	do mv $i s_c_r_$i
#done
##/fo/uplvids/scr/mkmontage8.sh
#
###gif
##/fo/uplvids/scr/mkimg.sh
##/fo/uplvids/scr/mkgif.sh
#
#
##archives
#cd /fo/uplvids/upl/vids
#for i in *
#	 do /fo/uplvids/scr/rar m -r- -m0 -v695000000b -sm700000000 -ximg -xinf -xrars "/fo/uplvids/upl/rars/$i" "$i";
#done
#
#mv /fo/uplvids/upl/rars/* /fo/uplvids/upl/vids/



#php -f /arc/scr/imagebam2.php
#
#for i in /arc/upl/vids/*
#do
#	curl -v -T "$i" ftp://user1060_FLih:DxPPRidU@ftp.keep2share.cc
#done
#uploadftp2.sh
#
