<?php
/**
 *  cli_manager.php
 *
 *  Command Line Interface Manager
 *
 *  @author     Technovarth
 *  @package    MBLV
 */
// ��ȯ�Ķ�
if(dirname(__FILE__) == '/home/htdocs/mblv/bin'){
	// ����ȥ����Ƥӹ���
	require_once '/home/htdocs/mblv/app/Tv_Controller.php';
}

// mazblv��ȯ�Ķ�
elseif(dirname(__FILE__) == '/home/htdocs/mazblv.biew.jp/bin'){
	// ����ȥ����Ƥӹ���
	require_once '/home/htdocs/mazblv.biew.jp/app/Tv_Controller.php';
}
// ���곰
else{
	echo 'UNKNOWNFILE';
	@error_log(__FILE__.__LINE__, 1, 'mblv@ml.technovarth.jp');
	exit;
}

// ���Υ�����ץȤ������ॢ���Ȥ��ʤ��褦�˥��å�
ini_set('max_execution_time', 0);

// ���������̾����
$argv = $_SERVER['argv'];
$action_name = $argv[1];
// ���������̾�����Ǥ������ƴĶ��ѿ����᤹
array_splice($argv, 1, 1);
$_SERVER['argv'] = $argv;

// ��ư���������˱����ƽ�����ʬ��
switch($action_name)
{
	// ��󥭥󥰽���
	case 'cron_ranking':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_ranking');
		break;
	// ��ӥ塼����
	case 'cron_review':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_review');
		break;
	// ���ײ���
	case 'cron_stats':
		Tv_Controller::main_CLI('Tv_Controller', 'cron_stats');
		break;
	// ���������̾�����
	case 'init_actionname':
		Tv_Controller::main_CLI('Tv_Controller', 'init_actionname');
		break;
	// HTML�ƥ�ץ졼�Ƚ����
	case 'init_htmltemplate':
		Tv_Controller::main_CLI('Tv_Controller', 'init_htmltemplate');
		break;
	// ���󥹥ȡ���
	case 'init_install':
		Tv_Controller::main_CLI('Tv_Controller', 'init_install');
		break;
	// �᡼�����
	case 'mail_receive':
		Tv_Controller::main_CLI('Tv_Controller', 'mail_receive');
		break;
	// �᡼������
	case 'mail_send':
		Tv_Controller::main_CLI('Tv_Controller', 'mail_send');
		break;
	// �ǥե����
	default:
		break;
}
?>