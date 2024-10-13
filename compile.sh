#!/bin/sh
path=`dirname "$0"`
echo "$path"
cd $path

#cd dirname
##git clone git://git.code.sf.net/p/adminer/git
#cd git
#git pull origin master

#rm -f adminer-*.php

#git clone https://github.com/pematon/adminer.git
git clone https://github.com/mjohndus/adminer.git
cd adminer
rm -f adminer-*.php
php compile.php de
#version="1"
#echo "$version"
#cd ..;
#cp git/adminer-*.php adminer.php;
#git add adminer.php;
#version=`cat < /tmp/adminer/adminer/include/version.inc.php | grep VERSION`
version=`cat < adminer/include/version.inc.php | grep VERSION`
echo "$version compiled"
date=`date +'%Y-%m-%d %H:%M'`
message="$date $version"
echo "$message"
#git commit -m "$message"
#git push origin master
