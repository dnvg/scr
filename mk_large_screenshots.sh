#!/bin/bash

rm /fo/uplvids/upl/img_montage_large/*

videos=( $(ls /fo/uplvids/upl/vids) )
output_folder=/fo/uplvids/upl/img_montage_large/

time=1
fps=1
size=600x

for f in ${videos[*]}
do
	input=/fo/uplvids/upl/vids/$f	

	#dur=$(ffprobe -i $input -show_entries format=duration -v quiet -of cs="p=0" 2>&1 )
	dur=$(mediainfo --Inform="Video;%Duration%"  $input)
	step=$((dur/8000))
	
	pos1=$((step + 25))
	pos2=$((step * 2))	
	pos3=$((step * 3))	
	pos4=$((step * 4))	
	pos5=$((step * 5))	
	pos6=$((step * 6))	
	pos7=$((step * 7))	
	pos8=$((step * 8 - 25))	
	
	avconv -ss $pos1  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0001.jpg
	avconv -ss $pos2  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0002.jpg
	avconv -ss $pos3  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0003.jpg
	avconv -ss $pos4  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0004.jpg
	avconv -ss $pos5  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0005.jpg
	avconv -ss $pos6  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0006.jpg
	avconv -ss $pos7  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0007.jpg
	avconv -ss $pos8  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0008.jpg
done
