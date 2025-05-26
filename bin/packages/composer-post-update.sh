#!/bin/sh

# Root directory.
BASEDIR=$( cd `dirname $0`/../.. ; pwd )
cd "$BASEDIR"

find vendor -type d -name .git -print | while read dir ; do mv -v "${dir}" "${dir}_" ; done

rm -rf vendor/vrana/jsshrink/tests
rm -rf vendor/vrana/phpshrink/tests
