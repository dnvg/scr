#!/bin/bash

# Clean destination gif folder
rm /fo/uplvids/upl/gif/*

# Set image source folder
gif_dir=/fo/uplvids/upl/img_gif

# Read source folder do bash array
img_arr=( $(ls $gif_dir) )

# Set number of frames in resulting *.gif file
frames=24

cd $gif_dir
#
# Loop through images and create gifs
#
for (( i=0; i<${#img_arr[@]}; i+=$frames ))
do
	# Set current gif name
	gif_name=/fo/uplvids/upl/gif/g_i_f_${img_arr[$i]}.gif

	printf "Saving to: %s\n" $gif_name

	# Save gif
	#convert  -resize 330x195 -delay 20 -loop 0 "${img_arr[@]:$i:$frames}" $gif_name
	convert  -delay 15 -loop 0 "${img_arr[@]:$i:$frames}" -crop 300x210+12+0 +repage $gif_name
	
	# Optimize gif file size
	gifsicle -b -O3 --lossy=13 --colors 256  $gif_name
	#gifsicle -b -O3 $gif_name
done


