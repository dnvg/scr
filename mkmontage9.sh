#!/bin/bash

src_dir=/fo/uplvids/upl/img_montage_small
dest_dir=/fo/uplvids/upl/img_small
logo=/fo/uplvids/upl/logo.png

step=36

#rm $src_dir/*_s.jpg
rm $dest_dir/*
#rm $dest_dir_2/*

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
	img31=${images[$((i+30))]}
	img32=${images[$((i+31))]}
	img33=${images[$((i+32))]}
	img34=${images[$((i+33))]}
	img35=${images[$((i+34))]}
	img36=${images[$((i+35))]}
	img37=${images[$((i+36))]}
	img38=${images[$((i+37))]}
	img39=${images[$((i+38))]}
	img40=${images[$((i+39))]}
                            

	dist=1

	big_img_w=610
	big_img_h=$( convert $img1[$big_img_w'x'] +repage miff:- | identify -ping -format %h - )


	crop_h=$((big_img_h / 8))
	crop_h=$((crop_h * 7))


	small_img_w=$(( $(($big_img_w / 2)) - $(($dist / 2)) ))
	small_img_h=$( convert $img1[$small_img_w'x'] +repage miff:- | identify -ping -format %h - )


	# First row
	row1_img1_x=$dist
	row1_img1_y=$dist

	row1_img2_x=$((dist * 2 + small_img_w))
	row1_img2_y=$dist

	row1_img3_x=$((dist * 3 + small_img_w * 2))
	row1_img3_y=$dist

	row1_img4_x=$((dist * 4 + small_img_w * 3))
	row1_img4_y=$dist

	# Second row
	row2_img1_x=$dist
	row2_img1_y=$((dist * 2 + small_img_h))

	row2_img2_x=$((dist * 2 + small_img_w))
	row2_img2_y=$((dist * 2 + small_img_h))

	row2_img3_x=$((dist * 3 + small_img_w * 2))
	row2_img3_y=$((dist * 2 + small_img_h))

	row2_img4_x=$((dist * 4 + small_img_w * 3))
	row2_img4_y=$((dist * 2 + small_img_h))


	# Third row
	row3_img1_x=$dist
	row3_img1_y=$((dist * 3 + small_img_h * 2))

	row3_img2_x=$((dist * 2 + small_img_w))
	row3_img2_y=$((dist * 3 + small_img_h * 2))

	row3_img3_x=$((dist * 3 + small_img_w * 2))
	row3_img3_y=$((dist * 3 + small_img_h * 2))

	row3_img4_x=$((dist * 4 + small_img_w * 3))
	row3_img4_y=$((dist * 3 + small_img_h * 2))

	# Fourth row
	row4_img1_x=$dist
	row4_img1_y=$((dist * 4 + small_img_h * 3))

	row4_img2_x=$((dist * 2 + small_img_w))
	row4_img2_y=$((dist * 4 + small_img_h * 3))

	row4_img3_x=$((dist * 3 + small_img_w * 2))
	row4_img3_y=$((dist * 4 + small_img_h * 3))

	row4_img4_x=$((dist * 4 + small_img_w * 3))
	row4_img4_y=$((dist * 4 + small_img_h * 3))

	# Fifth row
	row5_img1_x=$dist
	row5_img1_y=$((dist * 5 + small_img_h * 4))

	row5_img2_x=$((dist * 2 + small_img_w))
	row5_img2_y=$((dist * 5 + small_img_h * 4))

	row5_img3_x=$((dist * 3 + small_img_w * 2))
	row5_img3_y=$((dist * 5 + small_img_h * 4))

	row5_img4_x=$((dist * 4 + small_img_w * 3))
	row5_img4_y=$((dist * 5 + small_img_h * 4))

	# Sixth row
	row6_img1_x=$dist
	row6_img1_y=$((dist * 6 + small_img_h * 5))

	row6_img2_x=$((dist * 2 + small_img_w))
	row6_img2_y=$((dist * 6 + small_img_h * 5))

	row6_img3_x=$((dist * 3 + small_img_w * 2))
	row6_img3_y=$((dist * 6 + small_img_h * 5))

	row6_img4_x=$((dist * 4 + small_img_w * 3))
	row6_img4_y=$((dist * 6 + small_img_h * 5))


	# Seventh row
	row7_img1_x=$dist
	row7_img1_y=$((dist * 7 + small_img_h * 6))

	row7_img2_x=$((dist * 2 + small_img_w))
	row7_img2_y=$((dist * 7 + small_img_h * 6))

	row7_img3_x=$((dist * 3 + small_img_w * 2))
	row7_img3_y=$((dist * 7 + small_img_h * 6))

	row7_img4_x=$((dist * 4 + small_img_w * 3))
	row7_img4_y=$((dist * 7 + small_img_h * 6))

	# Eigths row
	row8_img1_x=$dist
	row8_img1_y=$((dist * 8 + small_img_h * 7))

	row8_img2_x=$((dist * 2 + small_img_w))
	row8_img2_y=$((dist * 8 + small_img_h * 7))

	row8_img3_x=$((dist * 3 + small_img_w * 2))
	row8_img3_y=$((dist * 8 + small_img_h * 7))

	row8_img4_x=$((dist * 4 + small_img_w * 3))
	row8_img4_y=$((dist * 8 + small_img_h * 7))

	# Nineth row
	row9_img1_x=$dist
	row9_img1_y=$((dist * 9 + small_img_h * 8))

	row9_img2_x=$((dist * 2 + small_img_w))
	row9_img2_y=$((dist * 9 + small_img_h * 8))

	row9_img3_x=$((dist * 3 + small_img_w * 2))
	row9_img3_y=$((dist * 9 + small_img_h * 8))

	row9_img4_x=$((dist * 4 + small_img_w * 3))
	row9_img4_y=$((dist * 9 + small_img_h * 8))


	# Page width
	page_w=$(( dist * 4 + small_img_w * 4 ))

	# Page height
	page_h=$((dist * 9 + small_img_h * 9))

	#Logo
	logo_h=$((big_img_h / 18))
	logo_x=$((dist + 10 ))
	logo_y=$(( crop_h - logo_h - 5 ))


	convert -verbose -size $page_w'x'$page_h xc:none \
		-page +$row1_img1_x+$row1_img1_y	$img1[x$small_img_h] \
		-page +$row1_img2_x+$row1_img2_y	$img2[x$small_img_h] \
		-page +$row1_img3_x+$row1_img3_y	$img3[x$small_img_h] \
		-page +$row1_img4_x+$row1_img4_y	$img4[x$small_img_h] \
		-page +$row2_img1_x+$row2_img1_y	$img5[x$small_img_h] \
		-page +$row2_img2_x+$row2_img2_y	$img6[x$small_img_h] \
		-page +$row2_img3_x+$row2_img3_y	$img7[x$small_img_h] \
		-page +$row2_img4_x+$row2_img4_y	$img8[x$small_img_h] \
		-page +$row3_img1_x+$row3_img1_y	$img9[x$small_img_h] \
		-page +$row3_img2_x+$row3_img2_y	$img10[x$small_img_h] \
		-page +$row3_img3_x+$row3_img3_y	$img11[x$small_img_h] \
		-page +$row3_img4_x+$row3_img4_y	$img12[x$small_img_h] \
		-page +$row4_img1_x+$row4_img1_y	$img13[x$small_img_h] \
		-page +$row4_img2_x+$row4_img2_y	$img14[x$small_img_h] \
		-page +$row4_img3_x+$row4_img3_y	$img15[x$small_img_h] \
		-page +$row4_img4_x+$row4_img4_y	$img16[x$small_img_h] \
		-page +$row5_img1_x+$row5_img1_y	$img17[x$small_img_h] \
		-page +$row5_img2_x+$row5_img2_y	$img18[x$small_img_h] \
		-page +$row5_img3_x+$row5_img3_y	$img19[x$small_img_h] \
		-page +$row5_img4_x+$row5_img4_y	$img20[x$small_img_h] \
		-page +$row6_img1_x+$row6_img1_y	$img21[x$small_img_h] \
		-page +$row6_img2_x+$row6_img2_y	$img22[x$small_img_h] \
		-page +$row6_img3_x+$row6_img3_y	$img23[x$small_img_h] \
		-page +$row6_img4_x+$row6_img4_y	$img24[x$small_img_h] \
		-page +$row7_img1_x+$row7_img1_y	$img25[x$small_img_h] \
		-page +$row7_img2_x+$row7_img2_y	$img26[x$small_img_h] \
		-page +$row7_img3_x+$row7_img3_y	$img27[x$small_img_h] \
		-page +$row7_img4_x+$row7_img4_y	$img28[x$small_img_h] \
		-page +$row8_img1_x+$row8_img1_y	$img29[x$small_img_h] \
		-page +$row8_img2_x+$row8_img2_y	$img30[x$small_img_h] \
		-page +$row8_img3_x+$row8_img3_y	$img31[x$small_img_h] \
		-page +$row8_img4_x+$row8_img4_y	$img32[x$small_img_h] \
		-page +$row9_img1_x+$row9_img1_y	$img33[x$small_img_h] \
		-page +$row9_img2_x+$row9_img2_y	$img34[x$small_img_h] \
		-page +$row9_img3_x+$row9_img3_y	$img35[x$small_img_h] \
		-page +$row9_img4_x+$row9_img4_y	$img36[x$small_img_h] \
		-background none -layers flatten $dest_dir/$img1-$i-screen.jpg

done



