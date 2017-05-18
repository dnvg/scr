#!/bin/bash

src_dir=/fo/uplvids/upl/img_large
dest_dir=/fo/uplvids/upl/img_montage
dest_dir_2=/fo/uplvids/upl/img_montage_2
logo=/fo/uplvids/upl/logo.png

step=30

rm $src_dir/*_s.jpg
rm $dest_dir/*
rm $dest_dir_2/*

images=($(ls $src_dir))

temp=$dest_dir/temp

cd $src_dir

for(( i=0; i<${#images[@]}; i+=$step ))
do

	img1=${images[$((i))]}
	img2=${images[$((i+1))]}
	img3=${images[$((i+2))]}
	img4=${images[$((i+3))]}
	img5=${images[$((i+4))]}
	img6=${images[$((i+5))]}
	img7=${images[$((i+6))]}
	img8=${images[$((i+7))]}
	img9=${images[$((i+8))]}
	img10=${images[$((i+9))]}
	img11=${images[$((i+10))]}
	img12=${images[$((i+11))]}
	img13=${images[$((i+12))]}
	img14=${images[$((i+13))]}
	img15=${images[$((i+14))]}
	img16=${images[$((i+15))]}
	img17=${images[$((i+16))]}
	img18=${images[$((i+17))]}
	img19=${images[$((i+18))]}
	img20=${images[$((i+19))]}
	img21=${images[$((i+20))]}
	img22=${images[$((i+21))]}
	img23=${images[$((i+22))]}
	img24=${images[$((i+23))]}
	img25=${images[$((i+24))]}
	img26=${images[$((i+25))]}
	img27=${images[$((i+26))]}
	img28=${images[$((i+27))]}
	img29=${images[$((i+28))]}
	img30=${images[$((i+29))]}

	dist=0

	big_img_h=400
	big_img_w=$( convert $img1[x$big_img_h] +repage miff:- | identify -ping -format %w - )

	small_img_h=$(( $(($big_img_h / 2)) - $(($dist / 2)) ))
	small_img_w=$( convert $img1[x$small_img_h] +repage miff:- | identify -ping -format %w - )

	med1_img_h=$((small_img_h + 1))
	med1_img_w=$( convert $img1[x$med1_img_h] +repage miff:- | identify -ping -format %w - )

	# First row
	row1_img1_x=$dist
	row1_img1_y=$dist

	row1_img2_x=$(($big_img_w + $dist * 2))
	row1_img2_y=$dist

	row1_img3_x=$(($big_img_w + $dist * 2))
	row1_img3_y=$(($small_img_h + $dist * 2))

	# Page width
	page_w=$(( dist + big_img_w + dist + small_img_w + dist ))

	#Third row
	row3_img1_x=$dist
	row3_img1_y=$((dist + big_img_h + dist))

	row3_img2_x=$dist
	row3_img2_y=$((row3_img1_y + small_img_h + dist))
	
	row3_img3_x=$((dist + small_img_w + dist))
	row3_img3_y=$row3_img1_y

	#Fifth row
	row5_img1_x=$dist
	row5_img1_y=$((dist + big_img_h + dist + big_img_h + dist))

	row5_img2_x=$((dist + big_img_w +dist))
	row5_img2_y=$row5_img1_y

	row5_img3_x=$row5_img2_x
	row5_img3_y=$((row5_img2_y + small_img_h + dist))

	# Page height
	page_h=$((dist + big_img_h + dist + big_img_h + dist + big_img_h + dist))

	#Logo
	logo_h=$((big_img_h / 9))
	logo_x=$((dist + 10 ))
	logo_y=$(( page_h - logo_h - 14 ))

	convert -verbose -size $page_w'x'$page_h xc:none \
		-page +$row1_img1_x+$row1_img1_y	$img4[x$big_img_h] \
		-page +$row1_img2_x+$row1_img2_y	$img7[x$small_img_h] \
		-page +$row1_img3_x+$row1_img3_y 	$img10[x$small_img_h] \
		-page +$row3_img1_x+$row3_img1_y	$img13[x$small_img_h] \
		-page +$row3_img2_x+$row3_img2_y	$img16[x$small_img_h] \
		-page +$row3_img3_x+$row3_img3_y	$img19[x$big_img_h] \
		-page +$row5_img1_x+$row5_img1_y 	$img22[x$big_img_h] \
		-page +$row5_img2_x+$row5_img2_y 	$img25[x$small_img_h] \
		-page +$row5_img3_x+$row5_img3_y 	$img27[x$small_img_h] \
		-page +$logo_x+$logo_y $logo[x$logo_h] \
		-background "#FFFFFF" -layers flatten $dest_dir/s_c_r_$img1-$i-shad.jpg #$img1-$i-screen.jpg

	#convert $dest_dir/$img1-$i-screen.png \
	#	\( +clone -background black -shadow 40x2+3+3 \) +swap \
	#	-background "#FFFFFF" -layers merge +repage $dest_dir/s_c_r_$img1-$i-shad.jpg

	#rm $dest_dir/$img1-$i-screen.png

done



