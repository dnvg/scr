#!/bin/bash

rm /fo/uplvids/upl/img_montage_small/*

videos=( $(ls /fo/uplvids/upl/vids) )
output_folder=/fo/uplvids/upl/img_montage_small/

time=1
fps=1
size=600x

for f in ${videos[*]}
do
	input=/fo/uplvids/upl/vids/$f	

	#dur=$(ffprobe -i $input -show_entries format=duration -v quiet -of cs="p=0" 2>&1 )
	dur=$(mediainfo --Inform="Video;%Duration%"  $input)
	step=$((dur/36000))
	
	pos1=$((step))
	pos2=$((step * 2))	
	pos3=$((step * 3))	
	pos4=$((step * 4))	
	pos5=$((step * 5))	
	pos6=$((step * 6))	
	pos7=$((step * 7))	
	pos8=$((step * 8))	
	pos9=$((step * 9))	
	pos10=$((step * 10))	
	pos11=$((step * 11))	
	pos12=$((step * 12))	
	pos13=$((step * 13))	
	pos14=$((step * 14))	
	pos15=$((step * 15))	
	pos16=$((step * 16))	
	pos17=$((step * 17))	
	pos18=$((step * 18))	
	pos19=$((step * 19))	
	pos20=$((step * 20))	
	pos21=$((step * 21))	
	pos22=$((step * 22))	
	pos23=$((step * 23))	
	pos24=$((step * 24))	
	pos25=$((step * 25))	
	pos26=$((step * 26))	
	pos27=$((step * 27))	
	pos28=$((step * 28))	
	pos29=$((step * 29))	
	pos30=$((step * 30))	
	pos31=$((step * 31))	
	pos32=$((step * 32))	
	pos33=$((step * 33))	
	pos34=$((step * 34))	
	pos35=$((step * 35))	
	pos36=$((step * 36))	
	   
	avconv -ss $pos1  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0001.jpg
	avconv -ss $pos2  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0002.jpg
	avconv -ss $pos3  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0003.jpg
	avconv -ss $pos4  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0004.jpg
	avconv -ss $pos5  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0005.jpg
	avconv -ss $pos6  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0006.jpg
	avconv -ss $pos7  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0007.jpg
	avconv -ss $pos8  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0008.jpg
	avconv -ss $pos9  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0009.jpg
	avconv -ss $pos10  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0010.jpg
	avconv -ss $pos11  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0011.jpg
	avconv -ss $pos12  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0012.jpg
	avconv -ss $pos13  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0013.jpg
	avconv -ss $pos14  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0014.jpg
	avconv -ss $pos15  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0015.jpg
	avconv -ss $pos16  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0016.jpg
	avconv -ss $pos17  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0017.jpg
	avconv -ss $pos18  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0018.jpg
	avconv -ss $pos19  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0019.jpg
	avconv -ss $pos20  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0020.jpg
	avconv -ss $pos21  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0021.jpg
	avconv -ss $pos22  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0022.jpg
	avconv -ss $pos23  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0023.jpg
	avconv -ss $pos24  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0024.jpg
	avconv -ss $pos25  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0025.jpg
	avconv -ss $pos26  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0026.jpg
	avconv -ss $pos27  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0027.jpg
	avconv -ss $pos28  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0028.jpg
	avconv -ss $pos29  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0029.jpg
	avconv -ss $pos30  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0030.jpg
	avconv -ss $pos31  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0031.jpg
	avconv -ss $pos32  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0032.jpg
	avconv -ss $pos33  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0033.jpg
	avconv -ss $pos34  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0034.jpg
	avconv -ss $pos35  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0035.jpg
	avconv -ss $pos36  -i $input -t $time -r $fps -vsync 1 $output_folder$f-0036.jpg
done
