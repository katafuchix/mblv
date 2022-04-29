<?php
// vim: foldmethod=marker
/**
 *  Ethna_I18N.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_I18N.php,v 1.3 2006/07/19 05:22:37 fujimoto Exp $
 */

// {{{ Ethna_I18N
/**
 *  i18n��Ϣ�ν�����Ԥ����饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_I18N
{
    /**#@+
     *  @access private
     */

    /** @var    bool    gettext�ե饰 */
    var $have_gettext;

    /** @var    string  ������ǥ��쥯�ȥ� */
    var $locale_dir;

    /** @var    string  ���ץꥱ�������ID */
    var $appid;

    /** @var    string  �����ƥ�¦���󥳡��ǥ��� */
    var $systemencoding;

    /** @var    string  ���饤�����¦���󥳡��ǥ��� */
    var $clientencoding;

    /**#@-*/

    /**
     *  Ethna_I18N���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  string  $locale_dir ������ǥ��쥯�ȥ�
     *  @param  string  $appid      ���ץꥱ�������ID
     */
    function Ethna_I18N($locale_dir, $appid)
    {
        $this->locale_dir = $locale_dir;
        $this->appid = strtoupper($appid);
        $this->have_gettext = extension_loaded("gettext") ? true : false;

        $this->setLanguage(LANG_JA);
    }

    /**
     *  ����������ꤹ��
     *
     *  @access public
     *  @param  string  $language       �������
     *  @param  string  $systemencoding �����ƥ२�󥳡��ǥ���̾
     *  @param  string  $clientencoding ���饤����ȥ��󥳡��ǥ���̾
     *  @return string  ������б��������ꤵ�줿������̾
     */
    function setLanguage($language, $systemencoding = null, $clientencoding = null)
    {
        switch ($language) {
        case LANG_EN:
            $locale = "en_US";
            break;
        case LANG_JA:
            $locale = "ja_JP";
            break;
        default:
            $locale = "ja_JP";
            break;
        }
        setlocale(LC_ALL, $locale);
        if ($this->have_gettext) {
            bindtextdomain($this->appid, $this->locale_dir);
            textdomain($this->appid);
        }

        $this->systemencoding = $systemencoding;
        $this->clientencoding = $clientencoding;

        return $locale;
    }

    /**
     *  ��å���������������������Ŭ�礹���å��������������
     *
     *  @access public
     *  @param  string  $message    ��å�����
     *  @return string  �������Ŭ�礹���å�����
     */
    function get($message)
    {
        if ($this->have_gettext) {
            return gettext($message);
        } else {
            return $message;
        }
    }
}
// }}}
?>
