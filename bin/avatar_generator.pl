#!/usr/local/bin/perl -w

####################################################
#
# アバター画像生成スクリプト
#
####################################################

#use CGI::Carp qw(fatalsToBrowser);
use strict;
use CGI;
use Jcode;
use Image::Magick;

# URLデコード
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

# ファイル取得
my @file = split(/,/, $files);

# オブジェクト作成
my $image1 = Image::Magick->new(size=>$w.'x'.$h);
$image1->Read("xc:white");

for (my $i=0; $i < @file; $i++ ) {
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
	);
	
	# メモリーの解放
	undef $image2;
}

# 画像出力
binmode STDOUT;
$image1->Write('gif:-');

# メモリーの解放
undef $image1;

# 終了
exit;