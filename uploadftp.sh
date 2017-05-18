#!/bin/bash

while read line

 do
  
  UPL_DIR=$line
  
 done < /arc/scr/upldir

echo $UPL_DIR"<-------------"

CUR_TIME=`date +%F-%H-%M`

lftp -u saibay,15067812 ftp1.datafile.com<<END
#lftp -u biz78ex@gmail.com,Crpmkj7H ftp.rapidgator.net<<END

!echo "Hola! Starting upploading ;) relax & enjoy LFTP"

cd "$UPL_DIR"

mkdir $CUR_TIME

cd $CUR_TIME

lcd /arc/upl/vids

!echo "========================= UPLOADING THIS ==================================="
!ls
!echo "============================================================================"
!echo "========================= UPLOADING TO ==================================="
pwd
!echo "=========================================================================="

mirror -R -P 5 -v
bye
END
