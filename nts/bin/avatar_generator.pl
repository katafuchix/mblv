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

# �p�����^����M
my $w		= $ARGV[0];
my $h		= $ARGV[1];
my $base	= $ARGV[2];
my $base_x	= $ARGV[3];
my $base_y	= $ARGV[4];
my $base_w	= $ARGV[5];
my $base_h	= $ARGV[6];
my $files	= $ARGV[7];

#print $files;

# �t�@�C���擾
my @file = split(/,/, $files);
#my $file1 = $file[0];
#shift(@file);

# �I�u�W�F�N�g�쐬
my $image1 = Image::Magick->new(size=>$w.'x'.$h);
$image1->Read("xc:white");
# �摜�ǂݍ���
#$image1->Read($file1);
# �摜�̃��T�C�Y
#$image1->Resize(width=>$w, height=>$h, blur=>0.7);


for (my $i=0; $i < @file; $i++ ) {
#print $file[$i];
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
#		x=>0-$base_x,
#		y=>0-$base_y,
#		blur=>"0x10",
##		encoding=>'UTF-8'
	);
}
#exit;

#�摜�̃��T�C�Y
#$image1->Resize(width=>$w, height=>$h, blur=>0.7);

# �摜�o��
#print "Content-type: image/gif\n\n";
binmode STDOUT;
$image1->Write('gif:-');

undef $image1;
exit;