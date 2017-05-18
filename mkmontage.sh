#!/bin/bash

src_dir=/fo/uplvids/upl/img_large
dest_dir=/fo/uplvids/upl/img_montage

step=9

rm $src_dir/*_s.jpg
rm $dest_dir/*

images=($(ls $src_dir))

temp=$dest_dir/temp

cd $src_dir

for(( i=0; i<${#images[@]}; i+=$step ))
do
	bigImage1=${images[$((i))]}
	bigImage2=${images[$((i+3))]}
	bigImage3=${images[$((i+6))]}

	smallImage1=${images[$((i+1))]}
	smallImage2=${images[$((i+2))]}
	smallImage3=${images[$((i+4))]}
	smallImage4=${images[$((i+5))]}
	smallImage5=${images[$((i+7))]}
	smallImage6=${images[$((i+8))]}

	

	width1=$( convert "$bigImage1[x400]" +repage miff:- | identify -ping -format %w - )
	width2=$( convert "$smallImage1[x200]" +repage miff:- | identify -ping -format %w - )
	cropWidth=$(($width1 + $width2))

	echo -e $cropWidth"\n\n"

	convert -verbose -bordercolor white '(' \
		'(' "$bigImage1[x400]" -border 1x1 '(' "$smallImage1[x200]" "$smallImage2[x200]" -border 1x1 -append ')' +append ')' \
		'(' '(' "$smallImage3[x250]" "$smallImage4[x250]" -border 1x1 -append  ')' "$bigImage2[x500]" -border 1x1 +append ')' -append  ')' \
		'(' "$bigImage3[x400]" -border 1x1 '(' "$smallImage5[x200]" "$smallImage6[x200]" -border 1x1 -append ')' +append ')' -append -crop $cropWidth"x0+0+0" \
		$dest_dir/$bigImage1
done



