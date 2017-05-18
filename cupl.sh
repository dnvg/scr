#!/bin/bash
for i in /arc/upl/vids/*
do
curl -v -T "$i" ftp://user1060_RAvo:yWrHf605@ftp.keep2share.cc
done
