#!/bin/bash
#forget.sh
rm -r /arc/complete/*
rm -r /arc/incomplete/*
rm -r /arc/watch/*
rm -r /arc/tor/*
rm -r /arc/upl/vids/*
rm -r /arc/upl/vids2/*
rm -r /arc/upl/vids3/*
rm -r /arc/upl/img/*
rm -r /arc/upl/img_large/*
rm -r /arc/upl/img_small/*
#flexget database reset --sure
#flexget execute --dump
#php -f /arc/scr/copy2watch.php
