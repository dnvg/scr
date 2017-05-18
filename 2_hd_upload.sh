#!/bin/bash
#mv /torrents/inc/* /fo/uplvids/complete/
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
#
#/fo/uplvids/scr/mk_large_screenshots.sh
#/fo/uplvids/scr/mkmontage8.sh
#/fo/uplvids/scr/mk_small_screenshots.sh
#/fo/uplvids/scr/mkmontage9.sh


#cd /fo/uplvids/upl/img_large
#for i in *
#	do mv $i s_c_r_$i
#done
#
#cd /fo/uplvids/upl/img_small
#for i in *
#	do mv $i s_c_r_$i
#done

#archives
cd /fo/uplvids/upl/vids
for i in *
	 do /fo/uplvids/scr/rar m -r- -m0 -v695000000b -sm700000000 -ximg -xinf -xrars "/fo/uplvids/upl/rars/$i" "$i";
done

mv /fo/uplvids/upl/rars/* /fo/uplvids/upl/vids/

