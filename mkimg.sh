#!/bin/bash

rm /fo/uplvids/upl/img_gif/*

videos=( $(ls /fo/uplvids/upl/vids) )
output_folder=/fo/uplvids/upl/img_gif/

time=4
fps=6
size=400x280

for f in ${videos[*]}
do
	input=/fo/uplvids/upl/vids/$f	

	#dur=$(ffprobe -i $input -show_entries format=duration -v quiet -of cs="p=0" 2>&1 )
	dur=$(mediainfo --Inform="Video;%Duration%"  $input)
	step=$((dur/2000))
	
	pos1=$((step - 10))	
	pos2=$((step + step - 10))	
	pos3=$((step + step + step - 60))	
	
	avconv -ss $step  -i $input -t $time -r $fps -vsync 1 -s $size $output_folder$f-part1-%03d.jpg
	#avconv -ss $pos2 -i $input -t $time -r $fps -vsync 1 -s $size $output_folder$f-part2-%03d.jpg 
	#avconv -ss $pos3 -i $input -t $time -r $fps -vsync 1 -s $size $output_folder$f-part3-%03d.jpg 
done
