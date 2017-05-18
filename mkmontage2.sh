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

	dist=2

	big_img_h=300
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

	#Top image 
	top_img_w=$((big_img_w + dist + small_img_w))
	top_img_h=$( convert $img1[$top_img_w"x"] +repage miff:- | identify -ping -format %h - )
	top_img_x=$dist
	top_img_y=$dist

	# Second row
	row2_img1_x=$dist
	row2_img1_y=$(($dist + big_img_h + dist))

	row2_img2_x=$((dist + med1_img_w + dist))
	row2_img2_y=$((dist + big_img_h + dist))

	row2_img3_x=$((row2_img2_x + med1_img_w + dist))
	row2_img3_y=$((dist + big_img_h + dist))

	#Third row
	row3_img1_x=$dist
	row3_img1_y=$((row2_img1_y + med1_img_h + dist))

	row3_img2_x=$dist
	row3_img2_y=$((row3_img1_y + small_img_h + dist))
	
	row3_img3_x=$((dist + small_img_w + dist))
	row3_img3_y=$row3_img1_y

	#Fourth row
	row4_img1_x=$dist
	row4_img1_y=$((row3_img2_y + small_img_h + dist))

	row4_img2_x=$((dist + med1_img_w + dist))
	row4_img2_y=$row4_img1_y

	row4_img3_x=$((row4_img2_x + med1_img_w + dist))
	row4_img3_y=$row4_img1_y

	#Fifth row
	row5_img1_x=$dist
	row5_img1_y=$((row4_img1_y + med1_img_h + dist))

	row5_img2_x=$((dist + big_img_w +dist))
	row5_img2_y=$row5_img1_y

	row5_img3_x=$row5_img2_x
	row5_img3_y=$((row5_img2_y + small_img_h + dist))

	# Page height
	page_h=$((dist + big_img_h + dist + med1_img_h + small_img_h + small_img_h + med1_img_h + big_img_h + dist))

	#Logo
	logo_h=$((big_img_h / 6))
	logo_x=$((dist  ))
	logo_y=$(( page_h - logo_h ))

	convert -verbose -size $page_w'x'$page_h xc:none \
		-page +$row1_img1_x+$row1_img1_y	$img1[x$big_img_h] \
		-page +$row1_img2_x+$row1_img2_y	$img3[x$small_img_h] \
		-page +$row1_img3_x+$row1_img3_y 	$img5[x$small_img_h] \
		-page +$row2_img1_x+$row2_img1_y 	$img7[x$med1_img_h] \
		-page +$row2_img2_x+$row2_img2_y 	$img9[x$med1_img_h] \
		-page +$row2_img3_x+$row2_img3_y 	$img11[x$med1_img_h] \
		-page +$row3_img1_x+$row3_img1_y	$img13[x$small_img_h] \
		-page +$row3_img2_x+$row3_img2_y	$img15[x$small_img_h] \
		-page +$row3_img3_x+$row3_img3_y	$img17[x$big_img_h] \
		-page +$row4_img1_x+$row4_img1_y 	$img19[x$med1_img_h] \
		-page +$row4_img2_x+$row4_img2_y 	$img21[x$med1_img_h] \
		-page +$row4_img3_x+$row4_img3_y 	$img23[x$med1_img_h] \
		-page +$row5_img1_x+$row5_img1_y 	$img25[x$big_img_h] \
		-page +$row5_img2_x+$row5_img2_y 	$img27[x$small_img_h] \
		-page +$row5_img3_x+$row5_img3_y 	$img29[x$small_img_h] \
		-page +$logo_x+$logo_y $logo[x$logo_h] \
		-background "#BBBBBB" -layers flatten $dest_dir/s_c_r_$img1-$i-shad.jpg 

#	convert $dest_dir/$img1-$i-screen.png \
#		\( +clone -background black -shadow 40x2+3+3 \) +swap \
#		-background "#FFFFFF" -layers merge +repage $dest_dir/s_c_r_$img1-$i-shad.jpg
#
#	rm $dest_dir/$img1-$i-screen.png
#
#
#
#	convert -verbose -size $page_w'x'$page_h xc:none \
#		-page +$row1_img1_x+$row1_img1_y	$img2[x$big_img_h] \
#		-page +$row1_img2_x+$row1_img2_y	$img4[x$small_img_h] \
#		-page +$row1_img3_x+$row1_img3_y 	$img6[x$small_img_h] \
#		-page +$row2_img1_x+$row2_img1_y 	$img8[x$med1_img_h] \
#		-page +$row2_img2_x+$row2_img2_y 	$img10[x$med1_img_h] \
#		-page +$row2_img3_x+$row2_img3_y 	$img12[x$med1_img_h] \
#		-page +$row3_img1_x+$row3_img1_y	$img14[x$small_img_h] \
#		-page +$row3_img2_x+$row3_img2_y	$img16[x$small_img_h] \
#		-page +$row3_img3_x+$row3_img3_y	$img18[x$big_img_h] \
#		-page +$row4_img1_x+$row4_img1_y 	$img20[x$med1_img_h] \
#		-page +$row4_img2_x+$row4_img2_y 	$img22[x$med1_img_h] \
#		-page +$row4_img3_x+$row4_img3_y 	$img24[x$med1_img_h] \
#		-page +$row5_img1_x+$row5_img1_y 	$img26[x$big_img_h] \
#		-page +$row5_img2_x+$row5_img2_y 	$img28[x$small_img_h] \
#		-page +$row5_img3_x+$row5_img3_y 	$img30[x$small_img_h] \
#		-page +$logo_x+$logo_y $logo[x$logo_h] \
#		-background none -layers flatten $dest_dir_2/$img1-$i-screen.png 
#
#	convert $dest_dir_2/$img1-$i-screen.png \
#		\( +clone -background black -shadow 40x2+3+3 \) +swap \
#		-background "#FFFFFF" -layers merge +repage $dest_dir_2/s_c_r_$img1-$i-shad.jpg
#
#	rm $dest_dir_2/$img1-$i-screen.png

done



