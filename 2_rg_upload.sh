#!/bin/bash
find /arc/complete/ -type f -exec mv {} /arc/vids/ \;
rm /arc/vids/*.jpg
rm /arc/vids/*.png
rm /arc/vids/*.txt
rm /arc/vids/*.pdf
rm /arc/vids/*.bmp
rm /arc/vids/*.tif
rm /arc/vids/*.tiff
rm /arc/vids/*.gif
rm /arc/vids/*.Jpg
rm /arc/vids/*.jPg
rm /arc/vids/*.jpG
rm /arc/vids/*.jpeg
rm /arc/vids/*.jPG
rm /arc/vids/*.JPg
rm /arc/vids/*.Jpeg
rm /arc/vids/*.JPEG
rm /arc/vids/*.rar
rm /arc/vids/*.Rar
rm /arc/vids/*.RAR
rm /arc/vids/*.zip
rm /arc/vids/*.Zip
rm /arc/vids/*.ZIP
rm /arc/vids/*.JPG

php -f /arc/scr/movren.php
mkscreen_pimp.sh

php -f /arc/scr/imagebam2.php

for i in /arc/upl/vids/*
	do
		curl -v -T "$i" -u biz78ex@gmail.com:Crpmkj7H ftp://ftp.rapidgator.net
	done
#uploadftp2.sh
#
