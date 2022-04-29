<?php
// vim: foldmethod=marker
/**
 *  Tv_Renderer_Smarty.php
 *
 *  @author	 Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license	http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package	Ethna
 *  @version	$Id: Ethna_Renderer_Smarty.php,v 1.15 2007/01/04 07:26:52 ichii386 Exp $
 */

// {{{ Tv_Renderer_Smarty
/**
 *  Smartyレンダラクラス（Mojaviのまね）
 *
 *  @author	 Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @access	 public
 *  @package	Ethna
 */
class Tv_Renderer_Smarty extends Ethna_Renderer_Smarty
{
	/**
	 *  ビューを出力する
	 *
	 *  @param  string   $template  テンプレート名
	 *
	 *  @access public
	 */
	function perform($template = null)
	{
		if ($template === null && $this->template === null) {
			return Ethna::raiseWarning('template is not defined');
		}

		if ($template !== null) {
			$this->template = $template;
		}

		if ((is_absolute_path($this->template) && is_readable($this->template))
			|| is_readable($this->template_dir . $this->template)) {
			$ob_data = $this->engine->fetch($this->template);
			
			// 絵文字変換して出力
			// バッファがあれば、それをEUC-JP/UTF-8で出力
			// $ob_data = EUC-JP; emj_decodeの戻り値 = EUC-JP;
			// 最後はio_encoding (SB 3G以外はShift_JIS; SB 3GはUTF-8) で出力
			if ($ob_data && !array_key_exists('rand',$_GET)){
				echo $this->emoji_decode(mb_convert_encoding($ob_data,$GLOBALS['io_encoding'], 'EUC-JP'));
//				echo mb_convert_encoding($ob_data, $this->io_encoding, 'EUC-JP');
			}else{
				echo $ob_data;
			}
		} else {
			return Ethna::raiseWarning('template not found ' . $this->template);
		}
	}

	/**
	 *  ビューを取得する
	 *
	 *  @param  string   $template  テンプレート名
	 *
	 *  @access public
	 */
	function fetch($template = null)
	{
		if ($template === null && $this->template === null) {
			return Ethna::raiseWarning('template is not defined');
		}

		if ($template !== null) {
			$this->template = $template;
		}

		if ((is_absolute_path($this->template) && is_readable($this->template))
			|| is_readable($this->template_dir . $this->template)) {
				return $this->engine->fetch($this->template);
		} else {
			return Ethna::raiseWarning('template not found ' . $this->template);
		}
	}

	// 絵文字コードデコード
	function emoji_decode($text)
	{
		return $GLOBALS['EMOJIOBJ']->emoji_decode($text, 'WEB');
	}

}
// }}}
?>
