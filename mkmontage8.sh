#!/bin/bash

src_dir=/fo/uplvids/upl/img_montage_large
dest_dir=/fo/uplvids/upl/img_large
logo=/fo/uplvids/upl/logo.png

step=8

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

	big_img_w=800
	big_img_h=$( convert $img1[$big_img_w'x'] +repage miff:- | identify -ping -format %h - )


	crop_h=$((big_img_h / 8))
	crop_h=$((crop_h * 7))


	small_img_w=$(( $(($big_img_w / 2)) - $(($dist / 2)) ))
	small_img_h=$( convert $img1[$small_img_w'x'] +repage miff:- | identify -ping -format %h - )


	# First row
	row1_img1_x=$dist
	row1_img1_y=$dist

	# Page width
	page_w=$(( dist + big_img_w + dist ))

	#Second row
	row2_img1_x=$dist
	row2_img1_y=$((dist + crop_h + dist))
	row2_img2_x=$((dist + small_img_w + dist))
	row2_img2_y=$row2_img1_y

	#Third row
	row3_img1_x=$dist
	row3_img1_y=$((dist + crop_h + dist + small_img_h + dist))
	row3_img2_x=$((dist + small_img_w + dist))
	row3_img2_y=$row3_img1_y

	#Fourth row
	row4_img1_x=$dist
	row4_img1_y=$((dist + crop_h + dist + small_img_h + dist + small_img_h + dist))
	row4_img2_x=$((dist + small_img_w + dist))
	row4_img2_y=$row4_img1_y

	#Fifth row
	row5_img1_x=$dist
	row5_img1_y=$((dist + crop_h + dist + small_img_h + dist + small_img_h + dist + small_img_h + dist))
	row5_img2_x=$((dist + small_img_w + dist))
	row5_img2_y=$row5_img1_y

	# Page height
	page_h=$((dist + crop_h + dist + small_img_h + dist + small_img_h + dist + small_img_h + dist + small_img_h + dist))

	#Logo
	logo_h=$((big_img_h / 18))
	logo_x=$((dist + 10 ))
	logo_y=$(( crop_h - logo_h - 5 ))


	convert $img3[x$big_img_h] -gravity Center -crop $big_img_w'x'$crop_h+0+0 +repage miff:- | \
	convert -verbose -size $page_w'x'$page_h xc:none \
		-page +$row1_img1_x+$row1_img1_y	- \
		-page +$row2_img1_x+$row2_img1_y	$img1[x$small_img_h] \
		-page +$row2_img2_x+$row2_img2_y	$img2[x$small_img_h] \
		-page +$row3_img1_x+$row3_img1_y	$img3[x$small_img_h] \
		-page +$row3_img2_x+$row3_img2_y	$img4[x$small_img_h] \
		-page +$row4_img1_x+$row4_img1_y	$img5[x$small_img_h] \
		-page +$row4_img2_x+$row4_img2_y	$img6[x$small_img_h] \
		-page +$row5_img1_x+$row5_img1_y	$img7[x$small_img_h] \
		-page +$row5_img2_x+$row5_img2_y	$img8[x$small_img_h] \
		-page +$logo_x+$logo_y $logo[x$logo_h] \
		-background none -layers flatten $dest_dir/$img1-$i-screen.jpg


#	convert $img3[x$big_img_h] -gravity Center -crop $big_img_w'x'$crop_h+0+0 +repage miff:- | \
#	convert -verbose -size $page_w'x'$page_h xc:none \
#		-page +$row1_img1_x+$row1_img1_y	- \
#		-page +$row2_img1_x+$row2_img1_y	$img1[x$small_img_h] \
#		-page +$row2_img2_x+$row2_img2_y	$img2[x$small_img_h] \
#		-page +$row3_img1_x+$row3_img1_y	$img4[x$small_img_h] \
#		-page +$row3_img2_x+$row3_img2_y	$img5[x$small_img_h] \
#		-page +$row4_img1_x+$row4_img1_y	$img7[x$small_img_h] \
#		-page +$row4_img2_x+$row4_img2_y	$img8[x$small_img_h] \
#		-page +$logo_x+$logo_y $logo[x$logo_h] \
#		-background none -layers flatten $dest_dir/$img1-$i-screen.png
#
#	convert $img6[x$big_img_h] -gravity Center -crop $big_img_w'x'$crop_h+0+0 +repage miff:- | \
#	convert $dest_dir/$img1-$i-screen.png \
#		-page +0+$page_h - \
#		-background "#FFFFFF" -layers merge +repage $dest_dir/s_c_r_$img1-$i-shad.jpg
#
#	rm $dest_dir/$img1-$i-screen.png



	#convert $img13[x$big_img_h] -gravity Center -crop $big_img_w'x'$crop_h+0+0 +repage miff:- | \
	#convert -verbose -size $page_w'x'$page_h xc:none \
	#	-page +$row1_img1_x+$row1_img1_y	- \
	#	-page +$row2_img1_x+$row2_img1_y	$img5[x$small_img_h] \
	#	-page +$row2_img2_x+$row2_img2_y	$img10[x$small_img_h] \
	#	-page +$row3_img1_x+$row3_img1_y	$img12[x$small_img_h] \
	#	-page +$row3_img2_x+$row3_img2_y	$img15[x$small_img_h] \
	#	-page +$row4_img1_x+$row4_img1_y	$img20[x$small_img_h] \
	#	-page +$row4_img2_x+$row4_img2_y	$img25[x$small_img_h] \
	#	-page +$logo_x+$logo_y $logo[x$logo_h] \
	#	-background none -layers flatten $dest_dir_2/$img1-$i-screen.png

	#convert $img21[x$big_img_h] -gravity Center -crop $big_img_w'x'$crop_h+0+0 +repage miff:- | \
	#convert $dest_dir_2/$img1-$i-screen.png \
	#	-page +0+$page_h - \
	#	-background "#FFFFFF" -layers merge +repage $dest_dir_2/s_c_r_$img1-$i-shad.jpg

	#rm $dest_dir_2/$img1-$i-screen.png

done



