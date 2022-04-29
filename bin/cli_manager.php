<?php
/**
 *  cli_manager.php
 *
 *  Command Line Interface Manager
 *
 *  @author     Technovarth
 *  @package    MBLV
 */
// 開発環境
if(dirname(__FILE__) == '/home/htdocs/mblv/bin'){
	// コントローラを呼び込み
	require_once '/home/htdocs/mblv/app/Tv_Controller.php';
}

// mazblv開発環境
elseif(dirname(__FILE__) == '/home/htdocs/mazblv.biew.jp/bin'){
	// コントローラを呼び込み
	require_once '/home/htdocs/mazblv.biew.jp/app/Tv_Controller.php';
}
// 想定外
else{
	echo 'UNKNOWNFILE';
	@error_log(__FILE__.__LINE__, 1, 'mblv@ml.technovarth.jp');
	exit;
}

// このスクリプトがタイムアウトしないようにセット
ini_set('max_execution_time', 0);

// アクション名取得
$argv = $_SERVER['argv'];
$action_name = $argv[1];
// アクション名の要素を削除して環境変数を戻す
array_splice($argv, 1, 1);
$_SERVER['argv'] = $argv;

// 起動アクションに応じて処理を分岐
switch($action_name)
{
	// ランキング集計
	case 'cron_ranking':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_ranking');
		break;
	// レビュー配送
	case 'cron_review':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_review');
		break;
	// 統計解析
	case 'cron_stats':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_stats');
		break;
	// アクション名初期化
	case 'init_actionname':
		Tv_Controller::main_CLI('Tv_Controller', 'init_actionname');
		break;
	// HTMLテンプレート初期化
	case 'init_htmltemplate':
		Tv_Controller::main_CLI('Tv_Controller', 'init_htmltemplate');
		break;
	// インストール
	case 'init_install':
		Tv_Controller::main_CLI('Tv_Controller', 'init_install');
		break;
	// メール受信
	case 'mail_receive':
		Tv_Controller::main_CLI('Tv_Controller', 'mail_receive');
		break;
	// メール配送
	case 'mail_send':
		Tv_Controller::main_CLI('Tv_Controller', 'mail_send');
		break;
	// デフォルト
	default:
		break;
}
?>