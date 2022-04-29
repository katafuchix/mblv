<?php
#====================================================================================================
# $Id: outputfilter.emojiEncordFilter.php,v 1.2 2006/10/14 09:39:09 matsui Exp $
# KEMP Smarty-Plugin Outputfilter �����Q�Ɓ�SJIS�t�B���^
# 2006/09/21 matsui@ke-tai.org
#====================================================================================================
# �@�\�F
# i���[�h�G�����𕶎��Q�ƌ`������SJIS�`���ɕԐM����
#====================================================================================================
# �C�������F
# 2006/10/05 Unicode�ɑΉ��A��ϊ��h�~�̂��ߊG�����ȊO�̕ϊ����s��Ȃ��悤�ɏC��
# 
#====================================================================================================

/**
 * �����Q�Ɓ�SJIS�t�B���^
 * @param	string	$tpl_output		�o�͓��e
 * @return	string					�R���o�[�g�ς݂̏o�͓��e
 */
function smarty_outputfilter_emojiEncordFilter($tpl_output)
{
	$rep_arr = array();
	
	// i���[�h��{�G����(SJIS &#[10�i];)������
	$pattern = "/&#(63\d{3});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]�ɑΏۊG�������i�[�����
	
	// �G�����ɒu��
	$converted = $tpl_output;
	foreach($arr[0] as $value) {
		$dec = substr($value, 2, 5);
		if ((63647 <= $dec AND $dec <= 63740) OR (63808 <= $dec AND $dec <= 63817) OR (63824 <= $dec AND $dec <= 63826) OR (63829 <= $dec AND $dec <= 63831) OR (63835 <= $dec AND $dec <= 63838) OR (63858 <= $dec AND $dec <= 63870) OR (63872 <= $dec AND $dec <= 63920)) {
			$rep_arr[$value] = pack('n', $dec);
		}
	}
	
	
	// i���[�h�g���G����(Unicode�`��)������
	$pattern = "/&#x(E[67][0-9A-F]{2});/";
	preg_match_all($pattern, $tpl_output, $arr);		// $arr[0]�ɑΏۊG�������i�[�����
	
	// �G�����ɒu��
	foreach($arr[0] as $value) {
		$hex = substr($value, 3, 4);
		$dec = hexdec($hex);
		if (58942 <= $dec AND $dec <= 59035) {
			// �G����No.1 �` No.94
			$dec = $dec + 4705;
		} elseif (59099 <= $dec AND $dec <= 59223) {
			// �G����No.118 �` No.166�A�g1�`�g76
			$dec = $dec + 4773;
		} elseif ((59036 <= $dec AND $dec <= 59045) OR (59052 <= $dec AND $dec <= 59054) OR (59057 <= $dec AND $dec <= 59059) OR (59063 <= $dec AND $dec <= 59066) OR (59086 <= $dec AND $dec <= 59098)) {
			// �G����No.95 �` No.117�ANo.167 �` No.176
			$dec = $dec + 4772;
		} else {
			continue;
		}
		$rep_arr[$value] = pack('n', $dec);
	}
	
	// �u������
	$converted = strtr($converted, $rep_arr);
	
	// �o�͓��e��Ԃ�
	return $converted;
}

?>