#!/bin/sh

# Root directory.
BASEDIR=$( cd `dirname $0`/../.. ; pwd )
cd "$BASEDIR"

find vendor -type d -name .git_ -print | while read dir ; do mv -v "${dir}" "${dir%/*}/.git" ; done
