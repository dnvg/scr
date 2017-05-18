mediainfo --Inform="file:///arc/scr/template.txt" /arc/upl/vids/* > /arc/upl/inf/filesinfo.txt

cd /arc/upl/img_small
rm *
rm ./watermarked/*


mtn -i -t -c 3 -r 12 -O /arc/upl/img_small /arc/upl/vids


for image in *
do
	convert "$image" -resize 600 "$image"
done


for image in *
do
	composite -dissolve 70% -gravity northwest -quality 100 ~/jdl-watermark.png "$image" ../watermarked/"$image"
done

for image in ../watermarked/*
do
	composite -dissolve 70% -gravity southeast -quality 100 ~/jdl-watermark.png "$image" "$image"
done

cd /arc/upl/vids/

for i in *
	 do rar a -r- -m0 -v495000000b -sm500000000 -ximg -xinf -xrars "/arc/upl/rars/$i" "$i";
	 #do rar a -r- -m0 -v295000000b -sm300000000 -ximg -xinf -xrars "/arc/upl/rars/$i" "$i"

done

mv /arc/upl/rars/* /arc/upl/vids/
