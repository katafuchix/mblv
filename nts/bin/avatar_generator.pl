#!/usr/local/bin/perl -w

#use CGI::Carp qw(fatalsToBrowser);
use strict;
#use CGI;
#use Jcode;
use Image::Magick;

sub urldecode($) {
	my $str = shift;
	$str =~ tr/+/ /;
	$str =~ s/%([0-9A-Fa-f][0-9A-Fa-f])/pack('H2', $1)/eg;
	return $str;
}

# パラメタを受信
my $w		= $ARGV[0];
my $h		= $ARGV[1];
my $base	= $ARGV[2];
my $base_x	= $ARGV[3];
my $base_y	= $ARGV[4];
my $base_w	= $ARGV[5];
my $base_h	= $ARGV[6];
my $files	= $ARGV[7];

#print $files;

# ファイル取得
my @file = split(/,/, $files);
#my $file1 = $file[0];
#shift(@file);

# オブジェクト作成
my $image1 = Image::Magick->new(size=>$w.'x'.$h);
$image1->Read("xc:white");
# 画像読み込み
#$image1->Read($file1);
# 画像のリサイズ
#$image1->Resize(width=>$w, height=>$h, blur=>0.7);


for (my $i=0; $i < @file; $i++ ) {
#print $file[$i];
	# 重ねる画像を読み込む
	my $image2 = Image::Magick->new(size=>$w.'x'.$h);
	$image2->Read($file[$i]);
	
	#切り出し
	if($base){
		$image2->Crop(width=>$base_w, height=>$base_h, x=>$base_x, y=>$base_y);
	}
	
	#画像のリサイズ
	$image2->Resize(width=>$w, height=>$h, blur=>0.7);
	
	# 画像を合成する
	$image1->Composite(
		image=>$image2,
		compose=>'Over',
#		x=>0-$base_x,
#		y=>0-$base_y,
#		blur=>"0x10",
##		encoding=>'UTF-8'
	);
}
#exit;

#画像のリサイズ
#$image1->Resize(width=>$w, height=>$h, blur=>0.7);

# 画像出力
#print "Content-type: image/gif\n\n";
binmode STDOUT;
$image1->Write('gif:-');

undef $image1;
exit;