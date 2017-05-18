#!/bin/bash

src_dir=/fo/uplvids/upl/img_large
dest_dir=/fo/uplvids/upl/img_montage
logo=/fo/uplvids/upl/logo.png

step=8

rm $src_dir/*_s.jpg
rm $dest_dir/*

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

	dist=2

	sm_img_w=270
	sm_img_h=$( convert $img1[$sm_img_w'x'] +repage miff:- | identify -ping -format %h - )

	big_img_h=$((sm_img_h + dist +sm_img_h))
	big_img_w=$( convert $img1[x$big_img_h] +repage miff:- | identify -ping -format %w - )


	page_w=$((dist + big_img_w + dist + sm_img_w + dist))

	med_img_w=$((page_w - dist - dist - dist))
	med_img_w=$((med_img_w / 2))
	med_img_h=$( convert $img1[$med_img_w'x'] +repage miff:- | identify -ping -format %h - )

	page_h=$((dist + big_img_h + dist + med_img_h + dist + big_img_h + dist))

	#1
	row1_img1_x=$dist
	row1_img1_y=$dist
	
	row1_img2_x=$((dist + big_img_w + dist))
	row1_img2_y=$row1_img1_y

	row1_img3_x=$row1_img2_x
	row1_img3_y=$((dist + sm_img_h + dist))

	#2
	row2_img1_x=$row1_img1_x
	row2_img1_y=$((row1_img1_y + big_img_h + dist))
	
	row2_img2_x=$((row2_img1_x + med_img_w + dist))
	row2_img2_y=$row2_img1_y

	#3
	row3_img1_x=$row1_img1_x
	row3_img1_y=$((row2_img1_y + med_img_h + dist))
	
	row3_img2_x=$row1_img1_x
	row3_img2_y=$((row3_img1_y + dist + sm_img_h))

	row3_img3_x=$((row3_img1_x + dist + sm_img_w))
	row3_img3_y=$row3_img1_y

	convert -verbose -size $page_w'x'$page_h xc:none \
		-page +$row1_img1_x+$row1_img1_y	$img3['x'$big_img_h] \
		-page +$row1_img2_x+$row1_img2_y	$img2['x'$sm_img_h] \
		-page +$row1_img3_x+$row1_img3_y	$img1['x'$sm_img_h] \
		-page +$row2_img1_x+$row2_img1_y	$img4['x'$med_img_h] \
		-page +$row2_img2_x+$row2_img2_y	$img5['x'$med_img_h] \
		-page +$row3_img1_x+$row3_img1_y	$img8['x'$sm_img_h] \
		-page +$row3_img2_x+$row3_img2_y	$img7['x'$sm_img_h] \
		-page +$row3_img3_x+$row3_img3_y	$img6['x'$big_img_h] \
		-background "#AAFFCC" -layers merge +repage $dest_dir/s_c_r_$img1-$i-shad.jpg

done



