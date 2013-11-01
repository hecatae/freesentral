#!/usr/bin/perl

use strict;
use warnings;

my $verbose = @ARGV;

open CL, "< debian/changelog" or die;
my $firstline = <CL>;
$firstline =~/^.*?\([\d\.]+~vir(\d{10})\)/i or die;
my $lastrev = $1;
close CL;
print "Found last seen revision $lastrev\n";

my $upver;
open CF, "< version.php" or die;
while(<CF>) {
	chomp;
	if(/^\s*\$version\s*=\s*"([\d\.]+)"/) {
		$upver = $1;
		last;
	}
}
close CF;

my($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
my $suff = sprintf("%04d%02d%02d%02d", 1900+$year, 1+$mon, $mday, 1);

++$suff while $suff le $lastrev;

my $newver="$upver~vir$suff";
print "New version: $newver\n";
my $rc = system qw( debchange -b --preserve --distribution UNRELEASED --release-heuristic log --newversion ), "$newver";
if($rc == 0) {
#	exec "git commit -m 'New debian package $newver' debian/changelog";
}



