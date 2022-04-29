#!/usr/local/bin/perl -w

####################################################
#
# �A�o�^�[�摜�����X�N���v�g
#
####################################################

#use CGI::Carp qw(fatalsToBrowser);
use strict;
use CGI;
use Jcode;
use Image::Magick;

# URL�f�R�[�h
sub urldecode($) {
	my $str = shift;
	$str =~ tr/+/ /;
	$str =~ s/%([0-9A-Fa-f][0-9A-Fa-f])/pack('H2', $1)/eg;
	return $str;
}

# �p�����^����M
my $w		= $ARGV[0];
my $h		= $ARGV[1];
my $base	= $ARGV[2];
my $base_x	= $ARGV[3];
my $base_y	= $ARGV[4];
my $base_w	= $ARGV[5];
my $base_h	= $ARGV[6];
my $files	= $ARGV[7];

# �t�@�C���擾
my @file = split(/,/, $files);

# �I�u�W�F�N�g�쐬
my $image1 = Image::Magick->new(size=>$w.'x'.$h);
$image1->Read("xc:white");

for (my $i=0; $i < @file; $i++ ) {
	# �d�˂�摜��ǂݍ���
	my $image2 = Image::Magick->new(size=>$w.'x'.$h);
	$image2->Read($file[$i]);
	
	#�؂�o��
	if($base){
		$image2->Crop(width=>$base_w, height=>$base_h, x=>$base_x, y=>$base_y);
	}
	
	#�摜�̃��T�C�Y
	$image2->Resize(width=>$w, height=>$h, blur=>0.7);
	
	# �摜����������
	$image1->Composite(
		image=>$image2,
		compose=>'Over',
	);
	
	# �������[�̉��
	undef $image2;
}

# �摜�o��
binmode STDOUT;
$image1->Write('gif:-');

# �������[�̉��
undef $image1;

# �I��
exit;