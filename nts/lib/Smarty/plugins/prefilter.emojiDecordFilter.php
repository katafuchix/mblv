<?php
#====================================================================================================
# $Id: prefilter.emojiDecordFilter.php,v 1.2 2006/10/14 09:39:09 matsui Exp $
# KEMP Smarty-Plugin Prefilter �G����SJIS�������Q�ƃt�B���^
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# �G����SJIS�������Q�Ƃ����SJIS10�i��Unicode�̕ϊ����s��
#====================================================================================================
# �C�������F
# 2006/10/05 �����R�[�h�Ƃ���Unicode���g���悤�ɕύX�A��ϊ��h�~�̂��ߊG�����ȊO�̕ϊ����s��Ȃ��悤�ɏC��
# 
#====================================================================================================

/**
 * �G����SJIS�������Q�ƃt�B���^
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_prefilter_emojiDecordFilter($tpl_output)
{
	// SJIS�`���̊G�����@���@Unicode�`���@�ɕϊ�
	// [�Q�l: http://specters.net/cgipon/labo/it_emoji.html]
	$sjis  = '[\x81-\x9F\xE0-\xF7\xFA-\xFC][\x40-\x7E\x80-\xFC]|[\x00-\x7F]|[\xA1-\xDF]';
	$emoji = '[\xF8\xF9][\x40-\x7E\x80-\xFC]';
	$pattern = "/\G((?:$sjis)*)(?:($emoji))/";
	
	// �G����������
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[2]�ɑΏۊG�������i�[�����
	
	// �G������u��
	$converted = $tpl_output;
	mb_internal_encoding('SJIS');
	mb_regex_encoding('SJIS');
	foreach($arr[2] as $value) {
		$emoji_cd = unpack("C*", $value);
		$hex =  dechex($emoji_cd[1]) . dechex($emoji_cd[2]);
		$dec = hexdec($hex);
		if (63647 <= $dec AND $dec <= 63740) {
			// �G����No.1 �` No.94
			$dec = $dec - 4705;
		} elseif (63872 <= $dec AND $dec <= 63996) {
			// �G����No.118 �` No.166�A�g1�`�g76
			$dec = $dec - 4773;
		} elseif ((63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870)) {
			// �G����No.95 �` No.117�ANo.167 �` No.176
			$dec = $dec - 4772;
		} else {
			continue;
		}
		$replacement = '&#x' . strtoupper(dechex($dec)) . ';';		// Unicode�ŏo��
		$converted = mb_ereg_replace($value, $replacement, $converted);
	}
	
	
	// &#[10�i];�`���@���@Unicode�`���@�ɕϊ�
	$pattern = "/&#(63\d{3});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]�ɑΏۊG�������i�[�����
	
	// �G�����ɒu��
	$rep_arr = array();
	foreach($arr[0] as $value) {
		$dec = substr($value, 2, 5);
		if (63647 <= $dec AND $dec <= 63740) {
			// �G����No.1 �` No.94
			$dec = $dec - 4705;
		} elseif (63872 <= $dec AND $dec <= 63996) {
			// �G����No.118 �` No.166�A�g1�`�g76
			$dec = $dec - 4773;
		} elseif ((63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870)) {
			// �G����No.95 �` No.117�ANo.167 �` No.176
			$dec = $dec - 4772;
		} else {
			continue;
		}
		$rep_arr[$value] = '&#x' . strtoupper(dechex($dec)) . ';';		// Unicode�ŏo��
	}
	
	$converted = strtr($converted, $rep_arr);
	
	
	// �o�͓��e��Ԃ�
	return $converted;
}

?>