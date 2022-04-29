<?php
// vim: foldmethod=marker
/**
 *  Ethna_AppObject.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_AppObject.php,v 1.28 2007/01/04 15:17:12 cocoitiban Exp $
 */

// {{{ Ethna_AppObject
/**
 *  アプリケーションオブジェクトのベースクラス
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 *  @todo       複数テーブルの対応
 */
class Tv_AppObject extends Ethna_AppObject
{
    // {{{ properties
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend       backendオブジェクト */
    var $backend;

    /** @var    object  Ethna_Config        設定オブジェクト */
    var $config;

    /** @var    object  Ethna_I18N          i18nオブジェクト */
    var $i18n;

    /** @var    object  Ethna_ActionForm    アクションフォームオブジェクト */
    var $action_form;

    /** @var    object  Ethna_ActionForm    アクションフォームオブジェクト(省略形) */
    var $af;

    /** @var    object  Ethna_Session       セッションオブジェクト */
    var $session;

    /** @var    string  DB定義プレフィクス */
    var $db_prefix = null;

    /** @var    array   テーブル定義 */
    var $table_def = null;

    /** @var    array   プロパティ定義 */
    var $prop_def = null;

    /** @var    array   プロパティ */
    var $prop = null;

    /** @var    array   プロパティ(バックアップ) */
    var $prop_backup = null;

    /** @var    int     プロパティ定義キャッシュ有効期間(sec) */
    var $prop_def_cache_lifetime = 86400;

    /** @var    array   プライマリキー定義 */
    var $id_def = null;

    /** @var    int     オブジェクトID */
    var $id = null;

    /**#@-*/
    // }}}

    // {{{ Ethna_AppObject
    /**
     *  Ethna_AppObjectクラスのコンストラクタ
     *
     *  @access     public
     *  @param  object  Ethna_Backend   &$backend   Ethna_Backendオブジェクト
     *  @param  mixed   $key_type   検索キー名
     *  @param  mixed   $key        検索キー
     *  @param  array   $prop       プロパティ一覧
     *  @return mixed   0:正常終了 -1:キー/プロパティ未指定 Ethna_Error:エラー
     */
    function Ethna_AppObject(&$backend, $key_type = null, $key = null, $prop = null)
    {
        $this->backend =& $backend;
        $this->config =& $backend->getConfig();
        $this->action_form =& $backend->getActionForm();
        $this->af =& $this->action_form;
        $this->session =& $backend->getSession();
        $ctl =& $backend->getController();

        // DBオブジェクトの設定
        $db_list = $this->_getDBList();
        if (Ethna::isError($db_list)) {
            return $db_list;
        } else if (is_null($db_list['rw'])) {
            return Ethna::raiseError(
                "Ethna_AppObjectを利用するにはデータベース設定が必要です",
                E_DB_NODSN);
        }

        $this->my_db_rw =& $db_list['rw'];
        $this->my_db_ro =& $db_list['ro'];
        // XXX: app objはdb typeを知らなくても動くべき
        $this->my_db_type = $this->my_db_rw->getType();

        // プロパティ定義自動取得
        if (is_null($this->table_def)) {
            $this->table_def = $this->_getTableDef();
        }
        if (is_string($this->table_def)) {
            $this->table_def = array($this->table_def => array('primary' => true));
        }
        if (is_null($this->prop_def)) {
            $this->prop_def = $this->_getPropDef();
        }

        // プロパティ定義の必須キーを補完
        foreach (array_keys($this->prop_def) as $k) {
            if (isset($this->prop_def[$k]['primary']) == false) {
                $this->prop_def[$k]['primary'] = false;
            }
        }

        // オブジェクトのプライマリキー定義構築
        foreach ($this->prop_def as $k => $v) {
            if ($v['primary'] == false) {
                continue;
            }
            if (is_null($this->id_def)) {
                $this->id_def = $k;
            } else if (is_array($this->id_def)) {
                $this->id_def[] = $k;
            } else {
                $this->id_def = array($this->id_def, $k);
            }
        }
        
        // キー妥当性チェック
        if (is_null($key_type) && is_null($key) && is_null($prop)) {
            // perhaps for adding object
            return 0;
        }

        // プロパティ設定
        if (is_null($prop)) {
            $this->_setPropByDB($key_type, $key);
        } else {
            $this->_setPropByValue($prop);
        }

        $this->prop_backup = $this->prop;

        if (is_array($this->id_def)) {
            $this->id = array();
            foreach ($this->id_def as $k) {
                $this->id[] = $this->prop[$k];
            }
        } else {
            $this->id = $this->prop[$this->id_def];
        }

        return 0;
    }
    // }}}

    // {{{ _getDBList
    /**
     *  DBオブジェクト(read only/read-write)を取得する
     *
     *  @access protected
     *  @return array   array('ro' => {read only db object}, 'rw' => {read-write db object})
     */
    function _getDBList()
    {
        $r = array('ro' => null, 'rw' => null);

        $db_list = $this->backend->getDBList();
        if (Ethna::isError($db_list)) {
            return $r;
        }
        foreach ($db_list as $elt) {
            if ($this->db_prefix) {
                // 特定のプレフィクスが指定されたDB接続を利用
                // (テーブルごとにDBが異なる場合など)
                if (strncmp($this->db_prefix,
                            $elt['key'],
                            strlen($this->db_prefix)) != 0) {
                    continue;
                }
            }

            $varname = $elt['varname'];

            // for B.C.
            $this->$varname =& $elt['db'];

            if ($elt['type'] == DB_TYPE_RW) {
                $r['rw'] =& $elt['db'];
            } else if ($elt['type'] == DB_TYPE_RO) {
                $r['ro'] =& $elt['db'];
            }
        }
        if ($r['ro'] == null && $r['rw'] != null) {
            $r['ro'] =& $r['rw'];
        }
        return $r;
    }
    // }}}
}
// }}}
?>